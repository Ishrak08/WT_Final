<?php
  include 'main_header.php';
  include 'householder_header.php';
  include 'controllers/PropertyController.php';

  $p_id = $_GET["p_id"];
  $prop = getProperty($p_id);
?>

<body>
    <div align="center" class="add_property">
    <h5><?php echo $err_db;?></h5>

    <form action=""  onsubmit="return validate()" method="post">
    <tr>
        <td align="right"><h4>Property Type:</h4></td>
        <td><input id="p_type" type="text" name="p_type" value="<?php echo $prop["p_type"];?>">
        <span class="id" id="err_p_type"><?php $err_p_type;?></span></td>
    </tr>
    <tr>
        <td align="right"><h4>Property Area:</h4></td>
        <td><input id="p_area" type="text" name="p_area" value="<?php echo $prop["p_area"];?>">
        <span class="id" id="err_p_area"><?php $err_p_area;?></span></td>
    </tr>
    <tr>
        <td align="right"><h4>Property Location:</h4></td>
        <td><input id="p_location" type="text" name="p_location" value="<?php echo $prop["p_location"];?>">
        <span class="id" id="err_p_location"><?php $err_p_location;?></span></td>
    </tr>
    <tr>
        <td align="right"><h4>Property Price:</h4></td>
        <td><input id="p_price" type="text" name="p_price" value="<?php echo $prop["p_price"];?>">
        <span class="id" id="err_p_price"><?php $err_p_price;?></span></td>
    </tr>
    <tr>
        <td align="right"><h4>Property Description:</h4></td>
        <td><input id="p_description" type="text" name="p_description" value="<?php echo $prop["p_description"];?>">
        <span class="id" id="err_p_description"><?php $err_p_description;?></span></td>
    </tr>
    <!--<tr>
        <td align="center">Image</td>
        <td><img width='80px' height='100px' src="$prop[p_img]"></td>
    </tr>-->
    <tr>
		<td align="center"></td>
		<td><input type="hidden" name="p_id" value="<?php echo $prop["p_id"];?>"></td>
    </tr>
    <tr>
        <td align="center"></td>
        <br><br><td><input type="submit" name="edit_property" value="Edit Property"></td>
    </tr>

</form>
    </div>
</body>
<script src="js/editproperty.js"></script>

<?php include 'householder_footer.php'?>
