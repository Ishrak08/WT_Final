<?php
    include 'controllers/HouseholderController.php';
    $h_nid = $_GET["h_nid"];
    $user_nid = checkNid($h_nid);
    if($user_nid){
        echo "invalid";
    }
    else{
        echo "valid";
    }
?>
