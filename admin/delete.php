<?php
require('connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
  if (isset($_GET['e_id'])) {
    $e_id = $_GET['e_id'];
		$sql="DELETE FROM add_event WHERE e_id=$e_id";
		$result = mysqli_query($connection, $sql);
		if($result)
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
