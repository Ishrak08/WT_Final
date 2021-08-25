<?php
	session_start();
  include 'models/db_config.php';

  $h_purpose="";
  $err_h_purpose="";
  $h_name="";
  $err_h_name="";
  $h_uname="";
  $err_h_uname="";
  $h_pass="";
  $err_h_pass="";
  $h_day="";
  $err_h_day="";
  $h_month="";
  $err_h_month="";
  $h_year="";
  $err_h_year="";
  $h_gender="";
  $err_h_gender="";
  $h_email="";
  $err_h_email="";
  $h_address="";
  $err_h_address="";
  $h_phone="";
  $err_h_phone="";
  $h_nid="";
  $err_h_nid="";
  $err_db="";
  $hasError=false;

  if(isset($_POST["register"])){
    if(empty($_POST["h_purpose"])){
      $hasError = true;
      $err_h_purpose = "Purpose Required";
    }
    else{
      $h_purpose = $_POST["h_purpose"];
    }
    if(empty($_POST["h_name"])){
      $hasError=true;
      $err_h_name="Name Required";
    }
    else{
      $h_name=$_POST["h_name"];
    }
    if(empty($_POST["h_uname"])){
      $hasError=true;
      $err_h_uname="Username Required";
    }
    else{
      $h_uname=$_POST["h_uname"];
    }
    if(empty($_POST["h_pass"])){
      $hasError=true;
      $err_h_pass="Password Required";
    }
    else{
      $h_pass=$_POST["h_pass"];
    }
    if(empty($_POST["h_day"])){
      $hasError=true;
      $err_h_day="Date Required";
    }
    else{
      $h_day=$_POST["h_day"];
    }
    if(empty($_POST["h_month"])){
      $hasError=true;
      $err_h_month="Month Required";
    }
    else{
      $h_month=$_POST["h_month"];
    }
    if(empty($_POST["h_year"])){
      $hasError=true;
      $err_h_year="Year Required";
    }
    else{
      $h_year=$_POST["h_year"];
    }
    if(empty($_POST["h_gender"])){
      $hasError=true;
      $err_h_gender="Gender Required";
    }
    else{
      $h_gender=$_POST["h_gender"];
    }
    if(empty($_POST["h_email"])){
      $hasError=true;
      $err_h_email="Email Required";
    }
    else{
      $h_email=$_POST["h_email"];
    }
    if(empty($_POST["h_address"])){
      $hasError=true;
      $err_h_address="Address Required";
    }
    else{
      $h_address=$_POST["h_address"];
    }
    if(empty($_POST["h_phone"])){
      $hasError=true;
      $err_h_phone="Phone no. Required";
    }
    else{
      $h_phone=$_POST["h_phone"];
    }
    if(empty($_POST["h_nid"])){
      $hasError=true;
      $err_h_nid="NID Required";
    }
    else{
      $h_nid=$_POST["h_nid"];
    }
    if(!$hasError){
      $rs = insertHouseholder($h_purpose,$h_name,$h_uname,$h_pass,$h_day,$h_month,$h_year,$h_gender,$h_email,$h_address,$h_phone,$h_nid);
      if($rs === true){
        header("Location: login.php");
      }
      $err_db = $rs;
    }

  }
  else if(isset($_POST["login"])){
    if(empty($_POST["h_uname"])){
      $hasError=true;
      $err_h_uname="*Username Required";
    }
    else{
      $h_uname=$_POST["h_uname"];
    }
    if(empty($_POST["h_pass"])){
      $hasError=true;
      $err_h_pass="*Password Required";
    }
    else{
      $h_pass=$_POST["h_pass"];
    }
    if(!$hasError){
      if(authenticateHouseholder($h_uname,$h_pass)){
          $_SESSION["h_uname"] = $h_uname;
          setcookie("h_uname",$h_uname,time()+120);
	        header("Location: dashboard.php");
        
      }
      $err_db = "Username and password invalid";
    }
  }
  else if(isset($_POST["update"])){

    if(!$hasError){
      $rs = updateHouseholder($_POST["h_purpose"],$_POST["h_name"],$_POST["h_uname"],$_POST["h_pass"],$_POST["h_day"],$_POST["h_month"],$_POST["h_year"],$_POST["gender"],$_POST["h_email"],$_POST["h_address"],$_POST["h_phone"],$_POST["h_nid"],$_POST["h_id"]);
      if($rs===true){
        //$_SESSION["h_uname"] = $h_uname;
        header("Location: confirm_profile.php");
      }
      $err_db = $rs;
    }
  }

  function insertHouseholder($h_purpose,$h_name,$h_uname,$h_pass,$h_day,$h_month,$h_year,$h_gender,$h_email,$h_address,$h_phone,$h_nid){
    $query = "insert into householder values (NULL,'$h_purpose','$h_name','$h_uname','$h_pass','$h_day','$h_month','$h_year','$h_gender','$h_email','$h_address','$h_phone','$h_nid')";
    return execute($query);
  }
  function getHouseholders(){
    $h_id = $_SESSION["h_id"];
    $query = "SELECT * FROM properties WHERE h_id = '$h_id'";
    $rs = get($query);
    return $rs[0];
    }
    function getHouseholderWithUsername($h_uname){
      $query = "select * from householder where h_uname = '$h_uname'";
      $rs = get($query);
      return $rs[0];
   }
   function updateHouseholder($h_purpose,$h_name,$h_uname,$h_pass,$h_day,$h_month,$h_year,$h_gender,$h_email,$h_address,$h_phone,$h_nid,$h_id){
    $query = "update householder set h_purpose='$h_purpose',h_name='$h_name',h_uname='$h_uname',h_pass='$h_pass',h_day='$h_day',h_month='$h_month',h_year='$h_year',h_gender='$h_gender',h_email='$h_email',h_address='$h_address',h_phone='$h_phone',h_nid='$h_nid' where h_id=$h_id";
    return execute($query);
  }

  function authenticateHouseholder($h_uname,$h_pass){
    $query = "select * from householder where h_uname='$h_uname' and h_pass='$h_pass'";
    $rs = get($query);
    if(count($rs) > 0){
		$_SESSION["h_id"]=$rs[0]["h_id"];
      return true;
	  //var_dump($rs);
	  //echo $rs[0]["h_id"];
    }
      return false;
  }
	function checkUsername($h_uname){
    $query = "select h_uname from householder where h_uname='$h_uname'";
    $rs = get($query);
    if(count($rs) > 0){
      //$_SESSION["h_id"]=$rs[0]["h_id"];
        return true;
      //var_dump($rs);
      //echo $rs[0]["h_id"];
      }
        return false;
  }
  function checkPhone($h_phone){
    $query = "select h_phone from householder where h_phone='$h_phone'";
    $rs = get($query);
    if(count($rs) > 0){
      //$_SESSION["h_id"]=$rs[0]["h_id"];
        return true;
      //var_dump($rs);
      //echo $rs[0]["h_id"];
      }
        return false;
  }
  function checkNid($h_nid){
    $query = "select h_nid from householder where h_nid='$h_nid'";
    $rs = get($query);
    if(count($rs) > 0){
      //$_SESSION["h_id"]=$rs[0]["h_id"];
        return true;
      //var_dump($rs);
      //echo $rs[0]["h_id"];
      }
        return false;
  }

?>
