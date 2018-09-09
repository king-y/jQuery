<?php

require './config.php';
require './DB.class.php';

$db = DB::table('user');

$data = $db->find(1);

echo "makedata(".json_encode($data).")";

