<?php



require_once("../../../wp-config.php");

$hostname = DB_HOST;

$username = DB_USER;

$password = DB_PASSWORD;



// Create connection

$conn = mysqli_connect($hostname, $username, $password, DB_NAME) or die("Unable to connect to mysqli");



$user_ID = $_POST['user_id'];

$job_ID = $_POST['job_id'];



$sql = "INSERT INTO applied_job_details ( user_ID, job_ID ) VALUES ( '$user_ID', '$job_ID' )";



if(mysqli_query($conn, $sql))
{
	//"New record created successfully"
        if(is_numeric(mysqli_insert_id($conn)))
	{
		echo '1';
	} 

} else {

	

    echo "Error: " . $sql . "<br>" . $conn->error;

}





$conn->close();



?>