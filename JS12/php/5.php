<?php

require './config.php';
require './DB.class.php';

$db = DB::table('user');

echo $db->insert(); // 执行插入并输出结果


?>