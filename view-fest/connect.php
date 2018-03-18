<?php
$connection = mysqli_connect("localhost","root","");
if(!$connection)
{
	echo "failed to connect";
}
$dbsellect = mysqli_select_db($connection,'icems');
if(!$dbsellect)
{
	echo "failed to select the database";
}

?>