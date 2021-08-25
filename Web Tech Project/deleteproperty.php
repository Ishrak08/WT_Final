<?php
  include 'main_header.php';
  
  require_once 'controllers/PropertyController.php';
  
  $p_id = $_GET["p_id"];
  $prop = deleteProperty($p_id);

  
?>

<body>
  
  <div class="add_property">
  <form action="" method="post">
  <tr>
  <td align="center"></td>
		<td><input type="hidden" name="p_id" value="<?php echo $prop["p_id"];?>"></td>
  </tr>
  <tr>
  <h3>Are you sure you want to delete?</h3>
  </tr>
  <tr>
      <td align="center"></td>
      <td><input type="submit" name="delete_property" value="Yes"></td>
  </tr>
</form>
  </div>
</body>
