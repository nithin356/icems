<?php
require_once('connect.php');
if(isset($_POST) & !empty($_POST))
{
	$fest = mysqli_real_escape_string($connection, $_POST['fest']);
	$sql = "SELECT * FROM `fest` WHERE fest ='$fest'";
	$result = mysqli_query($connection, $sql);
	$count = mysqli_num_rows($result);
	if($count == 1)
	{
		echo "Fest name already Exists";
	}
	//else
//	{
//		echo "Event name available";
//	}
}
?>