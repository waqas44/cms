<?php

// echo phpinfo();
// $host = "localhost";
// $user = "";
// $pass = "";
// $db_name ="learning"; connecting to server

$host = "localhost";
$user = "root";
$pass = "admin123";
$db_name = "small_cms";
$connect = mysqli_connect($host, $user, $pass, $db_name); //sending connection command

if (!$connect) //checking if sucessfully connected the server
	{
	echo "could not connect to server <br />";
	die("Connection failed: " . mysqli_connect_error());
	}
  else
	{
	//echo "<b>Connect to server Successfully! </b><br />";
	$db = mysqli_select_db($connect, $db_name);
	if (!$db)// checking if not connected to data base
		{
		echo "could not select to DB {$db_name}<br />";
		die("Select to DB failed: " . mysqli_error());
		}
	  else
		{
		//echo "Select to DB {$db_name} Successfully! <br />";
		}  
	}


function data_clean($data){ //cleaning the data and preventing from sql injection.
	
	 $data = stripslashes($data);
	 $data = htmlspecialchars ($data);
	// $data = mysqli_real_escape_string($connect,$data);
	 return $data;
	}
?>
