<?php
  include 'main_header.php';
  include 'householder_header.php';
  include 'controllers/PropertyController.php';
  //session_start();

  $h_uname = $_SESSION["h_uname"];//bujhte hobe
  $prop =  getHouseholderWithUsername($h_uname);//bujhte hobe
  //var_dump($_SESSION);
  //echo $_SESSION["h_uname"];

  //$properties = getHouseholders();
?>
<html>
<script src="js/addproperties.js"></script>
  <head>
    <title>Add Property</title>
  </head>
    <body>
  <div class="add_property">
  <h5><?php echo $err_db;?></h5>
  <form action="" onsubmit="return validate()" method="post" enctype="multipart/form-data">
    <center>
      <br><h1>Add Property<h1>
    <table>
       <tr>
            <td align="center">Property Type:</td>
            <td>
            <select id="p_type" name="p_type">
              <option selected disabled value="">--Choose--</option>
              <option value="Common Law Freehold">Common Law Freehold</option>
              <option value="Permanent Lease/Khas Lease">Permanent Lease/Khas Lease</option>
              <option value="Leasehold">Leasehold</option>
              <option value="Sharecroping Agreement">Sharecropping Agreement</option>
              <option value="Customary Ownership">Customary Ownership</option>
              <option value="Co-operative Ownership">Co-operative Ownership</option>
              <option value="Tied Tenancy">Tied Tenancy</option>
              <otion value="Informal Tenure">Informal Tenure</option>
            </select><span class="id" id="err_p_type"><?php echo $err_p_type;?></span>
            </td>
      </tr>
        <tr>
          <td align="center">Property Area:</td>
          <td><input id="p_area" type="text" name="p_area">
        <span class="id" id="err_p_area"><?php echo $err_p_area;?></span></td>
        </tr>
        <tr>
          <td align="center">Property Location:</td>
          <td><input id="p_location" type="text" name="p_location">
        <span class="id" id="err_p_location"><?php echo $err_p_location?></span></td>
        </tr>
        <tr>
          <td align="center">Property Price:</td>
          <td><input id="p_price" type="text" name="p_price">
        <span class="id" id="err_p_price"><?php echo $err_p_price;?></span></td>
        </tr>
        <tr>
          <td align="center">Property Description:</td>
          <td><textarea id="p_description" type="text" name="p_description"></textarea>
        <span class="id" id="err_p_description"><?php echo $err_p_description;?></span></td>
        </tr>
       
        <tr>
		  <td align="center"></td>
		  <td><input type="hidden" name="h_id" value="<?php echo $prop["h_id"];?>"></td>

		</tr>
        <tr>
           <td align="center"></td>
           <td><input type="submit" name="add_property" value="Add Property"></td>
        </tr>

    </table>
    </center>
  </form>
  </div>
</body>
</html>











<center><?php include 'householder_footer.php'?></center>
