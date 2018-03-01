<?php
require_once('connect.php');
if(isset($_POST) & !empty($_POST))
{
	$username = mysqli_real_escape_string($connection, $_POST['e_eventname']);
	$sql = "SELECT * FROM `add_event` WHERE e_eventname='$e_eventname'";
	$result = mysqli_query($connection, $sql);
	$count = mysqli_num_rows($result);
	if($count == 1)
	{
		echo "Event name already written";
	}
	//else
	//{
	//	echo "Username available";
	//}
}
?>