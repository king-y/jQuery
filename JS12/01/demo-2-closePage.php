<?php

// 闭包函数 / 匿名函数
$hehe = function ($a)
{
    echo $a;
}; //此处不得缺少分号!

$hehe('嘿嘿嘿');

// echo $hehe;
var_dump($hehe);


echo '<hr>';
// 在匿名函数内部 使用外部变量
$func = function() use(&$x, &$y)
{
    $x *= 2;
    $y *= 3;
    $z = $x + $y;
    return $z;
};

$x = 3;
$y = 3;

echo $func();

echo '<hr>';

function demo() {
    $m = 3;
    $n = 3;
    $func = function () use($m, $n)
    {
        $m *= 2;
        $n *= 3;
        $k = $m+ $n;
        return $k;
    };
    return $func();
}

echo demo();


echo '<hr>';

function getInfo($func)
{
    $func('wyy');
}

function bl($str)
{
    echo '以回调函数的方式输出结果: '. $str;
}

getInfo('bl');
echo '<br>';
getInfo(function ($str){
    var_dump($str);
});

getInfo(function ($str){
    echo ' <h1>'.$str.'</h1>';
});


