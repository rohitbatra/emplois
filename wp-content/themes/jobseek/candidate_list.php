<?php
/*
 * Template Name: CandidateList
 */
get_header();
global $resume_preview;
include("database.php");
$noApplicants = false;
$jobID = $_GET['jobID'];
$sql =  "SELECT * FROM applied_job_details WHERE job_ID = '{$jobID}'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $applicantIdArr[$row['user_ID']] = $row;
    }
} else {
   $noApplicants = true;
}

echo '
    <section id="title">
        <div class="container">
            <h2>Applied Candidate List</h2>
        </div>
    </section>';


echo '
<script type="text/javascript">
    function printpage(id){
        window.open(
          \'//sezplus.com/jobs/resume-view/?id=\' + id,
          \'_blank\'
        );
    }
</script>';

if($noApplicants === false) {

    if($_GET['sendcall'] == '1') {

        if(array_key_exists('approve',$_GET)) {

            $sendcall_id = $userId = $_GET['userID'];

            $jobId = $_GET['jobID'];

            $posts  =  "SELECT approved_by_company FROM applied_job_details WHERE job_ID = '{$jobId}' AND user_ID = '{$userId}'";

            $result = mysqli_query($conn, $posts);

            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                    $apr = $row['approved_by_company'];
                }
            }

            if($apr !== '1') {

                $posts = "UPDATE applied_job_details SET approved_by_company = '1' WHERE job_ID = '{$jobId}' AND user_ID = '{$userId}'";

                $result = mysqli_query($conn, $posts);

                //-----------------------------------------
                // Send Call Letter Functionality
                //-----------------------------------------

                if(strlen($applicantMetaArr[$sendcall_id]['meta']['phone_no'][0]) == 0) {
                    $candidate_phone_number = '9768230192';

                } else if(strlen($applicantMetaArr[$sendcall_id]['meta']['phone_no'][0]) > 10) {
                    $candidate_phone_number = substr((int)$applicantMetaArr[$sendcall_id]['meta']['phone_no'][0],2,10);
                } else {
                    $candidate_phone_number = $applicantMetaArr[$sendcall_id]['meta']['phone_no'][0];
                }

                $candidate_name  =  $applicantMetaArr[$sendcall_id]['meta']['first_name'][0] ." ". $applicantMetaArr[$sendcall_id]['meta']['last_name'][0];

                if(!$candidate_phone_number) {

                    echo "<p class='error center'>Phone Number is not available for {$jobmeta['_candidate_name'][0]}.</p>";

                } else {

                    // We got the phone number. send message.
                    // Get the job meta first, we need contact person details.

                    $jobmeta = get_post_meta($jobID);

                    $apiKey = "fIGPfvyRREQ-AhC2MBBByyTkOBrtdr6yGarPJlWxFQ";

                    // Config variables. Consult http://api.textlocal.in/docs for more info.
                    $test = "0";
                    // Data for text message. This is the text message data.
                    $sender = "SEZPLS"; // This is who the message appears to be from.
                    $numbers = "91".$candidate_phone_number; // A single number or a comma-seperated list of numbers

                    // Check for the Company Details too
                    if(strlen($jobmeta['_contact_person'][0]) == 0 || strlen($jobmeta['_contact_num'][0]) == 0) {

                        // SQL to Find company contact Info
                        $cmpMeta  =  "SELECT wp_um.meta_key, wp_um.meta_value FROM wp_usermeta AS wp_um WHERE wp_um.user_id = (SELECT post_author FROM wp_posts WHERE ID = '{$jobId}')";

                        $result = mysqli_query($conn, $cmpMeta);

                        while($row = $result->fetch_assoc()) {

                            if($row['meta_key'] == '_contact_person'){
                                $contactPerson = substr($row['meta_value'],0,20);
                            }elseif ($row['meta_key'] == '_contact_num'){
                                $contactNumber = substr($row['meta_value'],0,17);
                            }
                        }

                    } else {
                        $contactPerson = substr($jobmeta['_contact_person'][0],0,20);
                        $contactNumber = substr($jobmeta['_contact_num'][0],0,17);
                    }

                    $message = "Hello ".substr($candidate_name,0,13).", you are selected for interview at ".substr($jobmeta['_company_name'][0],0,23).". Please Contact: ".$contactPerson.", Phone: ".$contactNumber." - SEZPLUS Team";

                    // 612 chars or less
                    $message = urlencode($message);

                    $data = "apiKey=".$apiKey."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;

                    $ch = curl_init('http://api.textlocal.in/send/?');

                    curl_setopt($ch, CURLOPT_POST, true);

                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                    $result = curl_exec($ch); // This is the result from the API

                    curl_close($ch);

                    //-------------------------------------------------------
                }
            }
        }
    }

    $applicantsIdArrKeys = array_keys($applicantIdArr);

    foreach ($applicantsIdArrKeys as $key => $value) {

        // QUERY TO FETCH THE USER POST
        $userSql  =  "SELECT ID FROM wp_posts WHERE post_author = '{$value}' LIMIT 1";
        $result = mysqli_query($conn, $userSql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $applicantId = $row['ID'];
            }
        }
        // Get the Post meta
        $applicantMetaArr[$value]['postdata'] = get_post($applicantId, ARRAY_A);
        $applicantMetaArr[$value]['postmeta'] = get_post_meta($applicantId);
        $applicantMetaArr[$value]['userdata'] = get_userdata($value);
        $applicantMetaArr[$value]['meta'] = get_user_meta($value);
        $applicantMetaArr[$value]['job_id'] = $jobID;

        $posts  =  "SELECT approved_by_company FROM applied_job_details WHERE job_ID = '{$jobID}' AND user_ID = '{$value}' ";

        $result = mysqli_query($conn, $posts);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $applicantMetaArr[$value]['candidature_status'] = $row['approved_by_company'];
            }
        }
    }

    echo '<section id="content">
                   <div class="container">
                     <div class="table-responsive">
                         <table class="job-manager-jobs table table-striped">
                           <thead>
                           <tr>
                             <th class="job_title">#</th>
                             <th class="date">Candidate Name</th>
                             <th class="date">Location</th>
                             <th class="date">Action</th>
                           </tr>
                           </thead>
                           <tbody>
                         ';
    $i=0;
    foreach ($applicantMetaArr as $key => $value) {
        $i++;
        echo "
              <tr>
                <td>{$i}</td>
                <td><a href='{$value['postdata']['guid']}?referrer=c_list' target='_blank'>{$value['postmeta']['_candidate_name'][0]}</a></td>
                <td><i class='fa fa-location-arrow'></i> {$value['postmeta']['_candidate_location'][0]}</td>
                ";
        if($value['candidature_status'] !== '0') {
            echo '<td><button onclick="printpage('.$value['postdata']['post_author'].')" class="vc_general vc_btn3 vc_btn3-size-sm vc_btn3-shape-rounded vc_btn3-style-outline vc_btn3-icon-left vc_btn3-color-mulled-wine"><i class="vc_btn3-icon fa fa-download"></i> Download Resume</button></td>';
        }else{
            $path = pathinfo($_SERVER['REQUEST_URI']);
            echo '<td><a href="//sezplus.com/jobs/applied-candidate-list?jobID='.$value['job_id'].'&userID='.$key.'&approve=1&sendcall=1"><button class="vc_general vc_btn3 vc_btn3-size-sm vc_btn3-shape-rounded vc_btn3-style-outline vc_btn3-icon-left vc_btn3-color-mulled-wine"><i class="vc_btn3-icon fa fa-envelope"></i> Send A Call Letter</button></a></td>';
        }
        echo " </tr>";


    }
    echo '        </tbody>
                </table>
              </div>
            </div>
          </section>';

}else{
    echo '<h4> No Applicant(s) Yet!</h5><br/>';
}

get_footer();
