<?php
	$host = 'localhost';
	$user = 'trservic_admindashuser';
	$pass = 'U-2d6YfcV#&i';
	$dbname = 'trservic_admin_dash';
	//setting Connection
	$conn = new mysqli($host, $user, $pass, $dbname);
	//showing alert
	if(!$conn) {
		echo '<h1>Database Not Connected</h1>';
	}
?>