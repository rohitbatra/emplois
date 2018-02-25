<?php

function jobseek_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

add_action('customize_register','jobseek_customize_register');

function jobseek_customize_register( $wp_customize ) {

		/* Logo */

		$wp_customize->add_setting( 'theme_logo', array(
		    'type'                 => 'theme_mod',
		    'capability'           => 'edit_theme_options',
		    'theme_supports'       => '',
		    'default'              => '',
		    'transport'            => 'refresh',
		    'sanitize_callback'    => 'jobseek_sanitize_text',
		) );

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_logo', array(
			    'label'    => __( 'Logo', 'jobseek' ),
			    'section'  => 'title_tagline',
			    'settings' => 'theme_logo',
			) ) );

		$wp_customize->add_setting( 'logo_height', array(
		    'type'                 => 'theme_mod',
		    'capability'           => 'edit_theme_options',
		    'theme_supports'       => '',
		    'default'              => '40',
		    'transport'            => 'refresh',
		    'sanitize_callback'    => 'jobseek_sanitize_text',
		) );

			$wp_customize->add_control( 'logo_height', array(
			    'type'     => 'input',
			    'priority' => 10,
			    'section'  => 'title_tagline',
			    'label'    => __( 'Logo Height in Pixels', 'jobseek' ),
			) );

		$wp_customize->add_setting( 'loader', array(
		    'type'              => 'theme_mod',
		    'capability'        => 'edit_theme_options',
		    'theme_supports'    => '',
		    'default'           => 'yes',
		    'transport'         => 'refresh',
		    'default'           => 'both',
		) );

			$wp_customize->add_control( 'loader', array(
				'label'       => __( 'Use Page Loader', 'jobseek' ),
				'type'        => 'select',
				'section'     => 'title_tagline',
				'choices'     => array(
					'yes' => 'yes',
					'no'  => 'no',
				),
			) );

	/* Job Listings */

	$wp_customize->add_section( 'jobs-listing', array(
	    'title'      => __( 'Jobs Listing', 'jobseek' ),
	    'priority'   => 160,
	    'capability' => 'edit_theme_options'
	) );

		/* Salary Field */

		$wp_customize->add_setting( 'salary', array(
		    'type'              => 'theme_mod',
		    'capability'        => 'edit_theme_options',
		    'theme_supports'    => '',
		    'default'           => 'yes',
		    'transport'         => 'refresh',
		    'default'           => 'both',
		) );

			$wp_customize->add_control( 'salary', array(
				'label'       => __( 'Enable Salary', 'jobseek' ),
				'type'        => 'select',
				'section'     => 'jobs-listing',
				'choices'     => array(
					'yes' => 'yes',
					'no'  => 'no',
				),
			) );

		/* Salary Value */

		$wp_customize->add_setting( 'salary_values', array(
		    'type'              => 'theme_mod',
		    'capability'        => 'edit_theme_options',
		    'theme_supports'    => '',
		    'default'           => 'yes',
		    'transport'         => 'refresh',
		    'default'           => 'both',
		) );

			$wp_customize->add_control( 'salary_values', array(
				'label'       => __( 'Allowed Salary Value', 'jobseek' ),
				'type'        => 'select',
				'section'     => 'jobs-listing',
				'choices'     => array(
					'numeric' => 'only numeric',
					'string'  => 'any string (currency signs before and after are not used)',
				),
			) );

		/* Currency Sign (Before) */

		$wp_customize->add_setting( 'sign_before', array(
		    'type'                 => 'theme_mod',
		    'capability'           => 'edit_theme_options',
		    'theme_supports'       => '',
		    'default'              => '&#x20B9;',
		    'transport'            => 'refresh',
		    'sanitize_callback'    => 'jobseek_sanitize_text',
		) );

			$wp_customize->add_control( 'sign_before', array(
			    'type'     => 'input',
			    'priority' => 10,
			    'section'  => 'jobs-listing',
			    'label'    => __( 'Currency Sign (Before)', 'jobseek' ),
			) );

		/* Currency Sign (After) */

		$wp_customize->add_setting( 'sign_after', array(
		    'type'                 => 'theme_mod',
		    'capability'           => 'edit_theme_options',
		    'theme_supports'       => '',
		    'default'              => '',
		    'transport'            => 'refresh',
		    'sanitize_callback'    => 'jobseek_sanitize_text',
		) );

			$wp_customize->add_control( 'sign_after', array(
			    'type'     => 'input',
			    'priority' => 10,
			    'section'  => 'jobs-listing',
			    'label'    => __( 'Currency Sign (After)', 'jobseek' ),
			) );

		/* Salary Thousands Separator */

		$wp_customize->add_setting( 'thousands_separator', array(
		    'type'                 => 'theme_mod',
		    'capability'           => 'edit_theme_options',
		    'theme_supports'       => '',
		    'default'              => ',',
		    'transport'            => 'refresh',
		    'sanitize_callback'    => 'jobseek_sanitize_text',
		) );

			$wp_customize->add_control( 'thousands_separator', array(
			    'type'     => 'select',
			    'priority' => 10,
			    'section'  => 'jobs-listing',
			    'label'    => __( 'Thousands Separator', 'jobseek' ),
			    'choices'  => array(
			    	','      => ',',
			    	'.'      => '.',
			    	'&nbsp;' => 'space',
			    	)
			) );

	/* Footer Section */

	$wp_customize->add_section( 'footer', array(
	    'title'      => __( 'Footer Settings', 'jobseek' ),
	    'priority'   => 160,
	    'capability' => 'edit_theme_options'
	) );

		/* Footer Text */

		$wp_customize->add_setting( 'footer_text', array(
		    'type'                 => 'theme_mod',
		    'capability'           => 'edit_theme_options',
		    'theme_supports'       => '',
		    'default'              => __( '&copy; 2015 Jobseek - Responsive Job Board WordPress Theme<br>Designed &amp; Developed by <a href="http://themeforest.net/user/Coffeecream" target="_blank">Coffeecream Themes</a>', 'jobseek' ),
		    'transport'            => 'refresh',
		    'sanitize_callback'    => 'jobseek_sanitize_text',
		) );

			$wp_customize->add_control( 'footer_text', array(
			    'type'     => 'textarea',
			    'priority' => 10,
			    'section'  => 'footer',
			    'label'    => __( 'Footer Text', 'jobseek' ),
			) );

		/* Footer Columns #1 */

		$wp_customize->add_setting( 'footer_sidebar_1', array(
		    'type'                 => 'theme_mod',
		    'capability'           => 'edit_theme_options',
		    'theme_supports'       => '',
		    'default'              => 'col-sm-6',
		    'transport'            => 'refresh',
		    'sanitize_callback'    => 'jobseek_sanitize_text',
		) );

			$wp_customize->add_control( 'footer_sidebar_1', array(
			    'type'     => 'select',
			    'priority' => 10,
			    'section'  => 'footer',
			    'label'    => __( 'Footer Sidebar Column 1', 'jobseek' ),
			    'choices'  => array(
			    	'col-sm-12' => 'full width',
			    	'col-sm-6'  => '1/2',
			    	'col-sm-4'  => '1/3',
			    	'col-sm-3'  => '1/4',
			    	'disabled' => 'disabled',
			    	)
			) );

		/* Footer Columns #2 */

		$wp_customize->add_setting( 'footer_sidebar_2', array(
		    'type'                 => 'theme_mod',
		    'capability'           => 'edit_theme_options',
		    'theme_supports'       => '',
		    'default'              => 'disabled',
		    'transport'            => 'refresh',
		    'sanitize_callback'    => 'jobseek_sanitize_text',
		) );

			$wp_customize->add_control( 'footer_sidebar_2', array(
			    'type'     => 'select',
			    'priority' => 10,
			    'section'  => 'footer',
			    'label'    => __( 'Footer Sidebar Column 2', 'jobseek' ),
			    'choices'  => array(
			    	'col-sm-12' => 'full width',
			    	'col-sm-6'  => '1/2',
			    	'col-sm-4'  => '1/3',
			    	'col-sm-3'  => '1/4',
			    	'disabled' => 'disabled',
			    	)
			) );

		/* Footer Columns #3 */

		$wp_customize->add_setting( 'footer_sidebar_3', array(
		    'type'                 => 'theme_mod',
		    'capability'           => 'edit_theme_options',
		    'theme_supports'       => '',
		    'default'              => 'disabled',
		    'transport'            => 'refresh',
		    'sanitize_callback'    => 'jobseek_sanitize_text',
		) );

			$wp_customize->add_control( 'footer_sidebar_3', array(
			    'type'     => 'select',
			    'priority' => 10,
			    'section'  => 'footer',
			    'label'    => __( 'Footer Sidebar Column 3', 'jobseek' ),
			    'choices'  => array(
			    	'col-sm-12' => 'full width',
			    	'col-sm-6'  => '1/2',
			    	'col-sm-4'  => '1/3',
			    	'col-sm-3'  => '1/4',
			    	'disabled' => 'disabled',
			    	)
			) );

		/* Footer Columns #4 */

		$wp_customize->add_setting( 'footer_sidebar_4', array(
		    'type'                 => 'theme_mod',
		    'capability'           => 'edit_theme_options',
		    'theme_supports'       => '',
		    'default'              => 'col-sm-6',
		    'transport'            => 'refresh',
		    'sanitize_callback'    => 'jobseek_sanitize_text',
		) );

			$wp_customize->add_control( 'footer_sidebar_4', array(
			    'type'     => 'select',
			    'priority' => 10,
			    'section'  => 'footer',
			    'label'    => __( 'Footer Sidebar Column 4', 'jobseek' ),
			    'choices'  => array(
			    	'col-sm-12' => 'full width',
			    	'col-sm-6'  => '1/2',
			    	'col-sm-4'  => '1/3',
			    	'col-sm-3'  => '1/4',
			    	'disabled' => 'disabled',
			    	)
			) );


/* Color Schemes
-------------------------------------------------------------------------------------------------------------------*/

	$wp_customize->add_panel( 'colors', array(
    	'title' => __( 'Color Schemes', 'jobseek' ),
    	//'description' => $description, // Include html tags such as <p>.
    	'priority' => 160, // Mixed with top-level-section hierarchy.
	) );

		// Basic color settings

		$wp_customize->add_section( 'basic-colors', array(
		    'title' => 'Basic Colors',
		    'panel' => 'colors',
		) );

			// Header BG
			$wp_customize->add_setting( 'header_bg', array(
			    'type'              => 'theme_mod',
			    'capability'        => 'edit_theme_options',
			    'theme_supports'    => '',
			    'transport'         => 'refresh',
			    'default'           => '#14b1bb',
    			'sanitize_callback' => 'sanitize_hex_color',
			) );

				$wp_customize->add_control(
				    new WP_Customize_Color_Control(
				        $wp_customize,
				        'header_bg',
				        array(
				            'label'      => __( 'Header Background', 'jobseek' ),
				            'section'    => 'basic-colors',
				            'settings'   => 'header_bg'
				        )
				    )
				);

			// Dropdown BG
			$wp_customize->add_setting( 'dropdown_bg', array(
			    'type'              => 'theme_mod',
			    'capability'        => 'edit_theme_options',
			    'theme_supports'    => '',
			    'transport'         => 'refresh',
			    'default'           => '#12a0a9',
    			'sanitize_callback' => 'sanitize_hex_color',
			) );

				$wp_customize->add_control(
				    new WP_Customize_Color_Control(
				        $wp_customize,
				        'dropdown_bg',
				        array(
				            'label'      => __( 'Dropdown Background', 'jobseek' ),
				            'section'    => 'basic-colors',
				            'settings'   => 'dropdown_bg'
				        )
				    )
				);

			// Dropdown Hover/Active BG
			$wp_customize->add_setting( 'dropdown_state_bg', array(
			    'type'              => 'theme_mod',
			    'capability'        => 'edit_theme_options',
			    'theme_supports'    => '',
			    'transport'         => 'refresh',
			    'default'           => '#109098',
    			'sanitize_callback' => 'sanitize_hex_color',
			) );

				$wp_customize->add_control(
				    new WP_Customize_Color_Control(
				        $wp_customize,
				        'dropdown_state_bg',
				        array(
				            'label'      => __( 'Dropdown Hover/Active Background', 'jobseek' ),
				            'section'    => 'basic-colors',
				            'settings'   => 'dropdown_state_bg'
				        )
				    )
				);

			// Accent color
			$wp_customize->add_setting( 'accent_color', array(
			    'type'              => 'theme_mod',
			    'capability'        => 'edit_theme_options',
			    'theme_supports'    => '',
			    'transport'         => 'refresh',
			    'default'           => '#14b1bb',
    			'sanitize_callback' => 'sanitize_hex_color',
			) );

				$wp_customize->add_control(
				    new WP_Customize_Color_Control(
				        $wp_customize,
				        'accent_color',
				        array(
				            'label'      => __( 'Accent Color', 'jobseek' ),
				            'section'    => 'basic-colors',
				            'settings'   => 'accent_color'
				        )
				    )
				);

			// Accent hover color
			$wp_customize->add_setting( 'accent_hover_color', array(
			    'type'              => 'theme_mod',
			    'capability'        => 'edit_theme_options',
			    'theme_supports'    => '',
			    'transport'         => 'refresh',
			    'default'           => '#0d7076',
    			'sanitize_callback' => 'sanitize_hex_color',
			) );

				$wp_customize->add_control(
				    new WP_Customize_Color_Control(
				        $wp_customize,
				        'accent_hover_color',
				        array(
				            'label'      => __( 'Accent Hover Color', 'jobseek' ),
				            'section'    => 'basic-colors',
				            'settings'   => 'accent_hover_color'
				        )
				    )
				);

			// User nav links color
			$wp_customize->add_setting( 'user_nav_link_color', array(
			    'type'              => 'theme_mod',
			    'capability'        => 'edit_theme_options',
			    'theme_supports'    => '',
			    'transport'         => 'refresh',
			    'default'           => '#08474b',
    			'sanitize_callback' => 'sanitize_hex_color',
			) );

				$wp_customize->add_control(
				    new WP_Customize_Color_Control(
				        $wp_customize,
				        'user_nav_link_color',
				        array(
				            'label'      => __( 'User Nav Link Color', 'jobseek' ),
				            'description'=> __( 'Login / Register / Dashboard / Logout links color in main menu.', 'jobseek' ),
				            'section'    => 'basic-colors',
				            'settings'   => 'user_nav_link_color'
				        )
				    )
				);

			// Body text color
			$wp_customize->add_setting( 'body_color', array(
			    'type'              => 'theme_mod',
			    'capability'        => 'edit_theme_options',
			    'theme_supports'    => '',
			    'transport'         => 'refresh',
			    'default'           => '#888',
    			'sanitize_callback' => 'sanitize_hex_color',
			) );

				$wp_customize->add_control(
				    new WP_Customize_Color_Control(
				        $wp_customize,
				        'body_color',
				        array(
				            'label'      => __( 'Body Text Color', 'jobseek' ),
				            'section'    => 'basic-colors',
				            'settings'   => 'body_color'
				        )
				    )
				);

			// H1 color
			$wp_customize->add_setting( 'h1_color', array(
			    'type'              => 'theme_mod',
			    'capability'        => 'edit_theme_options',
			    'theme_supports'    => '',
			    'transport'         => 'refresh',
			    'default'           => '#000',
    			'sanitize_callback' => 'sanitize_hex_color',
			) );

				$wp_customize->add_control(
				    new WP_Customize_Color_Control(
				        $wp_customize,
				        'h1_color',
				        array(
				            'label'      => __( 'H1', 'jobseek' ),
				            'section'    => 'basic-colors',
				            'settings'   => 'h1_color'
				        )
				    )
				);

			// H2 color
			$wp_customize->add_setting( 'h2_color', array(
			    'type'              => 'theme_mod',
			    'capability'        => 'edit_theme_options',
			    'theme_supports'    => '',
			    'transport'         => 'refresh',
			    'default'           => '#000',
    			'sanitize_callback' => 'sanitize_hex_color',
			) );

				$wp_customize->add_control(
				    new WP_Customize_Color_Control(
				        $wp_customize,
				        'h2_color',
				        array(
				            'label'      => __( 'H2', 'jobseek' ),
				            'section'    => 'basic-colors',
				            'settings'   => 'h2_color'
				        )
				    )
				);

			// H3 color
			$wp_customize->add_setting( 'h3_color', array(
			    'type'              => 'theme_mod',
			    'capability'        => 'edit_theme_options',
			    'theme_supports'    => '',
			    'transport'         => 'refresh',
			    'default'           => '#000',
    			'sanitize_callback' => 'sanitize_hex_color',
			) );

				$wp_customize->add_control(
				    new WP_Customize_Color_Control(
				        $wp_customize,
				        'h3_color',
				        array(
				            'label'      => __( 'H3', 'jobseek' ),
				            'section'    => 'basic-colors',
				            'settings'   => 'h3_color'
				        )
				    )
				);

			// H4 color
			$wp_customize->add_setting( 'h4_color', array(
			    'type'              => 'theme_mod',
			    'capability'        => 'edit_theme_options',
			    'theme_supports'    => '',
			    'transport'         => 'refresh',
			    'default'           => '#000',
    			'sanitize_callback' => 'sanitize_hex_color',
			) );

				$wp_customize->add_control(
				    new WP_Customize_Color_Control(
				        $wp_customize,
				        'h4_color',
				        array(
				            'label'      => __( 'H4', 'jobseek' ),
				            'section'    => 'basic-colors',
				            'settings'   => 'h4_color'
				        )
				    )
				);

			// H5 color
			$wp_customize->add_setting( 'h5_color', array(
			    'type'              => 'theme_mod',
			    'capability'        => 'edit_theme_options',
			    'theme_supports'    => '',
			    'transport'         => 'refresh',
			    'default'           => '#000',
    			'sanitize_callback' => 'sanitize_hex_color',
			) );

				$wp_customize->add_control(
				    new WP_Customize_Color_Control(
				        $wp_customize,
				        'h5_color',
				        array(
				            'label'      => __( 'H5', 'jobseek' ),
				            'section'    => 'basic-colors',
				            'settings'   => 'h5_color'
				        )
				    )
				);

			// H6 color
			$wp_customize->add_setting( 'h6_color', array(
			    'type'              => 'theme_mod',
			    'capability'        => 'edit_theme_options',
			    'theme_supports'    => '',
			    'transport'         => 'refresh',
			    'default'           => '#000',
    			'sanitize_callback' => 'sanitize_hex_color',
			) );

				$wp_customize->add_control(
				    new WP_Customize_Color_Control(
				        $wp_customize,
				        'h6_color',
				        array(
				            'label'      => __( 'H6', 'jobseek' ),
				            'section'    => 'basic-colors',
				            'settings'   => 'h6_color'
				        )
				    )
				);

		// Alt color settings

		$wp_customize->add_section( 'alt-colors', array(
		    'title' => 'Alternative Colors',
		    'panel' => 'colors',
		) );

			// Body text color
			$wp_customize->add_setting( 'alt_body_color', array(
			    'type'              => 'theme_mod',
			    'capability'        => 'edit_theme_options',
			    'theme_supports'    => '',
			    'transport'         => 'refresh',
			    'default'           => '#fff',
    			'sanitize_callback' => 'sanitize_hex_color',
			) );

				$wp_customize->add_control(
				    new WP_Customize_Color_Control(
				        $wp_customize,
				        'alt_body_color',
				        array(
				            'label'      => __( 'Text', 'jobseek' ),
				            'section'    => 'alt-colors',
				            'settings'   => 'alt_body_color'
				        )
				    )
				);

			// H1 color
			$wp_customize->add_setting( 'alt_h1_color', array(
			    'type'              => 'theme_mod',
			    'capability'        => 'edit_theme_options',
			    'theme_supports'    => '',
			    'transport'         => 'refresh',
			    'default'           => '#fff',
    			'sanitize_callback' => 'sanitize_hex_color',
			) );

				$wp_customize->add_control(
				    new WP_Customize_Color_Control(
				        $wp_customize,
				        'alt_h1_color',
				        array(
				            'label'      => __( 'H1', 'jobseek' ),
				            'section'    => 'alt-colors',
				            'settings'   => 'alt_h1_color'
				        )
				    )
				);

			// H2 color
			$wp_customize->add_setting( 'alt_h2_color', array(
			    'type'              => 'theme_mod',
			    'capability'        => 'edit_theme_options',
			    'theme_supports'    => '',
			    'transport'         => 'refresh',
			    'default'           => '#000',
    			'sanitize_callback' => 'sanitize_hex_color',
			) );

				$wp_customize->add_control(
				    new WP_Customize_Color_Control(
				        $wp_customize,
				        'alt_h2_color',
				        array(
				            'label'      => __( 'H2', 'jobseek' ),
				            'section'    => 'alt-colors',
				            'settings'   => 'alt_h2_color'
				        )
				    )
				);

			// H3 color
			$wp_customize->add_setting( 'alt_h3_color', array(
			    'type'              => 'theme_mod',
			    'capability'        => 'edit_theme_options',
			    'theme_supports'    => '',
			    'transport'         => 'refresh',
			    'default'           => '#fff',
    			'sanitize_callback' => 'sanitize_hex_color',
			) );

				$wp_customize->add_control(
				    new WP_Customize_Color_Control(
				        $wp_customize,
				        'alt_h3_color',
				        array(
				            'label'      => __( 'H3', 'jobseek' ),
				            'section'    => 'alt-colors',
				            'settings'   => 'alt_h3_color'
				        )
				    )
				);

			// H4 color
			$wp_customize->add_setting( 'alt_h4_color', array(
			    'type'              => 'theme_mod',
			    'capability'        => 'edit_theme_options',
			    'theme_supports'    => '',
			    'transport'         => 'refresh',
			    'default'           => '#14b1bb',
    			'sanitize_callback' => 'sanitize_hex_color',
			) );

				$wp_customize->add_control(
				    new WP_Customize_Color_Control(
				        $wp_customize,
				        'alt_h4_color',
				        array(
				            'label'      => __( 'H4', 'jobseek' ),
				            'section'    => 'alt-colors',
				            'settings'   => 'alt_h4_color'
				        )
				    )
				);

			// H5 color
			$wp_customize->add_setting( 'alt_h5_color', array(
			    'type'              => 'theme_mod',
			    'capability'        => 'edit_theme_options',
			    'theme_supports'    => '',
			    'transport'         => 'refresh',
			    'default'           => '#000',
    			'sanitize_callback' => 'sanitize_hex_color',
			) );

				$wp_customize->add_control(
				    new WP_Customize_Color_Control(
				        $wp_customize,
				        'alt_h5_color',
				        array(
				            'label'      => __( 'H5', 'jobseek' ),
				            'section'    => 'alt-colors',
				            'settings'   => 'alt_h5_color'
				        )
				    )
				);

			// H6 color
			$wp_customize->add_setting( 'alt_h6_color', array(
			    'type'              => 'theme_mod',
			    'capability'        => 'edit_theme_options',
			    'theme_supports'    => '',
			    'transport'         => 'refresh',
			    'default'           => '#fff',
    			'sanitize_callback' => 'sanitize_hex_color',
			) );

				$wp_customize->add_control(
				    new WP_Customize_Color_Control(
				        $wp_customize,
				        'alt_h6_color',
				        array(
				            'label'      => __( 'H6', 'jobseek' ),
				            'section'    => 'alt-colors',
				            'settings'   => 'alt_h6_color'
				        )
				    )
				);

}

/* CSS
-------------------------------------------------------------------------------------------------------------------*/

function jobseek_customizer_css() {
    ?>
    <style type="text/css">

    	body {
    		color: <?php echo get_theme_mod( 'body_color', '#888' ); ?>;
    	}

    	h1 {
    		color: <?php echo get_theme_mod( 'h1_color', '#000' ); ?>;
    	}
    	h2 {
    		color: <?php echo get_theme_mod( 'h2_color', '#000' ); ?>;
    	}
    	h3 {
    		color: <?php echo get_theme_mod( 'h3_color', '#000' ); ?>;
    	}
    	h4 {
    		color: <?php echo get_theme_mod( 'h4_color', '#000' ); ?>;
    	}
    	h5 {
    		color: <?php echo get_theme_mod( 'h5_color', '#000' ); ?>;
    	}
    	h6 {
    		color: <?php echo get_theme_mod( 'h6_color', '#000' ); ?>;
    	}

		<?php
		$logo_height = get_theme_mod( 'logo_height', 40 );

		if( !empty($logo_height) ) {
			$header_height = $logo_height + 20; ?>
    		#header #main-nav > li > a {
    			height: <?php echo esc_html($header_height); ?>px;
    			line-height: <?php echo esc_html($header_height); ?>px;
    		}
    		#logo a,
			#logo img { line-height: <?php echo esc_html($logo_height); ?>px; }
    	<?php } ?>

    	#header,
    	#header-background {
    		background-color: <?php echo get_theme_mod( 'header_bg', '#14b1bb' ); ?>;
    	}

    	#header #main-nav li:hover ul {
    		background-color: <?php echo get_theme_mod( 'dropdown_bg', '#12a0a9' ); ?>;    		
    	}

    	#header #main-nav ul li.current-menu-item a,
    	#header #main-nav ul li a:hover {
    		background-color: <?php echo get_theme_mod( 'dropdown_state_bg', '#109098' ); ?>;
    	}

    	h2::after,
    	#reply-title::after,
    	.btn-primary,
    	.popular .price,
    	.apply-with-facebook:hover,
    	.apply-with-linkedin:hover,
    	.apply-with-xing:hover,
    	.job-manager-form .button,
    	.work-experience .img-circle,
    	.post .meta::after,
    	.pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus,
    	#cjfm-modalbox-login-form h3, #cjfm-modalbox-register-form h3,
    	.job-manager-pagination ul li .current,
    	input[type=submit],
    	ul.job_listings .job_position_featured > a:after {
    		background-color: <?php echo get_theme_mod( 'accent_color', '#14b1bb' ); ?>;
    	}
    	#content .sharedaddy ul li a,
    	.cjfm-form .cjfm-btn,
    	.popular .title,
    	.popular .price,
    	.load_more_jobs,
    	.showing_jobs .reset {
    		background-color: <?php echo get_theme_mod( 'accent_color', '#14b1bb' ); ?> !important;
    	}
    	.counter,
    	.apply-with-facebook,
    	.apply-with-linkedin,
    	.apply-with-xing,
    	ul.job_listings .job_position_featured > a {
    		border-color: <?php echo get_theme_mod( 'accent_color', '#14b1bb' ); ?>;
    	}
    	.flexmenu.fm-sm .navicon:after {    		
    		border-top-color: <?php echo get_theme_mod( 'accent_color', '#14b1bb' ); ?>;
    	}
    	a,
    	.job_listings li a .location::before,
    	.featured-job .city i,
    	.counter .description,
    	.pricing .price,
    	.recent-blog-posts h5,
    	.section-title h4,
    	#title h4,
    	.item-meta,
    	.job_listings li a .meta .date::before,
    	.apply-with-facebook,
    	.apply-with-linkedin,
    	.apply-with-xing,
    	.resumes li a .candidate-location-column::before,
    	.resumes li a .resume-posted-column date::before,
    	h4.date,
    	.meta i,
    	.fa-stack,
    	.pagination > li > a, .pagination > li > span,
    	#loader i,
    	.job_filters .search_jobs i.gjm-locator-btn,
    	.job_filters .search_jobs i.gjm-locator-loader,
    	.resume_filters .search_resumes i.grm-locator-btn,
    	.resume_filters .search_resumes i.grm-locator-loader,
    	ul.job_listings .col.job-location:before,
    	ul.resumes .col.candidate-location:before,
    	ul.job_listings .col.job-dates:before {
    		color: <?php echo get_theme_mod( 'accent_color', '#14b1bb' ); ?>;
    	}

    	a:hover, a:active, a:focus {
    		color: <?php echo get_theme_mod( 'accent_hover_color', '#0d7076' ); ?>;
    	}
    	.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary:active:hover, .btn-primary:active:focus,
    	input[type=submit]:hover {
    		background-color: <?php echo get_theme_mod( 'accent_hover_color', '#0d7076' ); ?>;    		
    	}
    	.load_more_jobs:hover,
    	.showing_jobs .reset:hover {
    		background-color: <?php echo get_theme_mod( 'accent_hover_color', '#0d7076' ); ?> !important;
    	}

    	#header #main-nav > li > a.cjfm-show-login-form,
    	#header #main-nav > li > a.cjfm-show-register-form,
    	#header #main-nav > li.user-nav > a {
    		color: <?php echo get_theme_mod( 'user_nav_link_color', '#08474b' ); ?>;
    	}

    	.color-alternative,
    	.color-alternative a,
    	.testimonials-carousel blockquote footer {
    		color: <?php echo get_theme_mod( 'alt_body_color', '#fff' ); ?>;
    	}
    	.color-alternative h1 {
    		color: <?php echo get_theme_mod( 'alt_h1_color', '#fff' ); ?>;
    	}
    	.color-alternative h2 {
    		color: <?php echo get_theme_mod( 'alt_h2_color', '#000' ); ?>;
    	}
    	.color-alternative h3 {
    		color: <?php echo get_theme_mod( 'alt_h3_color', '#fff' ); ?>;
    	}
    	.color-alternative h4 {
    		color: <?php echo get_theme_mod( 'alt_h4_color', '#14b1bb' ); ?>;
    	}
    	.color-alternative h5,
    	.color-alternative i.fa {
    		color: <?php echo get_theme_mod( 'alt_h5_color', '#000' ); ?>;
    	}
    	.color-alternative h6 {
    		color: <?php echo get_theme_mod( 'alt_h6_color', '#fff' ); ?>;
    	}
    	.color-alternative h2::after {
    		background-color: <?php echo get_theme_mod( 'alt_body_color', '#fff' ); ?>;
    	}
    </style><?php
}
add_action( 'wp_head', 'jobseek_customizer_css' );