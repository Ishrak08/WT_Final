<?php
    include 'controllers/HouseholderController.php';
    $h_uname = $_GET["h_uname"];
    $user = checkUsername($h_uname);
    if($user){
        echo "invalid";
    }
    else{
        echo "valid";
    }
?>
