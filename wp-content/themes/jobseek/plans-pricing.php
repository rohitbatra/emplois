<?php

/**

 * Template Name: PlansPricing

 */



get_header(); 

include("database.php");

//Get the User and Roles

$timestamp = strtotime(date("d-m-Y h:m:s"));

$user_ID = get_current_user_id();

$current_user = wp_get_current_user();

if ( !($current_user instanceof WP_User) )

   return;

$roles = $current_user->roles; 

// echo '<pre>';

// print_r($user_ID);

// print_r($roles);



		echo '<section id="title">

			<div class="container">

				<h1>Plans & Pricing</h1>

			</div>

			</section>

				<section id="content">

			   <div class="container">

			      <div class="vc_row wpb_row vc_row-fluid color-default">

<div class="wpb_column vc_column_container vc_col-sm-12">
<p style="color:#FFF; background-color: #14b1bb; font-family: Arial; font-size: 39px; font-weight: bold; letter-spacing: -0.05em; text-transform: uppercase; text-align:center;">PAY ONLINE</p>
</div>


					 <!-- Plan 1 : Copy from here -->

			         <div class="wpb_column vc_column_container vc_col-sm-6">

			            <div class="wpb_wrapper">

			               <div class="pricing">

			                  <ul>

			                     <li class="title">Classic Plan</li>

			                     <li class="price">INR 7,500/-</li>

			                     <li>post unlimited job openings and check unlimited number of resumes</li>

			                 <li>Minimum 3 candidates guaranteed & then every candidate Rs3,000/,                           pay only after the candidate is selected the job.</li>

                                              <li>Valid for 3 Months.</li>

                                             <li>One advertisement,for one month free.</li>

                                             <li>Please contact us, before purchasing any plan.</li>
			                  </ul>

			               </div>

						<form method="post" name="customerData" action="https://sezplus.com/jobs/wp-content/themes/jobseek/ccavRequestHandler.php">

							<input hidden type="text" name="tid" id="tid" value="'.$timestamp.'" readonly />

							<input hidden type="text" name="merchant_id" value="93868"/>

							<input hidden type="text" name="order_id" value="'.rand(99999, 999999).'"/>

							<input hidden type="text" name="amount" value="7500.00"/>

							<input hidden type="text" name="currency" value="INR"/>

							<input hidden type="text" name="redirect_url" value="https://sezplus.com/jobs/plans-pricing-return/"/>

							<input hidden type="text" name="cancel_url" value="https://sezplus.com/jobs/plans-pricing-return/"/>

							<input hidden type="text" name="language" value="EN"/>

							<INPUT TYPE="submit" value="CheckOut">

			            </form>

			            </div>

			         </div>

			<!-- Plan 1 : Copy till here END -->


			<!-- Plan 2 : Copy from here -->


			         <div class="wpb_column vc_column_container vc_col-sm-6">

			            <div class="wpb_wrapper">

			               <div class="pricing">

			                  <ul>

			                     <li class="title">Golden Plan</li>

			                     <li class="price">INR 15,000/-</li>

			                     <li>post unlimited job openings and check unlimited number of resumes</li>

                                              <li>Minimum 6 candidates guaranteed & then every candidate Rs3,000/,                           pay only after the candidate is selected the job.</li>

			                 <li>Valid for 6 Months.</li>

			                     <li>One advertisement,for one month free.</li>

                                             <li>Please contact us, before purchasing any plan.</li>

			                  </ul>

			               </div>

						<form method="post" name="customerData" action="https://sezplus.com/jobs/wp-content/themes/jobseek/ccavRequestHandler.php">

							<input hidden type="text" name="tid" id="tid" value="'.$timestamp.'" readonly />

							<input hidden type="text" name="merchant_id" value="93868"/>

							<input hidden type="text" name="order_id" value="'.rand(99999, 999999).'"/>

							<input hidden type="text" name="amount" value="15000.00"/>

							<input hidden type="text" name="currency" value="INR"/>

							<input hidden type="text" name="redirect_url" value="https://sezplus.com/jobs/plans-pricing-return/"/>

							<input hidden type="text" name="cancel_url" value="https://sezplus.com/jobs/plans-pricing-return/"/>

							<input hidden type="text" name="language" value="EN"/>

							<INPUT TYPE="submit" value="CheckOut">

			            </form>

			            </div>
 
			         </div>
			         <!-- Plan 3 : Copy from here -->


			         <div class="wpb_column vc_column_container vc_col-sm-6">

			            <div class="wpb_wrapper">

			               <div class="pricing">

			                  <ul>

			                     <li class="title">Advertisement Plan</li>

			                     <li class="price">INR 3,000/-</li>

			                     <li>post unlimited advertisement</li>

			                     <li>comment allowed</li>

			                     <li>one month valid</li>
								<li>Email allowed</li>
								<li>Web link allowed</li
			                  </ul>

			               </div>

						<form method="post" name="customerData" action="https://sezplus.com/jobs/wp-content/themes/jobseek/ccavRequestHandler.php">

							<input hidden type="text" name="tid" id="tid" value="'.$timestamp.'" readonly />

							<input hidden type="text" name="merchant_id" value="93868"/>

							<input hidden type="text" name="order_id" value="'.rand(99999, 999999).'"/>

							<input hidden type="text" name="amount" value="3000.00"/>

							<input hidden type="text" name="currency" value="INR"/>

							<input hidden type="text" name="redirect_url" value="https://sezplus.com/jobs/plans-pricing-return/"/>

							<input hidden type="text" name="cancel_url" value="https://sezplus.com/jobs/plans-pricing-return/"/>

							<input hidden type="text" name="language" value="EN"/>

							<INPUT TYPE="submit" value="CheckOut">

			            </form>

			            </div>

			         </div>

			<!-- Plan 3 : Copy till here END -->

<div  class="wpb_column vc_column_container vc_col-sm-12">

			            <div  class="wpb_wrapper">

			               <div class="pricing">

			                     <p style="color:#FFF; background-color: #14b1bb; font-family: Arial; font-size: 39px; font-weight: bold; letter-spacing: -0.05em; text-transform: uppercase;">PAY THROUGH CHEQUE & NETBANKING</p>

			                     <p style="text-align:left;"><b>Account Name -</b> RK SEZPLUS SERVICES PVT. LTD.<br/><b>Bank Name -</b> HDFC Bank ltd.<br/><b>Account Number -</b> 50200016765275<br/><b>Branch Name -</b> Jogeshwari-Vikhroli Link Road Branch.(JVLR) (Kalpataru Estate,Andheri(E),Mum-400093)<br/><b>RTGS/NEFT IFSC -</b> HDFC0001799</p>
			                  
			               </div></div></div>
			      </div>

			      <div class="vc_row wpb_row vc_row-fluid color-default">

			         <div class="wpb_column vc_column_container vc_col-sm-6">

			            <div class="wpb_wrapper"></div>

			         </div>

			         <div class="wpb_column vc_column_container vc_col-sm-6">

			            <div class="wpb_wrapper"></div>

			         </div>

			      </div>

			   </div>

			</section>

			<section id="footer">

			</section>

		';

get_footer();
