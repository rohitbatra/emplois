<?php

add_filter( 'pre_comment_content', 'esc_html' );
remove_action( 'wp_head', 'wp_generator' ) ;
remove_action( 'wp_head', 'wlwmanifest_link' ) ;
remove_action( 'wp_head', 'rsd_link' ) ;
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );

function _remove_script_version( $src ){
    $parts = explode( '?ver', $src );
        return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

// Add field to frontend
#add_filter( 'submit_resume_form_fields', 'wpjms_frontend_resume_form_fields');

function wpjms_frontend_resume_form_fields( $fields ) {

	

	$fields['resume_fields']['candidate_gender'] = array(

	    'label' => __( 'Gender', 'job_manager_gender' ),

	    'type' => 'text',

	    'required' => true,

	    'placeholder' => 'Male/Female',

	);



	$fields['resume_fields']['candidate_dob'] = array(

	    'label' => __( 'Date of Birth', 'job_manager_dob' ),

	    'type' => 'text',

	    'required' => true,

	    'placeholder' => 'DD/MM/YYYY',

	);



	return $fields;

	

}







// Add your own function to filter the fields

add_filter( 'submit_resume_form_fields', 'custom_submit_resume_form_fields' );



// This is your function which takes the fields, modifies them, and returns them

function custom_submit_resume_form_fields( $fields ) {



    // Here we target one of the job fields (candidate name) and change it's label

    $fields['resume_fields']['candidate_name']['placeholder'] = "The Candidate Name";



    // And return the modified fields

    return $fields;

}







add_filter( 'submit_job_form_fields', 'custom_submit_job_form_fields' );



// This is your function which takes the fields, modifies them, and returns them

// You can see the fields which can be changed here: https://github.com/mikejolley/WP-Job-Manager/blob/master/includes/forms/class-wp-job-manager-form-submit-job.php

function custom_submit_job_form_fields( $fields ) {



    // Here we target one of the job fields (job_title) and change it's label

    $fields['job']['contact_person']['placeholder'] = "Name with Designation (ex: Surbhi - HR Manager)";

	



	return $fields;









    // And return the modified fields

    return $fields;

}
