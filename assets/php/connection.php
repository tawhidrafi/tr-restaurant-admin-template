<?php
	$host = 'localhost';
	$user = '';
	$pass = '';
	$dbname = '';
	//setting Connection
	$conn = new mysqli($host, $user, $pass, $dbname);
	//showing alert
	if(!$conn) {
		echo '<h1>Database Not Connected</h1>';
	}
?>