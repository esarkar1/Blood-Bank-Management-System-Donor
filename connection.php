<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn){
	//echo "Connection Successful";
}

else{
	echo"Connection Failed".mysqli_connect_error();
}

?>


