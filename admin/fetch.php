<?php
require('connect.php');
//fetch.php
if(isset($_POST["action"]))
{
 $output = '';
 if($_POST["action"] == "country")
 {
  $query = "SELECT e_eventname,e_id FROM add_event WHERE f_id = '".$_POST["query"]."'";
  $result = mysqli_query($connection, $query);
//$output .= '<input type="text" placeholder="Enter participent name"> <br>';
 while($row = mysqli_fetch_array($result))
  {
    $output .= '<option value="'.$row["e_eventname"].'">'.$row["e_eventname"].'</option>';
  }
 }
 echo $output;
}
?>