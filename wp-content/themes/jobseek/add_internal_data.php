<?php




//require('wp-config.php');

require_once("/var/www/html/sezplus/jobs/wp-config.php");
$hostname = DB_HOST;
$username = DB_USER;
$password = DB_PASSWORD;


// Create connection
$conn = mysqli_connect($hostname, $username, $password, DB_NAME) or die("Unable to connect to mysqli");

$user_ID = mysqli_real_escape_string($conn,$_POST['user_ID']);

$c_name = mysqli_real_escape_string($conn,$_POST['c_name']);

$address = mysqli_real_escape_string($conn,$_POST['address']);

$phone	= mysqli_real_escape_string($conn,$_POST['phone']);

$email	= mysqli_real_escape_string($conn,$_POST['email']);

$website = mysqli_real_escape_string($conn,$_POST['website']);

$status	= mysqli_real_escape_string($conn,$_POST['status']);

$comments = mysqli_real_escape_string($conn,$_POST['comments']);


	$duplicate_email_check	=	"SELECT email_id FROM internal_data WHERE email_id LIKE '$email' ";

	$result = mysqli_query($conn, $duplicate_email_check);

	if ($result->num_rows > 0) {
		
		echo '1';

	}else {


$sql = "INSERT INTO internal_data ( c_name, c_add, user_id, phone, email_id, website, status, comments ) VALUES ( '$c_name', '$address', '$user_ID', '$phone', '$email', '$website', '$status', '$comments' )";



if(mysqli_query($conn, $sql)){

    echo mysqli_insert_id($conn); //"New record created successfully";

} else {

    echo "Error: " . $sql . "<br>" . $conn->error;

}
	}

$conn->close();

?>
