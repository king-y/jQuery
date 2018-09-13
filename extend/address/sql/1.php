<?php 
    include './config.php';
    include './DB.class.php';


    $db = DB::table('lamp_address');
    $res = $db->where('level='.$_GET['level'])
              ->select();

    echo json_encode($res);




 ?>