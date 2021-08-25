<?php
	session_start();
  require_once 'models/db_config.php';

  $p_type="";
  $err_p_type="";
  $p_area="";
  $err_p_area="";
  $p_location="";
  $err_p_location="";
  $p_price="";
  $err_p_price="";
  $p_description="";
  $err_p_description="";
  $p_img="";
  $err_p_img="";
  $err_db="";
  $hasError=false;

  if(isset($_POST["add_property"])){
    if(empty($_POST["p_type"])){
      $hasError = true;
      $err_p_type = " Property Type Required";
    }
    else{
      $p_type = $_POST["p_type"];
    }
    if(empty($_POST["p_area"])){
      $hasError = true;
      $err_p_area = " Property Area Required";
    }
    else{
      $p_area = $_POST["p_area"];
    }
    if(empty($_POST["p_location"])){
      $hasError = true;
      $err_p_location = " Property Location Required";
    }
    else{
      $p_location = $_POST["p_location"];
    }
    if(empty($_POST["p_price"])){
      $hasError = true;
      $err_p_price = " Property Price Required";
    }
    else{
      $p_price = $_POST["p_price"];
    }
    if(empty($_POST["p_description"])){
      $hasError = true;
      $err_p_description = " Property Description Required";
    }
    else{
      $p_description = $_POST["p_description"];
    }
    
    if(!$hasError){
      $rs = insertProperty($p_type,$p_area,$p_location,$p_price,$p_description,$target,$_POST["h_id"]);
      if($rs===true){
        //$h_id = $_SESSION["h_id"];
        header("Location: dashboard.php");
      }
      $err_db = $rs;
	  //var_dump($_POST);

    }

  }
  else if(isset($_POST["edit_property"])){
		if(empty($_POST["p_type"])){
      $hasError = true;
      $err_p_type = " Property Type Required";
    }
    else{
      $p_type = $_POST["p_type"];
    }
		if(empty($_POST["p_area"])){
      $hasError = true;
      $err_p_area = " Property Area Required";
    }
    else{
      $p_area = $_POST["p_area"];
    }
		if(empty($_POST["p_location"])){
      $hasError = true;
      $err_p_location = " Property Location Required";
    }
    else{
      $p_location = $_POST["p_location"];
    }
		if(empty($_POST["p_price"])){
      $hasError = true;
      $err_p_price = " Property Price Required";
    }
    else{
      $p_price = $_POST["p_price"];
    }
		if(empty($_POST["p_description"])){
      $hasError = true;
      $err_p_description = " Property Description Required";
    }
    else{
      $p_description = $_POST["p_description"];
    }

    if(!$hasError){
      $rs = updateProperty($p_type,$p_area,$p_location,$p_price,$p_description,$_POST["p_id"]);
      if($rs===true){
        header("Location: dashboard.php");
      }
      $err_db = $rs;
    }
  }
  else if(isset($_POST["delete_property"])){

    if(!$hasError){
      $rs = deleteProperty($_POST["p_type"],$_POST["p_area"],$_POST["p_location"],$_POST["p_price"],$_POST["p_description"],$target,$_POST["p_id"]);
      if($rs===true){
          header("Location: dashboard.php");
      }
      $err_db = $rs;
    }
  }
  else if(isset($_POST["search_property"])){

    if(!$hasError){
       if(searchPropertyLocation($_POST["p_location"])){
         $p_location = $_POST["p_location"];
        header("Location: searchresult.php?p_location=$p_location");
       }

    }
  }



  function insertProperty($p_type,$p_area,$p_location,$p_price,$p_description,$p_img,$h_id){
	  //$h_id = $_SESSION["h_id"];
    $query = "insert into properties values (NULL,'$p_type','$p_area','$p_location','$p_price','$p_description','$p_img',$h_id)";
    return execute($query);
	//echo $h_id;
	//var_dump($_SESSION);
  }
  function getProperties(){
	  $h_id = $_SESSION["h_id"];
    $query = "SELECT * FROM properties WHERE h_id = '$h_id'";
    $rs = get($query);
    return $rs;
	//var_dump($rs);
   //echo $h_uname;
   //echo ($_SESSION["h_id"]);

  }
  function getProperty($p_id){
    $query = "select * from properties where p_id = '$p_id'";
    $rs = get($query);
    return $rs[0];
  }
  function updateProperty($p_type,$p_area,$p_location,$p_price,$p_description,$p_id){
    $query = "update properties set p_type='$p_type',p_area='$p_area',p_location='$p_location',p_price='$p_price',p_description='$p_description' where p_id=$p_id";
    return execute($query);
  }
  function deleteProperty($p_id){
    $query = "delete from properties where p_id = '$p_id'";
    return execute($query);
  }
  function getHouseholders(){
	$query = "select * from householder";
	$rs = get($query);
	return $rs;
  }
  function getHouseholderWithUsername($h_uname){
	$query = "select * from householder where h_uname = '$h_uname'";
    $rs = get($query);
    return $rs[0];
  }
  function searchPropertyLocation($p_location){
    $query = "select * from properties where p_location = '$p_location'";
    $rs = get($query);
    return $rs;
  }
  function searchProperty($key){
    $query = "select p.p_id,p.p_location,p.p_description,p.p_price from properties p left join householder h on p.h_id=h.h_id where p.p_location like '%$key%' or h.h_name like '%$key%' or p.p_price like '%$key%' or p.p_description like '%$key%'";
    $rs = get($query);
    return $rs;
    //"select * from properties where p_location like '%$key%'";

  }
?>
