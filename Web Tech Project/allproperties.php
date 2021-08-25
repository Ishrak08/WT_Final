<?php

  //require_once 'controllers/PropertyController.php';
  //$properties = getProperties();

?>
<!--<h3>Properties Sold</h3>
<table>
  <thead>
      <th>Property Type</th>
      <th>Property Area</th>
      <th>Property Location</th>
      <th>Property Price</th>
      <th>Householder</th>
      <th></th>
      <th></th>
  </thead>
  <tbody>
      <?php
        foreach($properties as $p){
          $p_id = $p["p_id"];
          echo "<tr>";
            echo "<td>".$p["p_type"]."</td>";
            echo "<td>".$p["p_area"]."</td>";
            echo "<td>".$p["p_location"]."</td>";
            echo "<td>".$p["p_price"]."</td>";
            echo "<td>".$p["h_name"]."</td>";
            echo '<td><a href="editproperty.php?p_id='.$p["p_id"].'">Edit</a></td>';
            echo '<td><a href="">Delete</a></td>';
          echo "</tr>";
        }
      ?>
  </tbody>
</table>
-->
