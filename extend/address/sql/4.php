<?php 

    include './config.php';
    include './DB.class.php';


    $db = DB::table('lamp_address');
    $res = $db->where('upid='.$_GET['upid'],'level=4')
              ->select();

    echo json_encode($res);









 ?>