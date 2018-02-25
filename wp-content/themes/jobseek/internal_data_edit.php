<?php



//require('wp-config.php');

require_once("../../../wp-config.php");

$hostname = DB_HOST;

$username = DB_USER;

$password = DB_PASSWORD;

// Create connection

$conn = mysqli_connect($hostname, $username, $password, DB_NAME) or die("Unable to connect to mysqli");





	$resume_data		=	'SELECT * FROM internal_data WHERE c_id = '.$_GET['c_id'].' ';

	$result 			= 	mysqli_query($conn, $resume_data);

	$user_res_data 		= 	mysqli_fetch_assoc($result);





?>



<form id="internal_data_edit" enctype="multipart/form-data">



    <fieldset class="fieldset-job_title">

        <input type="text" placeholder="Company Name *" id="c_name" name="c_name" class="input-text txt_width" value="<?php echo $user_res_data['c_name'] ?>">

        <input type="hidden" id="c_id" name="c_id" class="input-text txt_width" value="<?php echo $_GET['c_id'] ?>">

    </fieldset> 

    

    <fieldset class="fieldset-job_title">

        <input type="text" placeholder="Address *" id="address" name="address" class="input-text txt_width" value="<?php echo $user_res_data['c_add'] ?>">

    </fieldset> 

              

    <fieldset class="fieldset-job_title">

        <input type="text" placeholder="Phone No*" name="phone" class="input-text txt_width" value="<?php echo $user_res_data['phone'] ?>">

    </fieldset> 

    

    <fieldset class="fieldset-job_title">

        <input type="text" placeholder="Email *" id="email" name="email" class="input-text txt_width" value="<?php echo $user_res_data['email_id'] ?>">

    </fieldset> 

    

    <fieldset class="fieldset-job_title">

        <input type="text" placeholder="Website" id="website" name="website" class="input-text txt_width" value="<?php echo $user_res_data['website'] ?>">

    </fieldset>    

    

    <fieldset class="fieldset-job_title">

    

        <ul class="job_types" style="border-top:none; margin-top:-20px;">

                <li>

                    <label class="full-time" for="job_type_full_time">

                    <input type="radio" value="1"  <?php if( $user_res_data['status'] == 1) { ?> checked="checked" <?php } ?> name="status">Active </label>

                </li>

                <li>

                    <label class="internship" for="job_type_internship">

                    <input type="radio" value="0" <?php if( $user_res_data['status'] == 0) { ?> checked="checked" <?php } ?> name="status">  Inactive</label>

                </li>     

        </ul>

    <br />

    </fieldset> 



                

    <fieldset class="fieldset-job_title">

	    <textarea class="input-text txt_width" name="comments" id="comments" style="height:80px;" placeholder="Comments">

        <?php echo $user_res_data['comments'] ?>

        </textarea>

    </fieldset>  



    

    <fieldset class="fieldset-job_title">

	    <input id="btn_send" type="submit" value="Edit"  class="button btn btn-primary" >

        <input id="btn_wait" type="button" value="Save" class="button btn btn-primary" style="display:none;">

    </fieldset>   <br />    

            

</form>



</div>







<script>







function close_model(){

	$('#modal').modal('hide');

}



jQuery(document).ready(function($){	



    jQuery('#internal_data_edit').validate({ // initialize the plugin

        rules: 			{

            				c_name		: 	{ 	required: true	},

							address		: 	{ 	required: true	},

							phone		: 	{ 	required: true	},

							email		: 	{ 	required: true, email: true	}

						},

		messages:		{

							user_name: 	{ required: "Please Enter Valid Name."	}	

						},					

		submitHandler: function(form) {

			jQuery.ajax({

				type		:	"POST",

				url			:	"//sezplus.com/jobs/wp-content/themes/jobseek/edit_internal_data.php",						

				data		:	$("#internal_data_edit").serialize(),

				success		: 	function(res)	{

					

					

													if(res == 1)

													{

															jQuery('.modal-dialog').hide();

															jQuery('.modal-backdrop').hide();															

														

																BootstrapDialog.show({

																	title: 'Information',

																	message: ' Company Details Updated.',

																	cssClass: 'login-dialog',

																	buttons: [{

																		label: 'Ok',

																		cssClass: 'btn-primary',

																		action: function(dialog){

																			dialog.close();																			

																			

																		}

																	}]

																});															

													}

													

												

												}

			});





						}

    });

	

});





</script>
