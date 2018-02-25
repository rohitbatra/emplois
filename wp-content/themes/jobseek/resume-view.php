<?php
/**
 * Template Name: ResumeView
 */
include("database.php");

$candidate_ID = $_GET['id'];
$userMetaSQL  = "SELECT meta_value FROM wp_usermeta WHERE user_id = '".$candidate_ID."' AND meta_key LIKE 'phone_no' ;";
$res = mysqli_query($conn, $userMetaSQL);
if ($res->num_rows > 0) 
{
	while($row = $res->fetch_assoc())
	{
		$telephone = $row['meta_value'];
	}
}

$font_size = 30; // in pixcels
$water_mark_text_2 = "9lessons"; // Watermark Text

function watermark_text($oldimage_name, $new_image_name)
{
global $font_size, $water_mark_text_2;
list($owidth,$oheight) = getimagesize($oldimage_name);
$width = $height = 300; 
$image = imagecreatetruecolor($width, $height);
$image_src = imagecreatefromjpeg($oldimage_name);
imagecopyresampled($image, $image_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
$blue = imagecolorallocate($image, 79, 166, 185);
imagettftext($image, $font_size, 0, 68, 190, $blue, $water_mark_text_2);
imagejpeg($image, $new_image_name, 100);
imagedestroy($image);
unlink($oldimage_name);
return true;
}

   $posts  =  "SELECT * from wp_posts where post_author = ".$candidate_ID." AND post_type='resume' AND post_status='publish'";

   $result = mysqli_query($conn, $posts);
   if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
           $resume['resume'][] = $row;
       }
   } else {
      $noresume = true;
   }

   if(empty($noresume)){
   	$resume['resumemeta'] = get_post_meta($resume['resume'][0]['ID']);
	}

// Eduation details and Employee details
$education_details = unserialize($resume['resumemeta']['_candidate_education'][0]);
$employement_details = unserialize($resume['resumemeta']['_candidate_experience'][0]);
echo '
<style>
	body{
		padding:15px;
		margin:0 auto;
		font-family: Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
		font-size:14px;
	}


#background{
    position:absolute;
    z-index:0;
    background:white;
    display:block;
    min-height:50%; 
    min-width:50%;
    color:yellow;
}

#content{
    position:absolute;
    z-index:1;
}

#bg-text {
    color: lightgrey;
    margin-top: 165px;
    margin-left: 446px;
    font-size: 70px;
    transform: rotate(300deg);
    -webkit-transform: rotate(359deg);
}

</style>

<div id="background">
  <p id="bg-text">&#169;sezplus.com</p>
	</div>



<table id="content" align="center" width="1000" border="0" cellspacing="2" cellpadding="2">
  <tbody >
    <tr>
      <td><strong>&nbsp;</strong></td>
      <td><h2>'.$resume['resume'][0]['post_title'].'</h2></td>
      <td rowspan="5"><img src="'.$resume['resumemeta']['_candidate_photo'][0].'" alt="" width="150" height="150"></td>
      <td rowspan="5" width="100">&nbsp;</td>
    </tr>
    <tr>
      <td class="ctgry" style="font-weight:bold; padding-top:15px;"><strong>&nbsp;</strong></td>
      <td class="ctgry" style="font-weight:bold;">'.get_the_resume_category($resume['resume'][0]['ID']).'</td>
    </tr>
    <tr>
      <td><strong>&nbsp;</strong></td>
      <td>'.$resume['resumemeta']['geolocation_formatted_address'][0].' </td>
    </tr>
    <tr>
      <td><strong>&nbsp;</strong></td>
      <td>'.$resume['resumemeta']['_candidate_email'][0].'</td>
    </tr>
    <tr>
      <td><strong>&nbsp;</strong></td>
      <td>'.$telephone.'</td>
    </tr>
    <tr>
      <td> </td>
      <td style="border-bottom:solid 2px #000">&nbsp;</td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td><h3>PERSONAL DETAILS</h3></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><table width="250" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td>Date of Birth:</td>
      <td>'.$resume['resumemeta']['_candidate_dob'][0].' </td>
    </tr>
    <tr>
      <td>Gender:</td>
      <td>'.$resume['resumemeta']['_candidate_gender'][0].' </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
</td>
      
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><h3>EDUCATIONAL DETAILS</h3></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>


    <tr>
      <td>&nbsp;</td>
      <td>'.$education_details[0]['location'].'<br />
      '.$education_details[0]['qualification'].'<br />
'.$education_details[0]['date'].'<br />
'.$education_details[0]['notes'].'<br /><br /><br />
      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>




    <tr>
      <td>&nbsp;</td>
      <td><h3>EMPLOYMENT DETAILS</h3></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td>'.$employement_details[0]['employer'].'<br />
      '.$employement_details[0]['job_title'].'<br />
'.$employement_details[0]['date'].'<br />
'.$employement_details[0]['notes'].'<br /><br /><br />
      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>




    <tr>
      <td>&nbsp;</td>
      <td><h3>About</h3></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>


    <tr>
      <td><h3>&nbsp;</h3></td>
      <td>'.$resume['resumemeta']['_resume_content'][0].'</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>

<script type="text/javascript">

window.print();
</script>



';



?>
