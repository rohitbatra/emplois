<?php

/**

 * Template Name: PaymentStatus

 */



// This is the Original File being used by Employer & Candidate Dashboard -- Rohit Batra



get_header();



include("database.php");



$user_ID = get_current_user_id();



$current_user = wp_get_current_user();

if ( !($current_user instanceof WP_User) )

   return;

$roles = $current_user->roles;  //$roles is an array
$mydata = get_user_meta($user_ID);

if($user_ID != 0) {
  if($roles['0'] == 'administrator' || $roles['0'] == 'editor') {

	$posts  =  "SELECT * from plans_status ORDER BY  `purchasetime` ASC";

	$result = mysqli_query($conn, $posts);



	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {

		    $payments[] = $row;

		}

		echo '
<section id="title">
		<div class="container">
			<h1>Payments</h1>
					</div>
	</section>

<section id="content">
   <div class="container">
<table class="resume-manager-resumes table table-striped">
   <thead>
      <tr>
         <th class="resume-category">Payment ID</th>
         <th class="resume-category">Order ID</th>
         <th class="resume-category">Tracking ID</th>
         <th class="resume-category">Amount</th>
         <th class="resume-category">Company Name</th>
	 <th class="resume-category">Company Email</th>
	 <th class="resume-category">Contact Person</th>
         <th class="resume-category">Phone</th>
         <th class="date">Datetime</th>
      </tr>
   </thead>
   <tbody>';



   foreach ($payments as $key => $value) {



$user_info = get_user_meta($value['user_id']);



/*

echo '<pre>';

print_r($user_info);

echo '</pre>';

*/

      echo '<tr>

         <td>'.$value['id'].'</td>

         <td>'.$value['order_id'].'</td>

         <td>'.$value['tracking_id'].'</td>

         <td>'.$value['amount'].'</td>

	 <td>'.$user_info['company_name'][0].'</td>

	 <td>'.$user_info['user_email'][0].'</td>

         <td>'.$user_info['first_name'][0].' '.$user_info['last_name'][0].'</td>

         <td>'.$user_info['phone-no'][0].'</td>

         <td>'.date('d-m-Y', $value['purchasetime']).'</td>

      </tr>';



   	# code...

   }



   echo '</tbody>

</table>





   </div>

</section>



';





	} else {

		$nopaymentlist = 1;

		echo '<center><br /><br /><br /><br />Payment List Empty<br /><br /><br /><br /></center>';

	}







	}else{





	echo '<center><br /><br /><br /><br />You are not allowed here<br /><br /><br /><br /></center>';



	}



}







$conn->close();









?>





<?php

get_footer();