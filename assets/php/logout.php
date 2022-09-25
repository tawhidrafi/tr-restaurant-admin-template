<?php
	session_start ();
	
	if(!isset($_SESSION['login']) && $_SESSION['login'] != true ) {
			header ('');
		}
	
	include '';

	session_destroy ();
	
	header ('');
?>