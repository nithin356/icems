<?php
include_once 'connect.php';
session_start();
if(!isset($_SESSION['ausername']))
{
	echo'<script> window.location="403.html";</script>';
}
?>