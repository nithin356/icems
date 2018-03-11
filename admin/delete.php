<?php
require('connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
		$sql="DELETE FROM add_event WHERE e_id=$id";
	  	$psql="DELETE FROM result WHERE r_id=$id";
	  
		$result = mysqli_query($connection, $sql);
		$presult = mysqli_query($connection, $psql);
		if($result)
		{
			echo "Deleted successfully.";
			//echo '<script> window.location="edit.php?id="; </script>';
		}
		else
		{
			echo "Error!";
		}
	  if($presult)
		{
			echo "Deleted successfully.";
			//echo '<script> window.location="edit.php?id="; </script>';
		}
		else
		{
			echo "Error!";
		}
	  
  }
}
?>
