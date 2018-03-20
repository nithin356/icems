<?php
require('connect.php');
//fetch.php
if(isset($_POST["action"]))
{
 $output = '';
 if($_POST["action"] == "country")
 {
  $query = "SELECT parti FROM add_event WHERE e_id = '".$_POST["query"]."'";
  $result = mysqli_query($connection, $query);
	 $row = mysqli_fetch_array($result);
	 $loopid= 1;
  //$output .= '<input type="text" placeholder="Enter participent name"> <br>';
 while($loopid <= $row['parti'])
  {
   $output .= '<input required type="text" name="parti'.$loopid.'" class="form-control" placeholder="Enter participant '.$loopid.' name"> <br>';
	 $loopid++;
 }
 }
 echo $output;
}
?>