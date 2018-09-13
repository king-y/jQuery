<?php

/**
* DB 数据库操作类
*/
class DB
{
    // 保存DB对象 静态属性值
    private static $obj = null;
    // 保存PDO数据库操作对象
    private $link = null;
    // 保存操作的数据表
    private $table = null;
    // 保存所有表内的字段
    private $fields;
    // 保存主键名称
    private $pk;
    // 保存要查询的字段
    private $keys;
    // 保存查询条件
    private $where;
    // 保存排序条件
    private $order;
    // 保存分页条件
    private $limit;
    // 保存分组条件
    private $group;
    // 保存分组再筛选条件
    private $having;


    /**
     * 数据库 初始化操作
     */
    private function __construct($table)
    {
        // 单例 封装构造,不能实例化
        // 连接数据库相关设置
        $this->connect();
        // 设置操作的数据表
        $this->setTable($table);
        // 得到表内所有的字段
        $this->getField();
    }


    /**
     * 设置操作的表名(静态方法)
     * @param  string $table 操作的表名
     * @return object 返回连接好的PDO对象
     */
    public static function table($table)
    {
        if (self::$obj === null) {
            // 实例化PDO对象
            self::$obj = new self($table);
        }
        //返回PDO对象
        return self::$obj;
    }


    /**
     * 连接数据库相关设置
     */
    protected function connect()
    {
        // 实例化PDO的对象
        $this->link = new PDO(DSN, USER, PWD);
        // 设置SQL错误处理方式
        $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // 设置字符集
        $this->link->query('set names utf8');
        // 设置结果集为数组方式
        $this->link->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }


    /**
     * 设置操作的数据表
     * @param str $table 要操作的数据表
     */
    protected function setTable($table)
    {
        $this->table = $table;
    }


    /**
     * 查询多条数据
     * @return 二维数组/空数组
     */
    public function select()
    {
        $keys = '*'; // 默认查全部
        // 判断有无字段条件
        if (!empty($this->keys)) {
            $keys = $this->keys;
            $this->keys = null; // 每次清除查询条件
        }

        $where = ''; // 默认无where条件
        // 判断有无 where条件
        if (!empty($this->where)) {
            // 注意WHERE后面有空格,再拼接where条件
            $where = 'WHERE '.$this->where;
            $this->where = null;// 每次用完清除条件
        }

        $order = '';
        // 判断有无order条件
        if (!empty($this->order)) {
            $order = 'ORDER BY '.$this->order;
            $this->order = null;// 每次用完清除条件
        }

        $limit = '';
        // 判断有无limit条件
        if (!empty($this->limit)) {
            $limit = 'LIMIT '.$this->limit;
            $this->limit = null;// 每次用完清除条件
        }

        $group = '';
        // 判断有无group条件
        if (!empty($this->group)) {
            $group = 'GROUP BY '.$this->group;
            $this->group = null;// 每次用完清除条件
        }

        $having = '';
        // 判断有无having条件
        if (!empty($this->having)) {
            $having = 'HAVING '.$this->having;
            $this->having = null;// 每次用完清除条件
        }

        // 查询的sql语句
        $sql = "SELECT {$keys} FROM {$this->table} {$where} {$group} {$having} {$order} {$limit}";
        // echo $sql; exit();

        // 执行查询
        $stmt = $this->link->query($sql);
        // 处理结果集
        $result = $stmt->fetchAll();
        // 返回结果
        return $result;
    }


    /**
     * 查单条数据
     * @param  str $findValue 指定查询的字段值
     * @param  str $findKey   指定查询的字段条件
     * @return bool/array 返回一维数组或false
     */
    public function find($findValue, $findKey = null)
    {
        $keys = '*'; //默认查全部
        //判断有无字段条件
        if (!empty($this->keys)) {
            $keys = $this->keys;
            $this->keys = null; // 每次用完清除查询条件
        }

        // 无参2,则指定为主键
        if ($findKey == null) $findKey = $this->pk;
        // SQL语句
        $sql = "SELECT {$keys} FROM {$this->table} WHERE {$findKey}='{$findValue}' LIMIT 1";

        // 接收查询的结果
        $data = $this->query($sql);
        // 判断结果是否为空,为空返回false
        if (empty($data)) return false;

        //返回查询到的数据(一维数组)
        return $data[0];
    }


    /**
     * 获取要查询的字段,对象链操作
     * @param  arr $arr 以数组形式,指定要查询的字段
     * @param  arr $func 以数组形式,指定SQL中统计函数
     * @return $this
     */
    public function field($arr, $func = [])
    {
        // 判断参数 是否是数组.如不是,直接返回自己
        if (!is_array($arr)) return $this;

        // 遍历$arr 删除非法字段(数据表里没有的字段)
        foreach($arr as $key => $val){
            if(!in_array($val,$this->fields)){
                unset($arr[$key]);
            }
        }

        // 如果处理好的参数为空,则直接返回自己
        if(empty($arr)) return $this;

        // 生成字段条件,存为属性,方便其它方法使用
        $this->keys = implode(',',$arr);

        // 判断有无传递参2
        if (!empty($func) && is_array($func)) {
            $this->keys = $this->keys .','. implode(',', $func);
        }

        // 返回自己,用于对象链操作
        return $this;
    }


    /**
     * 获取要查询的条件,对象链操作
     * @param  str $where 指定要查询的条件
     * @return $this
     */
    public function where($where)
    {
        // 设置要查询的条件
        $this->where = $where;
        // 返回自己,用于对象链操作
        return $this;
    }


    /**
     * 获取排序的条件,对象链操作
     * @param  str $order 指定排序条件
     * @return $this
     */
    public function order($order)
    {
        // 设置排序条件
        $this->order = $order;
        // 返回自己,用于对象链操作
        return $this;
    }

    /**
     * 获取分页条件,对象链操作
     * @param  str $order 指定分页条件
     * @return $this
     */
    public function limit($limit)
    {
        // 设置分页条件
        $this->limit = $limit;
        // 返回自己,用于对象链操作
        return $this;
    }

    /**
     * 获取分组条件,对象链操作
     * @param  str $group 指定分组条件
     * @return $this
     */
    public function group($group)
    {
        // 设置分组条件
        $this->group = $group;
        // 返回自己,用于对象链操作
        return $this;
    }


    /**
     * 获取分组再筛选条件,对象链操作
     * @param  str $having 指定分组筛选条件
     * @return $this
     */
    public function having($having)
    {
        // 判断有无分组条件,无则直接返回$this,不进行操作
        if (!isset($this->group)) return $this;
        // 设置分组条件
        $this->having = $having;
        // 返回自己,用于对象链操作
        return $this;
    }


    /**
     * 新增数据
     * @param  array $data 要添加的数据
     * @return 新增成功返回ID/失败返回false
     */
    public function insert($data = [])
    {
        // 直接给参数POST不合适
        // 判断赋值:如果data为空,赋值POST
        if (empty($data)) $data = $_POST;

        //筛选POST数据
        foreach ($data as $k => $v) {
            //如果POST里的$k 在字段列表之中,就保留
            if (in_array($k,$this->fields)) {
                $list[$k] = $v;
            }
        }

        // 生成SQL中的key和value
        $keys = implode(',', array_keys($list));
        $values = implode("','",array_values($list));

        // 添加语句
        $sql = "INSERT INTO {$this->table} ({$keys}) VALUES('{$values}')";
        // 执行操作 返回自增ID或false
        return $this->execute($sql);
    }


    /**
     * 删除数据
     * @param  str $delValue 指定删除的字段值
     * @param  str $delKey   指定删除的字段条件
     * @return bool 成功返回true/失败返回false
     */
    public function delete($delValue, $delKey = null)
    {
        // 无参2,则主键删除.
        if ($delKey == null) $delKey = $this->pk;

        $sql = "DELETE FROM {$this->table} WHERE {$delKey}='{$delValue}'";
        return $this->execute($sql);
    }


    /**
     * 更新数据
     * @param  array $data 要更新的数据
     * @return bool 成功返回true/失败返回false
     */
    public function update($data = [])
    {
        // 判断赋值:如果data为空,赋值POST
        if (empty($data)) $data = $_POST;

        // 筛选POST数据    !(写在SQL之前)
        foreach ($data as $k => $v) {
            //如果POST里的$k在字段列表中
            if (in_array($k,$this->fields) && $k != $this->pk) {
                $list[] = "`{$k}`='{$v}'";
            }
        }
        // 生成SET条件
        $set = implode(',', $list);

        // SQL定义
        $sql = "UPDATE {$this->table} SET {$set} WHERE `{$this->pk}`='{$data[$this->pk]}'";

        // 执行操作返回true或false
        return $this->execute($sql);
    }


    /**
     * 执行 查询的 SQL语句的操作
     * @param  string $sql 指定执行的SQL语句
     * @return array  返回数组(二维数组/空数组)
     */
    public function query($sql)
    {
        $stmt = $this->link->query($sql);
        return $stmt->fetchAll();
    }


    /**
     * 执行 增删改 SQL语句的操作
     * @param  string $sql 指定执行的SQL语句
     * @return bool/int  操作失败返回false/删改成功返回true/新增成功返回ID
     */
    public function execute($sql)
    {
        $result = $this->link->exec($sql);
        if ($result === 0) {
            // 增删改失败
            return false;
        } else {
            if ($this->link->lastInsertId() > 0) {
                //新增成功 返回自增ID
                return $this->link->lastInsertId();
            } else {
                // 删改成功返回true
                return true;
            }
        }
    }


    /**
     * 获取数据表内所有的字段
     * @return null 无返回值,执行结果会存储到fields属性值中
     */
    private function getField()
    {
        //查询表结构
        $sql = "DESC {$this->table}";
        $list = $this->query($sql);
        // var_dump($list);//查看查询的结果,是字段数组
        // 遍历得到全部字段名字
        $fields = [];
        foreach ($list as $val) {
            $fields[] = $val['Field'];
            // 获取主键
            if ($val['Key'] == 'PRI') {
                $this->pk = $val['Field'];
            }
        }
        //给属性赋值
        $this->fields = $fields;
    }


    /**
     * 私有化克隆方法
     * @return 无
     */
    private function __clone()
    {
        // 该对象无法被克隆
    }

}
