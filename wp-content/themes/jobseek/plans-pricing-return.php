<?php
/**
 * Template Name: PlansPricing-Return
 */

get_header(); 

include("database.php");
include('Crypto.php');

//Get the User and Roles


$timestamp = strtotime(date("d-m-Y h:m:s"));

$user_ID = get_current_user_id();

$current_user = wp_get_current_user();
if ( !($current_user instanceof WP_User) )
   return;
$roles = $current_user->roles; 

	//error_reporting(0);
	
	$workingKey='E90DEFBC38BE1D13F737925FDADD197D';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	echo "<center>";
/*
	echo '<pre>';
	print_r($decryptValues);
	echo '</pre>';
*/
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3){
			$order_status=$information[1];
		}

		if($i==10){
			$amountpaid = $information[1];
		}
		if($i==0){

			$order_id = $information[1];
		}
		if($i==1){
			$tracking_id = $information[1];
		}	
	}

	if($order_status==="Success")
	{

		if($amountpaid == "7000.0"){
			$planselected = 1;
		}else{
			$planselected = 2;
		}

		//insert into database


		$sql = "INSERT INTO plans_status ( user_id, plan_id, status, order_id, tracking_id, amount, purchasetime ) VALUES ( ".$user_ID.", ".$planselected.", 1, ".$order_id.", ".$tracking_id.", ".$amountpaid.", ".$timestamp." )";


		if(mysqli_query($conn, $sql)){

		    mysqli_insert_id($conn);//"New record created successfully";

			echo "<br><br><br><br><br>Thank you for the payment! We will activate your service within next 24 hours, you will recieve an email from us shortly.<br><br>For any doubts or queries, send us an email: <a href='mailto:support@sezplus.com'>support@sezplus.com</a><br><br><br><br>";

		} else {
		    //echo "Error: " . $sql . "<br>" . $conn->error;

			echo "Payment Processed, but there was some errors";

		}
		$conn->close();


		
	}
	else if($order_status==="Aborted")
	{
		echo "<br><br><br><br><br><br><br>The Process has been aborted, Please contact Support.<br><br><br><br><br><br>";

	
	}
	else if($order_status==="Failure")
	{
		echo "<br><br><br><br><br><br><br>The transaction has been declined. Please contact Support.<br><br><br><br><br><br>";
	}
	else
	{
		echo "<br><br><br><br><br><br><br>Security Error. Illegal access detected<br><br><br><br><br><br><br>";

	
	}

	echo "<br><br>";

	/*
	echo "<table cellspacing=4 cellpadding=4>";
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
	    	echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
	}

	echo "</table><br>";

	*/

	echo "</center>";



get_footer();
