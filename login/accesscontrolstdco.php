<?php
include_once 'connect.php';
session_start();
if(!(isset($_SESSION['s_username'])||isset($_SESSION['username'])))
{
	echo'<script> window.location="403.php";</script>';
}
?>