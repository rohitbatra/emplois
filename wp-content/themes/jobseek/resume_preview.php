<?php
require_once("/var/www/html/sezplus/jobs/wp-config.php");

$hostname = DB_HOST;
$username = DB_USER;
$password = DB_PASSWORD;
$database = DB_NAME;

// Create connection
$conn = mysqli_connect($hostname, $username, $password, $database) or die("Unable to connect to mysqli");


	$resume_data		=	'SELECT * FROM resume_data WHERE res_no = '.$_GET['res_id'].' ';
	$result 			= 	mysqli_query($conn, $resume_data);
	$user_res_data 		= 	mysqli_fetch_assoc($result);

//	print_r($user_res_data);

?>

<div class="container" style="width:100%; background-image:url(//sezplus.com/jobs/wp-content/themes/jobseek/img/watermark.jpg); background-repeat: no-repeat; background-position: center;">
<!-- Personal Information Fields -->  
<table width="100%;" style="border-bottom:2px #999 solid;">
  <tr>
    <td colspan="2"><h3 style="margin:0.1em;"><?php echo $user_res_data['user_name'] ?></h3></td>
    <td rowspan="4" align="left">&nbsp;<img src="//sezplus.com/jobs/wp-content/themes/jobseek/img/avatar.jpg"/></td>
    <td width="1%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><?php echo $user_res_data['category'] ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">
		<?php echo $user_res_data['street_add'].', '.$user_res_data['city'].', '.$user_res_data['pincode']; ?><br />
		<?php echo $user_res_data['email']; ?>
  <fieldset class="fieldset-job_title">
        Date Of Birth : <?php echo $user_res_data['dob'] ?>
    </fieldset> 
    
    <fieldset class="fieldset-job_title">
        Sex : <?php echo $user_res_data['sex'] ?>
    </fieldset> 
              
    <fieldset class="fieldset-job_title">
        Religion : <?php echo $user_res_data['religion'] ?>
    </fieldset> 

	</td>

    <td>&nbsp;</td>
  </tr>  
</table>

<!-- Employment Information Fields -->



<?php if(!empty($user_res_data['basic_edu_qualification'])) { ?>
<div style="float: left;width: 50%;">

<!-- Educational Information Fields -->
<h2 style="margin:15px 0 10px 0;">Educational Details</h2>
 
     
    <fieldset class="fieldset-job_title">
        Graduation : <?php echo $user_res_data['basic_edu_qualification'] ?>
    </fieldset> 
    

    <fieldset class="fieldset-job_title">
        Type : <?php echo $user_res_data['job_types'] ?>
    </fieldset> 
    
    <fieldset class="fieldset-job_title">
        Specialization : <?php echo $user_res_data['basic_edu_specialization'] ?>
    </fieldset> 
    
    <fieldset class="fieldset-job_title">
        University/Institute : <?php echo $user_res_data['basic_edu_university'] ?>
    </fieldset> 
    
    <fieldset class="fieldset-job_title">
        Year : <?php echo $user_res_data['basic_edu_year'] ?>
    </fieldset> 
        
    <br />
        
    <fieldset class="fieldset-job_title">
        Post Graduation : <?php echo $user_res_data['post_edu_qualification'] ?>
    </fieldset>     

    <fieldset class="fieldset-job_title">
        Type : <?php echo $user_res_data['post_edu_job_type'] ?> 
    </fieldset> 
    
    <fieldset class="fieldset-job_title">
        Specialization : <?php echo $user_res_data['post_edu_specialization'] ?> 
    </fieldset> 
    
    <fieldset class="fieldset-job_title">
        University/Institute : <?php echo $user_res_data['post_edu_university'] ?> 
    </fieldset> 
    
    <fieldset class="fieldset-job_title">
        Year : <?php echo $user_res_data['post_edu_year'] ?> 
    </fieldset>                 


</div>

<?php } ?>

<?php if(!empty($user_res_data['cur_emp_name'])) { ?>
<!-- Employment Information Fields -->

<div style="float: left;width: 50%;">
<h2 style="margin:15px 0 10px 0;">Employment Details</h2>

   
    <fieldset class="fieldset-job_title">
            Current Employer Name :  <?php echo $user_res_data['cur_emp_name'] ?> 
    </fieldset> 


    <fieldset class="fieldset-job_title">
            Designation : <?php echo $user_res_data['cur_emp_designation'] ?> 
    </fieldset> 
    

    <fieldset class="fieldset-job_title">
            Start Date : <?php echo $user_res_data['cur_emp_start_date'] ?> 
<br />

            End Date : <?php echo $user_res_data['cur_emp_end_date'] ?> 
    </fieldset>
    
    <fieldset class="fieldset-job_title">
            Job Profile : <?php echo $user_res_data['cur_emp_job_profile'] ?> 
    </fieldset>    
<br />
   
    <fieldset class="fieldset-job_title">
            Previous Employer Name : <?php echo $user_res_data['pre_emp_name'] ?> 
    </fieldset> 


    <fieldset class="fieldset-job_title">
            Designation : <?php echo $user_res_data['pre_emp_designation'] ?> 
    </fieldset> 
    

    <fieldset class="fieldset-job_title">
            Start Date : <?php echo $user_res_data['pre_emp_start_date'] ?> <br />

            End Date :  <?php echo $user_res_data['pre_emp_end_date'] ?> 
    </fieldset>
    
    <fieldset class="fieldset-job_title">
            Job Profile : <?php echo $user_res_data['pre_emp_job_profile'] ?> 
    </fieldset>        
</div>
<?php } ?>
<!--    
    <fieldset class="fieldset-job_title"><br />
	    <input type="button" value="Save" class="button btn btn-primary " name="submit_job">
        <input type="button" value="Cancel" class="button btn btn-primary " name="submit_job" onclick="close_model();">
    </fieldset>   <br />-->

</div>

<script>
function close_model(){
$('#modal').modal('hide');
}
</script>:w

