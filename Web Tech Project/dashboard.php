<?php
  include 'main_header.php';
  include 'householder_header.php';
  include 'controllers/PropertyController.php';

  //session_start();
  //var_dump($_SESSION);
  //$properties = getProperties($_SESSION["h_id"]);
  if(!isset($_SESSION["h_uname"])){
    header("Location: login.php");
  }
  $h_uname = $_SESSION["h_uname"];//bujhte hobe
  $prop =  getHouseholderWithUsername($h_uname);//bujhte hobe
  //$h_uname = $_GET["h_uname"];//bujhte hobe
  //$prop = getCustomerWithUsername($h_uname);//bujhte hobe



?>
<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard</title>
  </head>
  <style>
table, td, th {
  border: 1px solid black;
}

table {
  width: 100%;
  border-collapse: collapse;
}
</style>
  
  <body>
    <div class="body_2">
    <script src="js/properties.js"></script>
    
    <h3 align="center">Welcome <?php echo $_SESSION["h_uname"]?></h3>
    <table align="center" >
    <center>
     
      <div id="suggestion"></div>
      <thead>
        <th>Property Type</th>
        <th>Property Area</th>
        <th>Property Location</th>
        <th>Property Price</th>
        <th>Householder</th>
        <th>Description</th>

       
        <th>Edit</th>
        <th>Delete</th>
      </thead>
      <tbody>
        <?php
            $properties = getProperties($prop["h_id"]);
            foreach($properties as $p){
                $p_id = $p["p_id"];
                
                echo "<tr>";
                  echo "<td>".$p["p_type"]."</td>";
                  echo "<td>".$p["p_area"]."</td>";
                  echo "<td>".$p["p_location"]."</td>";
                  echo "<td>".$p["p_price"]."</td>";
                  echo "<td>".$p["h_id"]."</td>";
                  echo "<td>".$p["p_description"]."</td>";
               
                  echo '<td><a class="btn-link" href="editproperty.php?p_id='.$p_id.'">Edit</a></td>';
                  echo '<td><a class="btn-link1" href="deleteproperty.php?p_id='.$p_id.'">Delete</a></td>';
               echo "</tr>";
               
             }
         ?>
      </tbody>
      
    </center><br>
    </table><br>
         


    </div>
  </body>
</html>



<center><?php include 'householder_footer.php';?></center>
