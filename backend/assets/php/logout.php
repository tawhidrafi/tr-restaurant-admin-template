<?php
	session_start ();
	
	if(!isset($_SESSION['login']) && $_SESSION['login'] != true ) {
			header ('location: signin.php');
		}
	
	include 'connection.php';

	session_destroy ();
	
	header ('location: signin.php');
?>