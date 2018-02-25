<?php

require('/var/www/html/sezplus/jobs/wp-config.php');

$hostname = DB_HOST;
$username = DB_USER;
$password = DB_PASSWORD;

// Create connection
$conn = mysqli_connect($hostname, $username, $password, DB_NAME) or die("Unable to connect to mysqli");

$action =mysqli_real_escape_string($conn,$_POST['action']);
$cid=mysqli_real_escape_string($conn,$_POST['c_id']);


if($action == "delete" )
{

		$delete_data	=	"UPDATE internal_data SET visible = '0' WHERE c_id	=	'$cid' ";
		$result 		= 	mysqli_query($conn, $delete_data);
		
}
else 	
{    
	echo "Error: " . $sql . "<br>" . $conn->error;
}



?>
