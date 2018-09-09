<?php

function sum($n1, $n2)
{
    return $n1 + $n2;
}
function mul($n1, $n2)
{
    return $n1 * $n2;
}

// 回调函数
function result($n1, $n2, $callback)
{
    return $callback($n1, $n2);
}

echo result(10, 20, 'sum');
echo '<br>';
echo result(10, 20, 'mul');
echo '<hr>';

// PHP系统提供的回调函数

// 把第一个参数作为回调函数调用
echo call_user_func('sum', 100, 900);
echo '<br>';
echo call_user_func_array('mul', [100, 900]);

