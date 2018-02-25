<?php
global $resume_preview;
include("database.php");


echo '

<script type="text/javascript">
function printpage(id){

window.open(
  \'http://sezplus.com/jobs/resume-view/?id=\' + id,
  \'_blank\'
);
}
</script>
';
// INIT Variable with default value
$show_resume = 0;
$emp_id = get_current_user_id( );
$user_ID = $post->post_author;
$user_meta = get_user_meta($post->post_author);
$current_user = wp_get_current_user();
if ( !($current_user instanceof WP_User) )
   return;
$roles = $current_user->roles;  //$roles is an array

//echo $user_meta['cjfm_last_login'][0];
$current_time = time();

$three_days_ago = $current_time - 259200;
$last_login_time = $user_meta['cjfm_last_login'][0];
$inactive = false;
if($three_days_ago > $last_login_time)
{
	// inactive
    $inactive = true;
	echo '
<div style="background-color: #9A2A2A;
    padding: 8px;
    text-align: center;
    margin-bottom: 20px;
    font-size: 22px;
    border-radius: 8px;
    color: white;
    width: 50%;">Inactive</div>';


}else{
	// active
	echo '<div style="background-color: #469A2A;
    padding: 8px;
    text-align: center;
    margin-bottom: 20px;
    font-size: 22px;
    border-radius: 8px;
    color: white;
    width: 50%;">Active</div>';
}


if ( $resume_preview ) {
	return;
}

if($_GET['candidate_id'])
{

    $duplicate_check =	"SELECT * FROM applied_job_details WHERE user_ID = '{$_GET['candidate_id']}' AND emp_id = '{$emp_id}' AND sent_by_emp = '1' ;";
    $result = mysqli_query($conn, $duplicate_check);
    if ($result->num_rows > 0)
    {
           // Do Nothing... because already exists
    }else{

        $candidate_id = $_GET['candidate_id'];
        $sql = "INSERT INTO applied_job_details ( user_ID, sent_by_emp, emp_id ) VALUES ( '{$candidate_id}', '1', '$emp_id' )";


        if(mysqli_query($conn, $sql))
        {
            $apply_sent = true;

            echo '<div style="background-color: #469A2A;
            padding: 8px;
            text-align: center;
            margin-bottom: 20px;
            font-size: 22px;
            border-radius: 8px;
            color: white;
            width: 50%;">Candidate Selected</div>';
        } else {

            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$duplicate_check	=	"SELECT * FROM applied_job_details WHERE user_ID = '$user_ID' AND emp_id = '$emp_id' AND sent_by_emp = '1' ;";
$result = mysqli_query($conn, $duplicate_check);
if ($result->num_rows > 0)
{

    $chck_apr_sql = "SELECT * FROM applied_job_details WHERE user_ID = '$user_ID' AND emp_id = '$emp_id' AND sent_by_emp = '1' AND approved_by_candidate = '1'; ";
    $result = mysqli_query($conn, $chck_apr_sql);
    if($result->num_rows > 0)
    {
        echo '
        <img style="margin-bottom:12px;" src="https://www.sezplus.com/jobs/wp-content/uploads/2016/04/watermark.png"/>

        <p class="print" style="margin-bottom:12px;">
        <INPUT TYPE="submit" onclick="printpage('.$post->post_author.')" value="Download Resume">
        </p>';
        $show_resume = 1;

    }else{
        echo "<p>You've already Selected this Candidate. Waiting for Candidate's Approval.</p>";
    }

}else {
if(!$inactive)
{
    if( $roles['0'] !== 'subscriber' )
    {
$duplicate_check        =       "SELECT * FROM applied_job_details WHERE user_ID = '$user_ID' AND emp_id = '$emp_id' AND sent_by_emp = '1' ;";
$result = mysqli_query($conn, $duplicate_check);
if ($result->num_rows > 0)
{

}
        echo '
        <form type="POST" action="" name="select_candidate" style="margin-bottom: 12px;">
        <INPUT TYPE="text" name="candidate_id" hidden value="'.$post->post_author.'">
        <INPUT TYPE="submit" name="submit" value="Select Candidate">
        </form>';
    }
}
}

if($show_resume) {

    if ( resume_manager_user_can_view_contact_details( $post->ID ) ) :
        wp_enqueue_script( 'wp-resume-manager-resume-contact-details' );
        ?>
        <div class="resume_contact">
            <input class="resume_contact_button" type="button" value="<?php _e( 'Contact', 'wp-job-manager-resumes' ); ?>" />

            <div class="resume_contact_details">
                <?php do_action( 'resume_manager_contact_details' ); ?>
            </div>
        </div>
    <?php else : ?>

        <?php get_job_manager_template_part( 'access-denied', 'contact-details', 'wp-job-manager-resumes', RESUME_MANAGER_PLUGIN_DIR . '/templates/' ); ?>

    <?php endif; ?>
<?php } ?>
