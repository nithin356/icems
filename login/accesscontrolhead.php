<?php
include_once 'connect.php';
session_start();
if(!isset($_SESSION['h_username']))
{
	echo'<script> window.location="403.php";</script>';
}
?>