<?php

require './config.php';
require './DB.class.php';

$db = DB::table('user');

echo $db->delete($_GET['id']); // 执行插入并输出结果


?>