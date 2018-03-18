<?php
require('connect.php');
//fetch.php
if(isset($_POST["action"]))
{
 if($_POST["action"] == "fest")
 {
  $query = "SELECT fname FROM fest";
  $result = mysqli_query($connect, $query);
  $output .= '<option value="">Select Fest</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["f_id"].'">'.$row["e_eventname"].'</option>';
  }
 }
 echo $output;
}
?>