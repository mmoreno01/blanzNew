<?php 
	$db = mysqli_connect('localhost','root', 'passwdL0l1t4', 'contactohgcorp'); 

	if(mysqli_connect_errno())
	{
		echo 'Failed to connect to MySQL: '.mysqli_connect_error();
	}
 ?>