<?php

/* HGroup
-------------------------------------------------------------------------------------------------------------------*/

vc_map( array(
    "name"                    => __("HGroup", "jobseek"),
    "base"                    => "hgroup",
    "description"             => __("Header group (title and subtitle)", "jobseek"),
    "show_settings_on_create" => true,
    "weight"                  => 1,
    "category"                => 'Jobseek Custom',
    "group"                   => 'Jobseek Custom',
    "content_element"         => true,
    "icon"                    => get_template_directory_uri() . "/vc_templates/img/text.png",
    "params"                  => array(
    	array(
			"type"        => "textfield",
			"heading"     => __( "Main Title", "jobseek" ),
			"param_name"  => "title",
			"value"       => "",
		),
    	array(
			"type"        => "textfield",
			"heading"     => __( "Subtitle", "jobseek" ),
			"param_name"  => "subtitle",
			"value"       => "",
		),
	    array(
	        "type"        => "textfield",
	        "heading"     => __("Extra class name", "jobseek"),
	        "param_name"  => "el_class",
	        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "jobseek")
	    ),
    ),
) );

/* Subtitle
-------------------------------------------------------------------------------------------------------------------*/

vc_map( array(
    "name"                    => __("Subtitle", "jobseek"),
    "base"                    => "subtitle",
    "description"             => __("Subtitle", "jobseek"),
    "show_settings_on_create" => true,
    "weight"                  => 1,
    "category"                => 'Jobseek Custom',
    "group"                   => 'Jobseek Custom',
    "content_element"         => true,
    "icon"                    => get_template_directory_uri() . "/vc_templates/img/text.png",
    "params"                  => array(
    	array(
			"type"        => "textfield",
			"heading"     => __( "Title", "jobseek" ),
			"param_name"  => "title",
			"value"       => "",
		),
	    array(
	        "type"        => "textfield",
	        "heading"     => __("Extra class name", "jobseek"),
	        "param_name"  => "el_class",
	        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "jobseek")
	    ),
    ),
) );

/* Pricing Table
-------------------------------------------------------------------------------------------------------------------*/

vc_map( array(
    "name"                    => __("Pricing Table", "jobseek"),
    "base"                    => "pricing_table",
    "description"             => __("Title, list and button", "jobseek"),
    "show_settings_on_create" => true,
    "weight"                  => 1,
    "category"                => 'Jobseek Custom',
    "group"                   => 'Jobseek Custom',
    "content_element"         => true,
    "icon"                    => get_template_directory_uri() . "/vc_templates/img/text.png",
    "params"                  => array(
    	array(
			"type"        => "textfield",
			"heading"     => __( "Title", "jobseek" ),
			"param_name"  => "title",
			"value"       => "",
		),
    	array(
			"type"        => "textfield",
			"heading"     => __( "Price", "jobseek" ),
			"param_name"  => "price",
			"value"       => "",
		), 
    	array(
			"type"        => "textarea_html",
			"heading"     => __( "List", "jobseek" ),
			"param_name"  => "content",
			"value"       => "<ul><li>List Item</li><li>List Item</li><li>List Item</li></ul>",
		),

    	array(
			"type"        => "dropdown",
			"class"       => "",
			"heading"     => __( "Button", "jobseek" ),
			"param_name"  => "button",
			"value"       => array(
				'Link'        => 'link',
				'Add to Cart' => 'buy',
				'No Button'   => 'no-button'
				),
		),
        array(
            "type"        => "vc_link",
            "heading"     => __("Link", "jobseek"),
            "param_name"  => "link",
			'dependency'  => array(
				'element' => 'button',
				'value'   => array( 'link' )
				),
        ),
        array(
            "type"        => "textfield",
            "heading"     => __("Product ID", "jobseek"),
            "param_name"  => "product_id",
			'dependency'  => array(
				'element' => 'button',
				'value'   => array( 'buy' )
				),
        ),
        array(
            "type"        => "textfield",
            "heading"     => __("Button Text", "jobseek"),
            "param_name"  => "button_text",
			'dependency'  => array(
				'element' => 'button',
				'value'   => array( 'buy' )
				),
        ),
    	array(
			"type"        => "checkbox",
			"heading"     => __( "Highlight", "jobseek" ),
			"param_name"  => "highlight",
			"value"       => "",
		),
    ),
) );

/* Logo Carousel
-------------------------------------------------------------------------------------------------------------------*/

vc_map( array(
    "name"                    => __("Logo Carousel", "jobseek"),
    "base"                    => "logo_carousel",
    "description"             => __("Show brand logos in a nice carousel", "jobseek"),
    "as_parent"               => array('only' => 'logo_item'),
    "content_element"         => true,
    "icon"                    => get_template_directory_uri() . "/vc_templates/img/cpanel_branding.png",
    "show_settings_on_create" => true,
    "weight"                  => 1,
    "category"                => 'Jobseek Custom',
    "group"                   => 'Jobseek Custom',
    "holder"                  => "div",
    "params"                  => array(
		array(
		"type"       => "dropdown",
		"heading"    => __("Visible Items", "jobseek"),
		"param_name" => "columns",
		"value" => array(
			"1" => "1",
			"2" => "2",
			"3" => "3",
			"4" => "4",
			"5" => "5",
			"6" => "6",
			),
		),
	    array(
	        "type"        => "textfield",
	        "heading"     => __("Autoplay", "jobseek"),
	        "param_name"  => "autoplay",
	        "default"     => "5000",
	        "description" => __("Accepted values: true, false, or time in milliseconds like 5000, which will be 5 seconds.", "jobseek")
	    ),
	    array(
	        "type"        => "textfield",
	        "heading"     => __("Extra class name", "jobseek"),
	        "param_name"  => "el_class",
	        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "jobseek")
	    ),
    ),
    "js_view" => 'VcColumnView'
) );

	vc_map( array(
	    "name"            => __("Logo Item", "jobseek"),
	    "base"            => "logo_item",
	    "content_element" => true,
	    "as_child"        => array('only' => 'logo_carousel'),
	    "show_settings_on_create" => true,
	    "holder"          => "div",
	    "params"          => array(
			array(
				"type"       => "attach_image",
				"heading"    => __('Logo', 'jobseek'),
				"param_name" => "logo"
		    ),
	        array(
	            "type"        => "vc_link",
	            "heading"     => __("URL", "jobseek"),
	            "param_name"  => "logo_url",
	            "description" => __("Optional.", "jobseek")
	        ),
	    ),
	) );


if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Logo_Carousel extends WPBakeryShortCodesContainer {}
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Logo_Item extends WPBakeryShortCode {}
}

/* Counter Up
-------------------------------------------------------------------------------------------------------------------*/

vc_map( array(
    "name"                    => __("Counter Up", "jobseek"),
    "base"                    => "counterup",
    "description"             => __("Stat counter with animation", "jobseek"),
    "as_parent"               => array('only' => 'counterup_item'),
    "content_element"         => true,
    "icon"                    => get_template_directory_uri() . "/vc_templates/img/cpanel_branding.png",
    "show_settings_on_create" => true,
    "weight"                  => 1,
    "category"                => 'Jobseek Custom',
    "group"                   => 'Jobseek Custom',
    "holder"                  => "div",
    "params"                  => array(
	    array(
	        "type"        => "textfield",
	        "heading"     => __("Extra class name", "jobseek"),
	        "param_name"  => "el_class",
	        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "jobseek")
	    ),
    ),
    "js_view" => 'VcColumnView'
) );

	vc_map( array(
	    "name"            => __("Counter Up Item", "jobseek"),
	    "base"            => "counterup_item",
	    "content_element" => true,
	    "as_child"        => array('only' => 'logo_carousel'),
	    "show_settings_on_create" => true,
	    "holder"          => "div",
	    "params"          => array(
			array(
				"type"       => "textfield",
				"heading"    => __('Number', 'jobseek'),
				"param_name" => "number"
		    ),
	        array(
	            "type"        => "textfield",
	            "heading"     => __("Title", "jobseek"),
	            "param_name"  => "title"
	        ),
	    ),
	) );


if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Counterup extends WPBakeryShortCodesContainer {}
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Counterup_Item extends WPBakeryShortCode {}
}

/* Job Manager Shortcodes
-------------------------------------------------------------------------------------------------------------------*/

if ( class_exists( 'WP_Job_Manager' ) ) {

	/* Job List
	-------------------------------------------------------------------------------------------------------------------*/

	vc_map( array(
	    "name"                    => __("Jobs List", "jobseek"),
	    "base"                    => "jobs",
	    "description"             => __("Adds a job board", "jobseek"),
	    "show_settings_on_create" => true,
	    "weight"                  => 1,
	    "category"                => 'Job Manager',
	    "group"                   => 'Job Manager',
	    "content_element"         => true,
	    "icon"                    => get_template_directory_uri() . "/vc_templates/img/text_list_bullets.png",
	    "params"                  => array(
	    	array(
				"type"        => "dropdown",
				"heading"     => __( "Layout", "jobseek" ),
				"param_name"  => "orderby",
				"value"       => array(
						'Full'    => 'full',
						'Minimal' => 'minimal',
					),
				"description" => __( "Choose order parameter.", "jobseek" ),
			),
	    	array(
				"type"        => "textfield",
				"heading"     => __( "Items Per Page", "jobseek" ),
				"param_name"  => "per_page",
				"value"       => 5,
				"description" => __( "How many items to show in the job list.", "jobseek" ),
			),
	    	array(
				"type"        => "dropdown",
				"heading"     => __( "Order By", "jobseek" ),
				"param_name"  => "orderby",
				"value"       => array(
						'Date'     => 'date',
						'Title'    => 'title',
						'ID'       => 'ID',
						'Name'     => 'name',
						'Modified' => 'modified',
						'Parent'   => 'parent',
						'Rand'     => 'rand',
					),
				"description" => __( "Choose order parameter.", "jobseek" ),
			),
	    	array(
				"type"        => "dropdown",
				"heading"     => __( "Order", "jobseek" ),
				"param_name"  => "order",
				"value"       => array(
					'DESC' => 'DESC',
					'ASC'  => 'ASC',
					),
				"description" => __( "Choose sorting order.", "jobseek" ),
			),
	    	array(
				"type"        => "dropdown",
				"heading"     => __( "Show Filters", "jobseek" ),
				"param_name"  => "show_filters",
				"value"       => array(
					'Yes' => 'true',
					'No'  => 'false',
					),
				"description" => __( "Whether show filters by keyword, region, category, type or not...", "jobseek" ),
			),
	    	array(
				"type"        => "dropdown",
				"heading"     => __( "Show Pagination", "jobseek" ),
				"param_name"  => "show_pagination",
				"value"       => array(
					'No'  => 'false',
					'Yes' => 'true',
					),
				"description" => __( "Enable this to show numbered pagination instead of the \"load more jobs\" link.", "jobseek" ),
			),
	    	array(
				"type"        => "dropdown",
				"heading"     => __( "Show Categories", "jobseek" ),
				"param_name"  => "show_categories",
				"value"       => array(
					'Yes' => 'true',
					'No'  => 'false',
					),
				"description" => __( "If enabled, the filters will also show a dropdown letting the user choose a job category to filter by.", "jobseek" ),
			),
	    	array(
				"type"        => "exploded_textarea",
				"heading"     => __( "Categories", "jobseek" ),
				"param_name"  => "categories",
				"value"       => "",
				"description" => __( "Put one category slug per line to limit the jobs to certain categories. This option overrides \"show_categories\" if both are set.", "jobseek" ),
			),
	    	array(
				"type"        => "exploded_textarea",
				"heading"     => __( "Job Types", "jobseek" ),
				"param_name"  => "job_types",
				"value"       => "",
				"description" => __( "List of job type slugs (one per line) to limit the jobs to certain job types.", "jobseek" ),
			),
	    	array(
				"type"        => "exploded_textarea",
				"heading"     => __( "Selected Job Types", "jobseek" ),
				"param_name"  => "selected_job_types",
				"value"       => "",
				"description" => __( "List of job type slugs (one per line) to select by default.", "jobseek" ),
			),
	    	array(
				"type"        => "textfield",
				"heading"     => __( "Location", "jobseek" ),
				"param_name"  => "location",
				"value"       => "",
				"description" => __( "Enter a location keyword to search by default.", "jobseek" ),
			),
	    	array(
				"type"        => "textfield",
				"heading"     => __( "Keywords", "jobseek" ),
				"param_name"  => "keywords",
				"value"       => "",
				"description" => __( "Enter a keyword to search by default.", "jobseek" ),
			),
	    	array(
				"type"        => "dropdown",
				"heading"     => __( "Featured", "jobseek" ),
				"param_name"  => "featured",
				"value"       => array(
					'Both' => '',
					'Yes'  => 'true',
					'No'   => 'false',
					),
				"description" => __( "Set to Yes to show only featured jobs, No to show no featured jobs, or Both show both (featured first).", "jobseek" ),
			),
	    	array(
				"type"        => "dropdown",

				"heading"     => __( "Filled", "jobseek" ),
				"param_name"  => "filled",
				"value"       => array(
					'Default' => '',
					'Yes'     => 'true',
					'No'      => 'false',
					),
				"description" => __( "Set to true to show only filled jobs, false to show no filled jobs, or leave out entirely to respect the default settings.", "jobseek" ),
			),

	    		// Geolocation
		    	array(
					"type"        => "dropdown",
					"class"       => "",
					"heading"     => __( "Use Map", "jobseek" ),
					"description" => __( "Works only if WP Job Manager Geolocation installed.", "jobseek" ),
					"param_name"  => "gjm_use",
					"value"       => array(
						'No'  => 0,
						'Yes' => 2,
						'Yes, with additional parameters' => 1,
						),
				),
			    	array(
						"type"        => "dropdown",
						"heading"     => __( "Display Map", "jobseek" ),
						"param_name"  => "gjm_map",
						'dependency'  => array(
							'element' => 'gjm_use',
							'value'   => array( '1' )
							),
						"value"       => array(
							'No'  => 0,
							'Yes' => 1,
						),
					),
			    	array(
						"type"        => "dropdown",
						"heading"     => __( "Google Address Autocomplete", "jobseek" ),
						"param_name"  => "gjm_autocomplete",
						'dependency'  => array(
							'element' => 'gjm_use',
							'value'   => array( '1' )
							),
						"value"       => array(
							'No'  => 0,
							'Yes' => 1,
						),
					),
			    	array(
						"type"        => "textfield",
						"heading"     => __( "Map Width", "jobseek" ),
						"description" => __( "Example: 100%. Default is 250px.", "jobseek" ),
						"param_name"  => "gjm_map_width",
						'dependency'  => array(
							'element' => 'gjm_use',
							'value'   => array( '1' )
							),
					),
			    	array(
						"type"        => "textfield",
						"heading"     => __( "Map Height", "jobseek" ),
						"description" => __( "Example: 450px. Default is 250px.", "jobseek" ),
						"param_name"  => "gjm_map_height",
						'dependency'  => array(
							'element' => 'gjm_use',
							'value'   => array( '1' )
							),
					),
					array(
						"type"        => "textfield",
						"heading"     => __( "Order By", "jobseek" ),
						"param_name"  => "gjm_orderby",
						"description" => __( 'Enter the desired values, comma separated, in the order you want them to appear. Default will be "distance,featured,title,date".', "jobseek"),
						'dependency'  => array(
							'element' => 'gjm_use',
							'value'   => array( 2 )
							),
					),
			    	array(
						"type"        => "textfield",
						"heading"     => __( "Radius", "jobseek" ),
						"description" => __( "Enter the desired radius values. Enter single value for a default value with no dropdown or multiple values, comma separated, for a dropdown select box. Default: 5,10,15,25,50,100.", "jobseek" ),
						"param_name"  => "gjm_radius",
						'dependency'  => array(
							'element' => 'gjm_use',
							'value'   => array( '1' )
							),
					),
			    	array(
						"type"        => "dropdown",
						"heading"     => __( "Units", "jobseek" ),
						"description" => __( "If both selected the select option will be shown.", "jobseek" ),
						"param_name"  => "gjm_units",
						'dependency'  => array(
							'element' => 'gjm_use',
							'value'   => array( 2 )
							),
						"value"       => array(
							'metric'   => 'metric',
							'imperial' => 'imperial',
							'both'     => 'both',
						),
					),
			    	array(
						"type"        => "dropdown",
						"heading"     => __( "Distance", "jobseek" ),
						"description" => __( "Display the distance of each job in the results.", "jobseek" ),
						"param_name"  => "gjm_distance",
						'dependency'  => array(
							'element' => 'gjm_use',
							'value'   => array( '1' )
							),
						"value"       => array(
							'No'  => '',
							'Yes' => 1,
						),
					),
			    	array(
						"type"        => "dropdown",
						"heading"     => __( "Scroll to Job", "jobseek" ),
						"description" => __( "Scroll down the window to a job when a the user clicks a marker on the map.", "jobseek" ),
						"param_name"  => "gjm_scroll",
						'dependency'  => array(
							'element' => 'gjm_use',
							'value'   => array( '1' )
							),
						"value"       => array(
							'No'  => '',
							'Yes' => 1,
						),
					),

	    ),
	) );

	/* Single Job
	-------------------------------------------------------------------------------------------------------------------*/

	vc_map( array(
	    "name"                    => __("Job", "jobseek"),
	    "base"                    => "job",
	    "description"             => __("Single job with details", "jobseek"),
	    "show_settings_on_create" => true,
	    "weight"                  => 1,
	    "category"                => 'Job Manager',
	    "group"                   => 'Job Manager',
	    "content_element"         => true,
	    "icon"                    => get_template_directory_uri() . "/vc_templates/img/text_drama.png",
	    "params"                  => array(
	    	array(
				"type"        => "textfield",
				"heading"     => __( "Job ID", "jobseek" ),
				"param_name"  => "id",
				"value"       => "",
				"description" => __( "Outputs a single job by ID. You can find the id by viewing the list of jobs in admin.", "jobseek" ),
			),
	    )
	) );

	/* Job Summary
	-------------------------------------------------------------------------------------------------------------------*/

	vc_map( array(
	    "name"                    => __("Job Summary", "jobseek"),
	    "base"                    => "job_summary",
	    "description"             => __("A nice job banner", "jobseek"),
	    "show_settings_on_create" => true,
	    "weight"                  => 1,
	    "category"                => 'Job Manager',
	    "group"                   => 'Job Manager',
	    "content_element"         => true,
	    "icon"                    => get_template_directory_uri() . "/vc_templates/img/text_drama.png",
	    "params"                  => array(
	    	array(
				"type"        => "textfield",
				"heading"     => __( "Job ID", "jobseek" ),
				"param_name"  => "id",
				"value"       => "",
				"description" => __( "Outputs a single job's summary by ID. You can find the id by viewing the list of jobs in admin.", "jobseek" ),
			),
	    	array(
				"type"        => "textfield",
				"heading"     => __( "Width", "jobseek" ),
				"param_name"  => "width",
				"value"       => "auto",
				"description" => __( "'Auto' is highly recommended.", "jobseek" ),
			),
	    )
	) );

	/* Job Submit Form
	-------------------------------------------------------------------------------------------------------------------*/

	vc_map( array(
	    "name"                    => __("Submit Job Form", "jobseek"),
	    "base"                    => "submit_job_form",
	    "description"             => __("Form to post a new job", "jobseek"),
	    "show_settings_on_create" => false,
	    "weight"                  => 1,
	    "category"                => 'Job Manager',
	    "group"                   => 'Job Manager',
	    "content_element"         => true,
	    "icon"                    => get_template_directory_uri() . "/vc_templates/img/form_wizard.png",
	) );

	/* Job Dashboard
	-------------------------------------------------------------------------------------------------------------------*/

	vc_map( array(
	    "name"                    => __("Job Dashboard", "jobseek"),
	    "base"                    => "job_dashboard",
		"description"             => __("Job dashboard used by logged in users", "jobseek"),
	    "show_settings_on_create" => false,
	    "weight"                  => 1,
	    "category"                => 'Job Manager',
	    "group"                   => 'Job Manager',
	    "content_element"         => true,
	    "icon"                    => get_template_directory_uri() . "/vc_templates/img/dashboard.png",
	) );

	/* Past Applications
	-------------------------------------------------------------------------------------------------------------------*/

	vc_map( array(
	    "name"                    => __("Past Applications", "jobseek"),
	    "base"                    => "past_applications",
		"description"             => __("Allow employees to view their past applications", "jobseek"),
	    "show_settings_on_create" => false,
	    "weight"                  => 1,
	    "category"                => 'Job Manager',
	    "group"                   => 'Job Manager',
	    "content_element"         => true,
	    "icon"                    => get_template_directory_uri() . "/vc_templates/img/application_cascade.png",
	) );

}

/* Resume Manager Shortcodes
-------------------------------------------------------------------------------------------------------------------*/

if ( class_exists( 'WP_Resume_Manager' ) ) {

	/* Submit Resume Form
	-------------------------------------------------------------------------------------------------------------------*/

	vc_map( array(
	    "name"                    => __("Submit Resume Form", "jobseek"),
	    "base"                    => "submit_resume_form",
		"description"             => __("Frontend resume submission form", "jobseek"),
	    "show_settings_on_create" => false,
	    "weight"                  => 1,
	    "category"                => 'Resume Manager',
	    "group"                   => 'Resume Manager',
	    "content_element"         => true,
	    "icon"                    => get_template_directory_uri() . "/vc_templates/img/form_wizard.png",
	) );

	/* Candidate Dashboard
	-------------------------------------------------------------------------------------------------------------------*/

	vc_map( array(
	    "name"                    => __("Candidate Dashboard", "jobseek"),
	    "base"                    => "candidate_dashboard",
		"description"             => __("Displays a users submitted resumes", "jobseek"),
	    "show_settings_on_create" => false,
	    "weight"                  => 1,
	    "category"                => 'Resume Manager',
	    "group"                   => 'Resume Manager',
	    "content_element"         => true,
	    "icon"                    => get_template_directory_uri() . "/vc_templates/img/dashboard.png",
	) );

	/* Resumes
	-------------------------------------------------------------------------------------------------------------------*/

	vc_map( array(
	    "name"                    => __("Resumes", "jobseek"),
	    "base"                    => "resumes",
	    "description"             => __("Output resumes to a page", "jobseek"),
	    "show_settings_on_create" => true,
	    "weight"                  => 1,
	    "category"                => 'Resume Manager',
	    "group"                   => 'Resume Manager',
	    "content_element"         => true,
	    "icon"                    => get_template_directory_uri() . "/vc_templates/img/text_list_bullets.png",
	    "params"                  => array(
	    	array(
				"type"        => "textfield",
				"heading"     => __( "Items Per Page", "jobseek" ),
				"param_name"  => "per_page",
				"value"       => 5,
				"description" => __( "How many items to show in the resume list.", "jobseek" ),
			),
	    	array(
				"type"        => "dropdown",
				"class"       => "",
				"heading"     => __( "Order By", "jobseek" ),
				"param_name"  => "order_by",
				"value"       => array(
					'Title'    => 'title',
					'Date'     => 'date',
					'ID'       => 'id',
					'Author'   => 'author',
					'Modified' => 'modified',
					'Parent'   => 'parent',
					'Rand'     => 'rand',
					),
				"description" => __( "Choose order parameter.", "jobseek" ),
			),
	    	array(
				"type"        => "dropdown",
				"class"       => "",
				"heading"     => __( "Order", "jobseek" ),
				"param_name"  => "order",
				"value"       => array(
					'DESC' => 'desc',
					'ASC'  => 'asc',
					),
				"description" => __( "Choose sorting order.", "jobseek" ),
			),
	    	array(
				"type"        => "dropdown",
				"class"       => "",
				"heading"     => __( "Show Filters", "jobseek" ),
				"param_name"  => "show_filters",
				"value"       => array(
					'Yes' => 'true',
					'No'  => 'false',
					),
				"description" => __( "Show filters above the resume list (to allow searching by location etc).", "jobseek" ),
			),
	    	array(
				"type"        => "dropdown",
				"class"       => "",
				"heading"     => __( "Show Categories", "jobseek" ),
				"param_name"  => "show_categories",
				"value"       => array(
					'Yes' => 'true',
					'No'  => 'false',
					),
				"description" => __( "Whether or not to show categories in the filters.", "jobseek" ),
			),
	    	array(
				"type"        => "exploded_textarea",
				"heading"     => __( "Categories", "jobseek" ),
				"param_name"  => "categories",
				"value"       => "",
				"description" => __( "List of category slugs (one per line). Only resumes in these categories will be displayed.", "jobseek" ),
			),

	    		// Geolocation
		    	array(
					"type"        => "dropdown",
					"class"       => "",
					"heading"     => __( "Use Map", "jobseek" ),
					"description" => __( "Works only if WP Resume Manager Geolocation installed.", "jobseek" ),
					"param_name"  => "grm_use",
					"value"       => array(
						'No'  => 0,
						'Yes' => 2,
						'Yes, with additional parameters' => 1,
						),
				),
			    	array(
						"type"        => "dropdown",
						"heading"     => __( "Display Map", "jobseek" ),
						"param_name"  => "grm_map",
						'dependency'  => array(
							'element' => 'grm_use',
							'value'   => array( '1' )
							),
						"value"       => array(
							'No'  => 0,
							'Yes' => 1,
						),
					),
			    	array(
						"type"        => "dropdown",
						"heading"     => __( "Google Address Autocomplete", "jobseek" ),
						"param_name"  => "grm_autocomplete",
						'dependency'  => array(
							'element' => 'grm_use',
							'value'   => array( '1' )
							),
						"value"       => array(
							'No'  => 0,
							'Yes' => 1,
						),
					),
			    	array(
						"type"        => "textfield",
						"heading"     => __( "Map Width", "jobseek" ),
						"description" => __( "Example: 100%. Default is 250px.", "jobseek" ),
						"param_name"  => "grp_map_width",
						'dependency'  => array(
							'element' => 'grm_use',
							'value'   => array( '1' )
							),
					),
			    	array(
						"type"        => "textfield",
						"heading"     => __( "Map Height", "jobseek" ),
						"description" => __( "Example: 450px. Default is 250px.", "jobseek" ),
						"param_name"  => "grp_map_height",
						'dependency'  => array(
							'element' => 'grm_use',
							'value'   => array( '1' )
							),
					),
					array(
						"type"        => "textfield",
						"heading"     => __( "Order By", "jobseek" ),
						"param_name"  => "grm_orderby",
						"description" => __( 'Enter the desired values, comma separated, in the order you want them to appear. Default will be "distance,featured,title,date".', "jobseek"),
						'dependency'  => array(
							'element' => 'grm_use',
							'value'   => array( 2 )
							),
					),
			    	array(
						"type"        => "textfield",
						"heading"     => __( "Radius", "jobseek" ),
						"description" => __( "Enter the desired radius values. Enter single value for a default value with no dropdown or multiple values, comma separated, for a dropdown select box. Default: 5,10,15,25,50,100.", "jobseek" ),
						"param_name"  => "grm_radius",
						'dependency'  => array(
							'element' => 'grm_use',
							'value'   => array( '1' )
							),
					),
			    	array(
						"type"        => "dropdown",
						"heading"     => __( "Units", "jobseek" ),
						"description" => __( "If both selected the select option will be shown.", "jobseek" ),
						"param_name"  => "grm_units",
						'dependency'  => array(
							'element' => 'grm_use',
							'value'   => array( 2 )
							),
						"value"       => array(
							'metric'   => 'metric',
							'imperial' => 'imperial',
							'both'     => 'both',
						),
					),
			    	array(
						"type"        => "dropdown",
						"heading"     => __( "Distance", "jobseek" ),
						"description" => __( "Display the distance of each resume in the results.", "jobseek" ),
						"param_name"  => "grm_distance",
						'dependency'  => array(
							'element' => 'grm_use',
							'value'   => array( '1' )
							),
						"value"       => array(
							'No'  => '',
							'Yes' => 1,
						),
					),
			    	array(
						"type"        => "dropdown",
						"heading"     => __( "Scroll to Resume", "jobseek" ),
						"description" => __( "Scroll down the window to a resume when a the user clicks a marker on the map.", "jobseek" ),
						"param_name"  => "grm_scroll",
						'dependency'  => array(
							'element' => 'grm_use',
							'value'   => array( '1' )
							),
						"value"       => array(
							'No'  => '',
							'Yes' => 1,
						),
					),

	    ),
	) );

}

/* Recent Blog Posts
-------------------------------------------------------------------------------------------------------------------*/

vc_map( array(
    "name"                    => __("Recent Blog Posts", "jobseek"),
    "base"                    => "recent-blog-posts",
    "description"             => __("Carousel or grid of blog posts", "jobseek"),
    "show_settings_on_create" => true,
    "weight"                  => 1,
    "category"                => 'Jobseek Custom',
    "group"                   => 'Jobseek Custom',
    "content_element"         => true,
    "icon"                    => get_template_directory_uri() . "/vc_templates/img/blogs.png",
    "params"                  => array(
    	array(
			"type"        => "dropdown",
			"class"       => "",
			"heading"     => __( "Layout", "jobseek" ),
			"param_name"  => "layout",
			"value"       => array(
				'Carousel' => 'carousel',
				'Grid'     => 'grid',
				),
		),
    	array(
			"type"        => "textfield",
			"heading"     => __( "Carousel Autoplay", "jobseek" ),
			"param_name"  => "autoplay",
			"value"       => "",
			"description" => __( "In milliseconds (1000 = 1 second), example for 5 seconds: 5000. Leave empty to disable autoplay.", "jobseek" ),
			'dependency'  => array(
				'element' => 'layout',
				'value'   => array( 'carousel' )
				),
		),
    	array(
			"type"        => "textfield",
			"heading"     => __( "Posts", "jobseek" ),
			"param_name"  => "posts",
			"value"       => 4,
			"description" => __( "How many latest posts to get.", "jobseek" ),
		),
    	array(
			"type"        => "dropdown",
			"heading"     => __( "Columns", "jobseek" ),
			"param_name"  => "columns",
			"value"       => array(
				'2' => 2,
				'3' => 3,
				'4' => 4,
				),
		),
    	array(
			"type"        => "exploded_textarea",
			"heading"     => __( "Categories", "jobseek" ),
			"param_name"  => "categories",
			"value"       => "",
			"description" => __( "Category ID or several ID's, example: 2,45,34.", "jobseek" ),
		),
    	array(
			"type"        => "textfield",
			"heading"     => __( "Extra class name", "jobseek" ),
			"param_name"  => "el_class",
			"value"       => "",
			"description" => __( "Style particular content element differently - add a class name and refer to it in custom CSS.", "jobseek" ),
		),
    ),
) );

/* Testimonials Carousel
-------------------------------------------------------------------------------------------------------------------*/

vc_map( array(
    "name"                    => __("Testimonials", "jobseek"),
    "base"                    => "testimonials-carousel",
    "description"             => __("Testimonials carousel", "jobseek"),
    "show_settings_on_create" => true,
    "weight"                  => 1,
    "category"                => 'Jobseek Custom',
    "group"                   => 'Jobseek Custom',
    "content_element"         => true,
    "icon"                    => get_template_directory_uri() . "/vc_templates/img/blogs.png",
    "params"                  => array(
    	array(
			"type"        => "dropdown",
			"class"       => "",
			"heading"     => __( "Show", "jobseek" ),
			"param_name"  => "show",
			"value"       => array(
				'Random'       => 'random',
				'Latest'       => 'latest',
				'Selected IDs' => 'selected',
				),
		),
    	array(
			"type"        => "textfield",
			"heading"     => __( "Posts", "jobseek" ),
			"param_name"  => "posts",
			"value"       => 4,
			"description" => __( "How many posts to get.", "jobseek" ),
			'dependency'  => array(
				'element' => 'show',
				'value'   => array( 'random', 'latest' )
				),
		),
    	array(
			"type"        => "textfield",
			"heading"     => __( "Posts ID's", "jobseek" ),
			"param_name"  => "posts_ids",
			"value"       => 4,
			"description" => __( "Testimonial posts ID's separated by comma, example: 14,95,164.", "jobseek" ),
			'dependency'  => array(
				'element' => 'show',
				'value'   => array( 'selected' )
				),
		),
    	array(
			"type"        => "textfield",
			"heading"     => __( "Carousel Autoplay", "jobseek" ),
			"param_name"  => "autoplay",
			"value"       => "",
			"description" => __( "In milliseconds (1000 = 1 second), example for 5 seconds: 5000. Leave empty to disable autoplay.", "jobseek" ),
		),
    	array(
			"type"        => "textfield",
			"heading"     => __( "Extra class name", "jobseek" ),
			"param_name"  => "el_class",
			"value"       => "",
			"description" => __( "Style particular content element differently - add a class name and refer to it in custom CSS.", "jobseek" ),
		),
    ),
) );

/* Button
-------------------------------------------------------------------------------------------------------------------*/

vc_map( array(
    "name"                    => __("Button", "jobseek"),
    "base"                    => "js_button",
    "show_settings_on_create" => true,
    "weight"                  => 1,
    "category"                => 'Jobseek Custom',
    "group"                   => 'Jobseek Custom',
    "content_element"         => true,
    "icon"                    => get_template_directory_uri() . "/vc_templates/img/text.png",
    "params"                  => array(
    	array(
			"type"        => "dropdown",
			"class"       => "",
			"heading"     => __( "Color", "jobseek" ),
			"param_name"  => "color",
			"value"       => array(
				'Default' => 'btn-default',
				'Primary' => 'btn-primary',
				'Success' => 'btn-success',
				'Info'    => 'btn-info',
				'Warning' => 'btn-warning',
				'Danger'  => 'btn-danger'
				),
		),
    	array(
			"type"        => "dropdown",
			"class"       => "",
			"heading"     => __( "Size", "jobseek" ),
			"param_name"  => "size",
			"value"       => array(
				'Default' => '',
				'Large'   => 'btn-lg',
				'Small'   => 'btn-sm',
				),
		),
        array(
            "type"        => "vc_link",
            "heading"     => __("Link & Title", "jobseek"),
            "param_name"  => "link",
        ),
    	array(
			"type"        => "textfield",
			"heading"     => __( "Extra class name", "jobseek" ),
			"param_name"  => "el_class",
			"value"       => "",
			"description" => __( "Style particular content element differently - add a class name and refer to it in custom CSS.", "jobseek" ),
		),
    ),
) );

/* Map
-------------------------------------------------------------------------------------------------------------------*/

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if( is_plugin_active( 'wpjm-jobs-geolocation/wpjm-geolocation.php' ) ) {

	vc_map( array(
	    "name"                    => __("Jobs Global Map", "jobseek"),
	    "base"                    => "gjm_jobs_map",
	    "description"             => __("All jobs on a map.", "jobseek"),
	    "show_settings_on_create" => true,
	    "weight"                  => 1,
	    "category"                => 'Jobseek Custom',
	    "group"                   => 'Jobseek Custom',
	    "content_element"         => true,
	    "icon"                    => get_template_directory_uri() . "/vc_templates/img/text.png",
	    "params"                  => array(
	    	array(
				"type"        => "textfield",
				"heading"     => __( "Map Width", "jobseek" ),
				"description" => __( "Example: 100%. Default is 250px.", "jobseek" ),
				"param_name"  => "map_width",
			),
	    	array(
				"type"        => "textfield",
				"heading"     => __( "Map Height", "jobseek" ),
				"description" => __( "Example: 450px. Default is 250px.", "jobseek" ),
				"param_name"  => "map_height",
			),
	    	array(
				"type"        => "dropdown",
				"heading"     => __( "Map Type", "jobseek" ),
				"param_name"  => "map_type",
				"value"       => array(
					'Roadmap'   => 'ROADMAP',
					'Satellite' => 'SATELLITE',
					'Hybrid'    => 'HYBRID',
					'Terrain'   => 'TERRAIN',
					),
			),
	    	array(
				"type"        => "dropdown",
				"heading"     => __( "Marker Cluster", "jobseek" ),
				"param_name"  => "marker_cluster",
				"value"       => array(
					'Yes' => 1,
					'No'  => 0,
					),
			),
	    	array(
				"type"        => "textfield",
				"heading"     => __( "Jobs Count", "jobseek" ),
				"description" => __( "Set the maximum number of jobs that can be display on the map. Default is 200.", "jobseek" ),
				"param_name"  => "jobs_count",
			),
	    ),
	) );

}

if( is_plugin_active( 'wpjm-resumes-geolocation/wpjb-resumes-geolocation.php' ) ) {

	vc_map( array(
	    "name"                    => __("Resumes Global Map", "jobseek"),
	    "base"                    => "grm_resumes_map",
	    "description"             => __("All resumes on a map.", "jobseek"),
	    "show_settings_on_create" => true,
	    "weight"                  => 1,
	    "category"                => 'Jobseek Custom',
	    "group"                   => 'Jobseek Custom',
	    "content_element"         => true,
	    "icon"                    => get_template_directory_uri() . "/vc_templates/img/text.png",
	    "params"                  => array(
	    	array(
				"type"        => "textfield",
				"heading"     => __( "Map Width", "jobseek" ),
				"description" => __( "Example: 100%. Default is 250px.", "jobseek" ),
				"param_name"  => "map_width",
			),
	    	array(
				"type"        => "textfield",
				"heading"     => __( "Map Height", "jobseek" ),
				"description" => __( "Example: 450px. Default is 250px.", "jobseek" ),
				"param_name"  => "map_height",
			),
	    	array(
				"type"        => "dropdown",
				"heading"     => __( "Map Type", "jobseek" ),
				"param_name"  => "map_type",
				"value"       => array(
					'Roadmap'   => 'ROADMAP',
					'Satellite' => 'SATELLITE',
					'Hybrid'    => 'HYBRID',
					'Terrain'   => 'TERRAIN',
					),
			),
	    	array(
				"type"        => "dropdown",
				"heading"     => __( "Marker Cluster", "jobseek" ),
				"param_name"  => "marker_cluster",
				"value"       => array(
					'Yes' => 1,
					'No'  => 0,
					),
			),
	    	array(
				"type"        => "textfield",
				"heading"     => __( "Resumes Count", "jobseek" ),
				"description" => __( "Set the maximum number of resumes that can be display on the map. Default is 200.", "jobseek" ),
				"param_name"  => "resumes_count",
			),
	    ),
	) );	

}

/* Row Color Scheme
-------------------------------------------------------------------------------------------------------------------*/

vc_add_param("vc_row", array(
      "type"        => "dropdown",
      "heading"     => __("Color Scheme", "jobseek"),
      "param_name"  => "color_scheme",
      "description" => __("This parameter allow you to switch beetwen of 3 various color sets (for title, subtitle, text and link colors). You can manage these colors sets in theme options panel.", "jobseek"),
      "value"       => array(
	      	__("Default", "jobseek") => 'color-default',
	      	__("Alternative", "jobseek") => 'color-alternative',
      )
));

?>