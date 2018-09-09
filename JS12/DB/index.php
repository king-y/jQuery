<?php
require './config.php';
require './DB.class.php';

// var_dump($_POST);
// echo '<hr>';

$db = DB::table('user');
// var_dump($db);

// $list = $db->query('select * from user');
// var_dump($list);

// 传值SQL的操作方法
// $sql = "INSERT INTO user VALUES(null, 't1', '0', '18', '上海')";
// $sql = "UPDATE user SET name='p1' WHERE id='47'";
// $sql = "DELETE FROM user WHERE id='45'";
// $row = $db->execute($sql);
// var_dump($row);

// 添加数据
// var_dump($db->insert());

// 查询多条数据
// $data = $db->select(); //二维数组 所有字段
// var_dump($data);

// 查询单条数据
// $row1 = $db->find(5);//查询ID为1的数据
// $row2 = $db->find('老王','name');//name为老王数据
// var_dump($row1,$row2);

// 删除数据
// var_dump($db->delete(49));
// var_dump($db->delete('老王','name'));

// 更新数据
// var_dump($db->update());

// 查询指定的字段
// $list1 = $db->select();
// $list2 = $db->field(['id','name','嘿嘿'])->select();
// var_dump($list1, $list2);

// 单条查询指定的字段
// $list1 = $db->find(5);
// $list2 = $db->field(['id','sex'])->find(5);
// var_dump($list1,$list2);

// where条件
// $list = $db->where('id < 3')->select();
// $list = $db->where("name like '%王%'")->select();
// var_dump($list);

// 排序
// $row1 = $db->order('id desc')->select();
// var_dump($row);

// 分页
// $row1 = $db->limit('5')->select();
// $row2 = $db->limit('5,2')->select();
// var_dump($row1, $row2);

// 分组
// $list = $db->field(['province'],['count(id) as num'])->group('province')->select();
// $list = $db->field(['province'],['avg(age) as ages'])->group('province')->select();
// $list = $db->field(['province'],['count(id) as num'])->group('province')->having('num > 5')->select();
// var_dump($list);


// // 综合测试,不分方法的先后顺序.
$row = $db->field(['id','name'])->where("name like '%王%'")->order('id desc')->limit(3)->select();
var_dump($row);
