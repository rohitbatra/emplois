<?php
//print_r($_FILES);
//exit;

$hostname = "localhost";
$username = "dibyendudhara123";
$password = "Dibyendhu123!@#";


// Create connection
$conn = mysqli_connect($hostname, $username, $password, 'sezplus') or die("Unable to connect to mysqli");
 
$user_name 					=	mysqli_real_escape_string($conn,$_POST['user_name']);
$user_ID					=	mysqli_real_escape_string($conn,$_POST['user_ID']);
$category					=	mysqli_real_escape_string($conn,$_POST['category']);
$email						=	mysqli_real_escape_string($conn,$_POST['email']);
$mobile_no					=	mysqli_real_escape_string($conn,$_POST['mobile_no']);
$dob						=	mysqli_real_escape_string($conn,$_POST['dob']);
$sex						=	mysqli_real_escape_string($conn,$_POST['sex']);
$religion					=	mysqli_real_escape_string($conn,$_POST['religion']);
$street_add					=	mysqli_real_escape_string($conn,$_POST['street_add']);
$optional_add				=	mysqli_real_escape_string($conn,$_POST['optional_add']);
$city						=	mysqli_real_escape_string($conn,$_POST['city']);
$pincode					=	mysqli_real_escape_string($conn,$_POST['pincode']);
$state						=	mysqli_real_escape_string($conn,$_POST['state']);
$country					=	mysqli_real_escape_string($conn,$_POST['country']);
$basic_edu_qualification	=	mysqli_real_escape_string($conn,$_POST['basic_edu_qualification']);
$basic_edu_type				=	mysqli_real_escape_string($conn,$_POST['basic_edu_type']);
$basic_edu_specialization	=	mysqli_real_escape_string($conn,$_POST['[basic_edu_specialization']);																 
$basic_edu_university		=	mysqli_real_escape_string($conn,$_POST['basic_edu_university']);
$basic_edu_year				=	mysqli_real_escape_string($conn,$_POST['basic_edu_year']);
$post_edu_qualification		=	mysqli_real_escape_string($conn,$_POST['post_edu_qualification']);
$post_edu_job_type			=	mysqli_real_escape_string($conn,$_POST['post_edu_job_type']);
$post_edu_specialization	=	mysqli_real_escape_string($conn,$_POST['post_edu_specialization']);
$post_edu_university		=	mysqli_real_escape_string($conn,$_POST['post_edu_university']);
$post_edu_year				=	mysqli_real_escape_string($conn,$_POST['post_edu_year']);
$cur_emp_name				=	mysqli_real_escape_string($conn,$_POST['cur_emp_name']);
$cur_emp_designation		=	mysqli_real_escape_string($conn,$_POST['cur_emp_designation']);
$cur_emp_start_date			=	mysqli_real_escape_string($conn,$_POST['cur_emp_start_date']);
$cur_emp_end_date			=	mysqli_real_escape_string($conn,$_POST['cur_emp_end_date']);
$cur_emp_job_profile		=	mysqli_real_escape_string($conn,$_POST['cur_emp_job_profile']);
$pre_emp_name				=	mysqli_real_escape_string($conn,$_POST['pre_emp_name']);
$pre_emp_designation		=	mysqli_real_escape_string($conn,$_POST['pre_emp_designation']);
$pre_emp_start_date			=	mysqli_real_escape_string($conn,$_POST['pre_emp_start_date']);
$pre_emp_end_date			=	mysqli_real_escape_string($conn,$_POST['pre_emp_end_date']);
$pre_emp_job_profile		=	mysqli_real_escape_string($conn,$_POST['pre_emp_job_profile']);
$status						=	mysqli_real_escape_string($conn,$_POST['profile_status']);
//$entry_date					=	mysqli_real_escape_string($_POST['user_name']);


	$duplicate_email_check	=	"SELECT email,res_no FROM resume_data WHERE email LIKE '$email' ";
	$result = mysqli_query($conn, $duplicate_email_check);
	if ($result->num_rows > 0) {
		
	$res_id 		= 	mysqli_fetch_assoc($result);	
		
		$update_user	=	"UPDATE resume_data SET user_name = '$user_name', category = '$category', email = '$email', mobile_no = '$mobile_no', dob = '$dob', sex = '$sex', religion = '$religion', street_add = '$street_add' , optional_add = '$optional_add', city = '$city', pincode = '$pincode', state = '$state', country = '$country', basic_edu_qualification = '$basic_edu_qualification', basic_edu_type = '$basic_edu_type', basic_edu_specialization = '$basic_edu_specialization' , basic_edu_university = '$basic_edu_university', basic_edu_year = '$basic_edu_year', post_edu_qualification = '$post_edu_qualification', post_edu_job_type = '$post_edu_job_type', post_edu_specialization = '$post_edu_specialization', post_edu_university = '$post_edu_university', post_edu_year = '$post_edu_year', cur_emp_name = '$cur_emp_name' , cur_emp_designation = '$cur_emp_designation', cur_emp_start_date = '$cur_emp_start_date', cur_emp_end_date = '$cur_emp_end_date', cur_emp_job_profile = '$cur_emp_job_profile', pre_emp_name = '$pre_emp_name', pre_emp_designation = '$pre_emp_designation', pre_emp_start_date = '$pre_emp_start_date', pre_emp_end_date = '$pre_emp_end_date' , pre_emp_job_profile = '$pre_emp_job_profile', status = '$status' WHERE user_ID	=	'$user_ID' ";
		$result 	= mysqli_query($conn, $update_user);
		
		echo $res_id['res_no'];

	}
else {

$sql = "INSERT INTO resume_data ( user_ID, user_name, category, email, mobile_no, dob, sex, religion, street_add, optional_add, city, pincode, state, country, basic_edu_qualification, basic_edu_type, basic_edu_specialization, basic_edu_university, basic_edu_year, post_edu_qualification, post_edu_job_type, post_edu_specialization, post_edu_university, post_edu_year, cur_emp_name, cur_emp_designation, cur_emp_start_date, cur_emp_end_date, cur_emp_job_profile, pre_emp_name, pre_emp_designation, pre_emp_start_date, pre_emp_end_date, pre_emp_job_profile, status )
VALUES ( '$user_ID', '$user_name', '$category', '$email', '$mobile_no', '$dob', '$sex', '$religion', '$street_add', '$optional_add', '$city', '$pincode', '$state', '$country', '$basic_edu_qualification', '$basic_edu_type', '$basic_edu_specialization', '$basic_edu_university', '$basic_edu_year', '$post_edu_qualification', '$post_edu_job_type', '$post_edu_specialization', '$post_edu_university', '$post_edu_year', '$cur_emp_name', '$cur_emp_designation', '$cur_emp_start_date', '$cur_emp_end_date', '$cur_emp_job_profile', '$pre_emp_name', '$pre_emp_designation', '$pre_emp_start_date', '$pre_emp_end_date', '$pre_emp_job_profile', '$status' )";


if(mysqli_query($conn, $sql)){

    echo mysqli_insert_id($conn);//"New record created successfully";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
$conn->close();


?>