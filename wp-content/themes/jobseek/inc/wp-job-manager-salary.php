<?php

// Add the field to the frontend

add_filter( 'submit_job_form_fields', 'frontend_add_salary_field' );

function frontend_add_salary_field( $fields ) {
  $fields['job']['job_salary'] = array(
    'label'       => __( 'Salary (&#x20B9;)', 'jobseek' ),
    'type'        => 'text',
    'required'    => false,
    'placeholder' => 'e.g. 20000',
    'priority'    => 7
  );
  return $fields;
}

// Add the field to admin

add_filter( 'job_manager_job_listing_data_fields', 'admin_add_salary_field' );

function admin_add_salary_field( $fields ) {
  $fields['_job_salary'] = array(
    'label'       => __( 'Salary (&#x20B9;)', 'jobseek' ),
    'type'        => 'text',
    'placeholder' => 'e.g. 20000',
    'description' => ''
  );
  return $fields;
}

// Display "Salary" on the single job page

add_action( 'single_job_listing_meta_end', 'display_job_salary_data' );
add_action( 'job_listing_meta_start', 'display_job_salary_data' );

function display_job_salary_data() {
  global $post;

  $salary = get_post_meta( $post->ID, '_job_salary', true );

  $thousands_separator = get_theme_mod('thousands_separator', ',');
  $sign_before = get_theme_mod('sign_before', '&#x20B9; ');

  $sign_after = get_theme_mod('sign_after', '');
  $salary_values = get_theme_mod('salary_values', 'numeric');


  if ($salary_values == 'numeric')
  {

    if ( isset($salary) && !empty($salary) && is_single() )
    {
      echo '<li class="salary">' . __( 'Salary:', 'jobseek' ) . ' ' . $sign_before . esc_html( number_format($salary, 0, '.', $thousands_separator) ) . $sign_after . '</li>';
    } else if ( isset($salary) && !empty($salary) )
    {
      echo ('<li class="salary">' . $sign_before . esc_html( number_format($salary, 0, '.', $thousands_separator) ) . $sign_after . '</li>');
    }

  } else {

    if ( isset($salary) && !empty($salary) && is_single() )
    {
      echo '<li class="salary">' . __( 'Salary:', 'jobseek' ) . ' '. $sign_before  . esc_html( number_format($salary, 0, '.', $thousands_separator) ) . '</li>';
    } else if ( isset($salary) && !empty($salary) )
    {
      echo ('<li class="salary"> '. $sign_before  . esc_html( number_format($salary, 0, '.', $thousands_separator) ) . '</li>');
    }

  }

}

?>