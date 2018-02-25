<?php



//print_r($_POST);



//require('wp-config.php');

require_once("../../../wp-config.php");


$hostname = DB_HOST;

$username = DB_USER;

$password = DB_PASSWORD;


// Create connection

$conn = mysqli_connect($hostname, $username, $password, DB_NAME) or die("Unable to connect to mysqli");



$c_id					=		mysqli_real_escape_string($conn,$_POST['c_id']);

$c_name 				=		mysqli_real_escape_string($conn,$_POST['c_name']);

$address				=		mysqli_real_escape_string($conn,$_POST['address']);

$phone					=		mysqli_real_escape_string($conn,$_POST['phone']);

$email					=		mysqli_real_escape_string($conn,$_POST['email']);

$website				=		mysqli_real_escape_string($conn,$_POST['website']);

$status					=		mysqli_real_escape_string($conn,$_POST['status']);

$comments				=		mysqli_real_escape_string($conn,$_POST['comments']);







if(!empty($c_id))

{

		$update_company	=	"UPDATE internal_data SET c_name = '$c_name', c_add = '$address', phone = '$phone', email_id = '$email', website = '$website', status = '$status', comments = '$comments' WHERE c_id = '$c_id' ";		

		$result 	= mysqli_query($conn, $update_company);

		

		echo 1;

		

}

else {

    echo "Error: " . $sql . "<br>" . $conn->error;

}



$conn->close();





?>