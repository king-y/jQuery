<?php

require '../DB/config.php';
require '../DB/DB.class.php';

$db = DB::table('user');

$data = $db->select();

// var_dump($data);
echo json_encode($data);
