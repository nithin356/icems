<?php 
date_default_timezone_set('Asia/Kolkata');
//time
$getstdinfo=mysqli_query($connection,"SELECT *,fest.date FROM std_co JOIN fest ON std_co.fest=fest.f_id WHERE s_username='$username'");
$fetchstdinfo=mysqli_fetch_assoc($getstdinfo);
$getime=$fetchstdinfo['date'];
$timecount1=date('Y-m-d',(strtotime( '-1 day' , strtotime($getime))));

$todaydate=date('Y-m-d');
if($todaydate >= $timecount1)
{
	$disable=1;
}
else
{
	$disable=0;
}
 ?>
