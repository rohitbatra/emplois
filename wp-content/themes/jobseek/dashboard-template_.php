<?php
/**
 * Template Name: DashboardTemplate____
 */
get_header(); 

include("database.php");




$user_ID = get_current_user_id();

$current_user = wp_get_current_user();
if ( !($current_user instanceof WP_User) )
   return;
$roles = $current_user->roles;  //$roles is an array

//echo $session->all_userdata();

//echo $user_ID;






if($user_ID != 0) { 


	if( $roles['0'] == 'subscriber' || $roles['0'] == 'administrator'	) {	



   $posts  =  "SELECT * from applied_job_details where user_ID = ".$user_ID;
 $result = mysqli_query($conn, $posts);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $myjobs[] = $row;
    }
} else {
   $nojob = 1;
}

if(empty($nojob)){
   foreach ($myjobs as $key => $value) {
      $jobidlist[] = $value['job_ID'];
   }



   $posts  =  "SELECT * from wp_posts where ID IN (".implode(', ', $jobidlist).")";
   $result = mysqli_query($conn, $posts);

   if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
           $myjoblist[] = $row;
       }
   } else {
      $nojob = true;
   }

}




echo '<pre>';
print_r($myjoblist);
echo '</pre>';


		echo '
<section id="content">
   <div class="container">
      <div class="vc_row wpb_row vc_row-fluid color-default">
         <div class="border wpb_column vc_column_container vc_col-sm-3">
            <div class="wpb_wrapper">`
               <div class="wpb_single_image wpb_content_element vc_align_center">
                  <figure class="wpb_wrapper vc_figure">
                     <a rel="prettyPhoto[rel-2889-1624742152]" href="//www.sezplus.com/jobs/wp-content/uploads/2016/03/Non-Traditional-Student-contrastwerkstatt.jpg" target="_self" class="vc_single_image-wrapper vc_box_circle  vc_box_border_grey prettyphoto"><img class="vc_single_image-img " src="//www.sezplus.com/jobs/wp-content/uploads/2016/03/Non-Traditional-Student-contrastwerkstatt-200x200.jpg" width="200" height="200" alt="l‰chelnder mann im b¸ro" title="lächelnder mann im büo"></a>
                  </figure>
               </div>
               <div class="vc_btn3-container vc_btn3-center"><button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-round vc_btn3-style-outline vc_btn3-icon-left vc_btn3-color-orange"><i class="vc_btn3-icon fa fa-newspaper-o"></i> Edit Resume</button></div>
               <div class="vc_btn3-container vc_btn3-center"><a class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-outline vc_btn3-block vc_btn3-icon-left vc_btn3-color-mulled-wine" href="//www.sezplus.com/jobs/find-a-job/" title="" target="_self"><i class="vc_btn3-icon fa fa-search"></i> Find aa Job</a></div>
            </div>
         </div>
         <div class="wpb_column vc_column_container vc_col-sm-9">
            <div class="wpb_wrapper">';



            foreach ($myjoblist as $key => $value) {
                  
            

               echo '<div class="vc_row wpb_row vc_inner vc_row-fluid">
                  <div class="wpb_column vc_column_container vc_col-sm-3">
                     <div class="wpb_wrapper">
                        <div class="wpb_single_image wpb_content_element vc_align_right">
                           <figure class="wpb_wrapper vc_figure">
                              <div class="vc_single_image-wrapper   vc_box_border_grey"><img width="150" height="150" src="//www.sezplus.com/jobs/wp-content/uploads/2016/03/Dell-Company-Logo-150x150.jpg" class="vc_single_image-img attachment-thumbnail" alt="Dell-Company-Logo" srcset="//www.sezplus.com/jobs/wp-content/uploads/2016/03/Dell-Company-Logo-150x150.jpg 150w, //www.sezplus.com/jobs/wp-content/uploads/2016/03/Dell-Company-Logo-300x300.jpg 300w, //www.sezplus.com/jobs/wp-content/uploads/2016/03/Dell-Company-Logo-140x140.jpg 140w, //www.sezplus.com/jobs/wp-content/uploads/2016/03/Dell-Company-Logo-360x360.jpg 360w" sizes="(max-width: 150px) 100vw, 150px"></div>
                           </figure>
                        </div>
                     </div>
                  </div>
                  <div class="wpb_column vc_column_container vc_col-sm-6">
                     <div class="wpb_wrapper">
                        <h2 class="subtitle">'.$value['post_title'].'</h2>
                        <div class="wpb_text_column wpb_content_element ">
                           <div class="wpb_wrapper">
                              <p>'.$value['post_content'].'</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="wpb_column vc_column_container vc_col-sm-3">
                     <div class="wpb_wrapper">
                        <div class="vc_btn3-container vc_btn3-center"><button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-round vc_btn3-style-outline vc_btn3-icon-left vc_btn3-color-orange"><i class="vc_btn3-icon fa fa-file-text"></i><a href="'.$value['guid'].'"> Know More</a></button></div>
                        <div class="vc_btn3-container vc_btn3-center"><button class="vc_general vc_btn3 vc_btn3-size-lg vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-block vc_btn3-icon-left vc_btn3-color-turquoise"><i class="vc_btn3-icon fa fa-check-square-o"></i> Applied</button></div>
                     </div>
                  </div>
               </div>
               <div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_pos_align_center vc_separator_no_text vc_sep_color_turquoise"><span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span class="vc_sep_line"></span></span></div>';
            }
               
            echo '</div>
         </div>
      </div>
	</div>
	</section>

';




	}else{



//var_dump($conn);


   $posts  =  "SELECT * from wp_posts where post_author = ".$user_ID;
 $result = mysqli_query($conn, $posts);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $posts_list[] = $row;
    }
} else {
    // No result

   $nojob = true;


}



foreach ($posts_list as $key => $value) {

   $final_post[$key]['title'] = $value['post_title'];
   $final_post[$key]['description'] = $value['post_content'];
   $final_post[$key]['id'] = $value['ID'];
   


    $posts  =  "SELECT count('user_ID') as cont from applied_job_details where job_ID = ".$value['ID'];
   $result = mysqli_query($conn, $posts);

   if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {

         $final_post[$key]['count'] = $row["cont"];
       }


   } 
}


/*
echo '<pre>';
print_r($final_post);
echo '</pre>';
*/

$conn->close();






echo '
<section id="content">
   <div class="container">

      <div class="vc_row wpb_row vc_row-fluid color-default">
         <div class="border wpb_column vc_column_container vc_col-sm-3">
            <div class="wpb_wrapper">
               <div class="wpb_single_image wpb_content_element vc_align_center">
                  <figure class="wpb_wrapper vc_figure">
                     <a rel="prettyPhoto[rel-2889-1434862842]" href="//www.sezplus.com/jobs/wp-content/uploads/2016/03/Non-Traditional-Student-contrastwerkstatt.jpg" target="_self" class="vc_single_image-wrapper vc_box_circle  vc_box_border_grey prettyphoto"><img class="vc_single_image-img " src="//www.sezplus.com/jobs/wp-content/uploads/2016/03/Non-Traditional-Student-contrastwerkstatt-200x200.jpg" width="200" height="200" alt="l‰chelnder mann im b¸ro" title="lächelnder mann im büo"></a>
                  </figure>
               </div>
               <div class="vc_btn3-container vc_btn3-center"><a class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-outline vc_btn3-block vc_btn3-icon-left vc_btn3-color-mulled-wine" href="//www.sezplus.com/jobs/find-a-job/" title="" target="_self"><i class="vc_btn3-icon fa fa-search"></i> Find aaa Candidate</a></div>
            </div>
         </div>';


         if(!$nojob){

            foreach ($final_post as $key => $value) {

            echo '<div class="border_bottom wpb_column vc_column_container vc_col-sm-9">
               <div class="wpb_wrapper">
                  <div class="vc_row wpb_row vc_inner vc_row-fluid">
                     <div class="wpb_column vc_column_container vc_col-sm-3">
                        <div class="wpb_wrapper">
                           <h2 style="text-align: left" class="vc_custom_heading vc_custom_1459159557504">'.$value['title'].'</h2>
                        </div>
                     </div>
                     <div class="wpb_column vc_column_container vc_col-sm-6">
                        <div class="wpb_wrapper">
                           <h3 style="text-align: left" class="vc_custom_heading vc_custom_1459159619550">Job / role description </h3>
                           <div class="wpb_text_column wpb_content_element  vc_custom_1459159604384">
                              <div class="wpb_wrapper">
                                 <p>'.$value['description'].'</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="wpb_column vc_column_container vc_col-sm-3">
                        <div class="wpb_wrapper">
                           <div class="wpb_text_column wpb_content_element ">
                              <div class="wpb_wrapper">
                                 <p style="text-align: center;"><a style="font-size: 25px;">'.$value['count'].' <i class="vc_btn3-icon fa fa-users"></i></a><br>
                                    Number Of Candidate Applied
                                 </p>
                              </div>
                           </div>
                           <div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_100 vc_sep_shadow vc_sep_border_width_8 vc_sep_pos_align_center vc_separator_no_text vc_sep_color_grey"><span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span class="vc_sep_line"></span></span>
                           </div>
                           <div class="vc_btn3-container  wpb_animate_when_almost_visible wpb_bottom-to-top vc_btn3-center wpb_start_animation"><button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-round vc_btn3-style-outline vc_btn3-icon-left vc_btn3-color-orange"><i class="vc_btn3-icon fa fa-users"></i> View Candidate</button></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>';

            }
         }


         echo '



      </div>
   </div>
</section>';



	}
}else{


	echo 'you are not allowed here.';
}






?>


<?php
get_footer();
