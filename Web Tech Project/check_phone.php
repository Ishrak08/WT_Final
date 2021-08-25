<?php
    include 'controllers/HouseholderController.php';
    $h_phone = $_GET["h_phone"];
    $user_phone = checkPhone($h_phone);
    if($user_phone){
        echo "invalid";
    }
    else{
        echo "valid";
    }
?>
