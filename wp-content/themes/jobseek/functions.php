<?php

/* Theme setup
-------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'jobseek_setup' ) ) :

	function jobseek_setup() {

		if ( ! isset( $content_width ) ) {
			$content_width = 1140;
		}

		load_theme_textdomain( 'jobseek', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'job-manager-templates' );
        add_theme_support( 'resume-manager-templates' ); 

		add_theme_support( 'woocommerce' );

		add_image_size('blog', 750, 9999, false);
	    add_image_size('gallery', 475, 356, true);
        add_image_size('testimonial', 140, 140, true);
        add_image_size('candidate', 360, 360, true);
        add_image_size('featured', 360, 240, true);

		register_nav_menus( array(
			'primary'        => __( 'Main Menu', 'jobseek' ),
            'candidate-menu' => __( 'Candidate Menu', 'jobseek' ),
            'employer-menu'  => __( 'Employer Menu', 'jobseek' ),
		) );

		// Enable support for HTML5 markup.
		add_theme_support( 'html5', array(
			'comment-list',
			'search-form',
			'comment-form',
			'gallery',
			'caption',
		) );

	}

endif; // jobseek_setup

add_action( 'after_setup_theme', 'jobseek_setup' );

function remove_license_window() {
    echo '<style type="text/css">#verify-purchase-code { display: none !important; }</style>'; 
}

add_action('admin_head', 'remove_license_window');

/* Homepage title
-------------------------------------------------------------------------------------------------------------------*/

add_filter( 'wp_title', 'jobseek_title_for_home' );
function jobseek_title_for_home( $title ) {
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return __( 'Home', 'jobseek' ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}

/* Main menu fallback
-------------------------------------------------------------------------------------------------------------------*/

function jobseek_menu_fallback() {
    echo( '<li><a href="' . admin_url( 'nav-menus.php' ) . '">' . __('Add a menu', 'jobseek') . '</a></li>' );
}

/* Add class to user menus
-------------------------------------------------------------------------------------------------------------------*/

add_filter( 'nav_menu_css_class' , 'special_nav_class' , 10 , 3 );
function special_nav_class( $classes, $item, $args ) {
    if ( 'candidate-menu' === $args->theme_location || 'employer-menu' === $args->theme_location ) {
        $classes[] = 'user-nav';
    }

    return $classes;
}

/* Check user role
-------------------------------------------------------------------------------------------------------------------*/

function jobseek_check_user_role( $role, $user_id = null ) {
 
    if ( is_numeric( $user_id ) ) {
        $user = get_userdata( $user_id );
    } else {
        $user = wp_get_current_user();
    }
 
    if ( empty( $user ) ) return false;
 
    return in_array( $role, (array) $user->roles );
}

/* Enqueue CSS and JS
-------------------------------------------------------------------------------------------------------------------*/

function jobseek_scripts() {

	/* === CSS ==== */

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );

    wp_enqueue_style( 'flexmenu', get_template_directory_uri() . '/css/jquery.flexmenu.css' );

    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' );

	wp_enqueue_style( 'jobseek-style', get_stylesheet_uri() );

    wp_enqueue_style( 'plugins', get_template_directory_uri() . '/css/plugins.css' );


    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    // check for plugin using plugin name
    if ( !is_plugin_active( 'easy-google-fonts/easy-google-fonts.php' ) ) {
        $query_args = array(
            'family' => 'Lato:400,700|Montserrat:700'
        );
        wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
    } 

	/* === JS ==== */

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
 
    wp_enqueue_script( 'jquery' );

    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', '1.0', true );

    wp_enqueue_script( 'flexmenu', get_template_directory_uri() . '/js/jquery.flexmenu.js', 'jquery', '1.0', true );

    wp_register_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js','jquery', '1.0', true );

    wp_register_script( 'counterup', get_template_directory_uri() . '/js/jquery.counterup.min.js','jquery', '1.0', true );
    wp_register_script( 'waypoints', get_template_directory_uri() . '/js/waypoints.min.js','jquery', '1.0', true );

	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', 'jquery', '1.0', true );

    wp_dequeue_style( 'jquery-ui-style' );
    wp_dequeue_style( 'wp-job-manager-frontend' );
    wp_dequeue_style( 'wp-job-manager-resume-frontend' );

    wp_dequeue_style( 'wp-job-manager-apply-with-facebook-styles' );
    wp_dequeue_style( 'wp-job-manager-apply-with-linkedin-styles' );
    wp_dequeue_style( 'wp-job-manager-apply-with-xing-styles' );

    //wp_dequeue_style( 'gjm-frontend' );
    //wp_dequeue_style( 'grm-frontend' );    

    wp_dequeue_style( 'wp-job-manager-bookmarks-frontend' );

}
add_action( 'wp_enqueue_scripts', 'jobseek_scripts' );

/* Register Widgetized Locations
-------------------------------------------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'jobseek_widgets_init' );
function jobseek_widgets_init() {

    // Register widgetized locations
    if(function_exists('register_sidebar')) {
        register_sidebar(array(
            'name' => 'Pages',
            'id' => 'page-sidebar',
            'description' => 'This is default sidebar for pages.',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h5>',
            'after_title' => '</h5>'
        ));
        register_sidebar(array(
            'name' => 'Job Single Top',
            'id' => 'job-single-top',
            'description' => 'Display widgets on job single sidebar page before information.',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h5>',
            'after_title' => '</h5>'
        ));
        register_sidebar(array(
            'name' => 'Job Single Bottom',
            'id' => 'job-single-bottom',
            'description' => 'Display widgets on job single sidebar page after information.',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h5>',
            'after_title' => '</h5>'
        ));
        register_sidebar(array(
            'name' => 'Resume Single Top',
            'id' => 'resume-single-top',
            'description' => 'Display widgets on resume single sidebar page before information.',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h5>',
            'after_title' => '</h5>'
        ));
        register_sidebar(array(
            'name' => 'Resume Single Bottom',
            'id' => 'resume-single-bottom',
            'description' => 'Display widgets on resume single sidebar page after information.',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h5>',
            'after_title' => '</h5>'
        ));
        register_sidebar(array(
            'name' => 'Blog / Archives',
            'id' => 'default-blog',
            'description' => 'This is default sidebar to use on blog, archives and in all other cases.',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h5>',
            'after_title' => '</h5>'
        ));
        register_sidebar(array(
            'name' => 'Testimonials Archive',
            'id' => 'testimonials-archive',
            'description' => 'This a sidebar for reviews archive page.',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h5>',
            'after_title' => '</h5>'
        ));
        register_sidebar(array(
            'name' => 'Footer Sidebar 1',
            'id' => 'footer-sidebar-1',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2>',
            'after_title' => '</h2>'
        ));
        register_sidebar(array(
            'name' => 'Footer Sidebar 2',
            'id' => 'footer-sidebar-2',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2>',
            'after_title' => '</h2>'
        ));
        register_sidebar(array(
            'name' => 'Footer Sidebar 3',
            'id' => 'footer-sidebar-3',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2>',
            'after_title' => '</h2>'
        ));
        register_sidebar(array(
            'name' => 'Footer Sidebar 4',
            'id' => 'footer-sidebar-4',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h2>',
            'after_title' => '</h2>'
        ));
    }

}


/* Page Title
-------------------------------------------------------------------------------------------------------------------*/

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function jobseek_wp_title( $title, $sep ) {
    if ( is_feed() ) {
        return $title;
    }
    
    global $page, $paged;

    // Add the blog name
    $title .= get_bloginfo( 'name', 'display' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title .= " $sep $site_description";
    }

    // Add a page number if necessary:
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
        $title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
    }

    return $title;
}
add_filter( 'wp_title', 'jobseek_wp_title', 10, 2 );

/* Visual Composer
-------------------------------------------------------------------------------------------------------------------*/

if (class_exists('WPBakeryVisualComposerAbstract')) {

	function requireVcExtend(){
		require_once get_template_directory() . '/vc_templates/extend-vc.php';
	}
	add_action('init', 'requireVcExtend', 2); 

    require_once( get_template_directory() . '/vc_templates/recent-blog-posts.php' );
    require_once( get_template_directory() . '/vc_templates/hgroup.php' );
    require_once( get_template_directory() . '/vc_templates/subtitle.php' );
    require_once( get_template_directory() . '/vc_templates/logo-carousel.php' );
    require_once( get_template_directory() . '/vc_templates/logo-item.php' ); 
    require_once( get_template_directory() . '/vc_templates/counterup.php' ); 
    require_once( get_template_directory() . '/vc_templates/counterup-item.php' ); 
    require_once( get_template_directory() . '/vc_templates/testimonials-carousel.php' ); 
    require_once( get_template_directory() . '/vc_templates/pricing-table.php' ); 
    require_once( get_template_directory() . '/vc_templates/js-button.php' ); 

    vc_remove_element("vc_button");
    vc_remove_element("vc_button2");

	vc_remove_element("vc_widget_sidebar");
	vc_remove_element("vc_wp_search");
	vc_remove_element("vc_wp_meta");
	vc_remove_element("vc_wp_recentcomments");
	vc_remove_element("vc_wp_calendar");
	vc_remove_element("vc_wp_pages");
	vc_remove_element("vc_wp_tagcloud");
	vc_remove_element("vc_wp_custommenu");
	vc_remove_element("vc_wp_text");
	vc_remove_element("vc_wp_posts");
	vc_remove_element("vc_wp_links");
	vc_remove_element("vc_wp_categories");
	vc_remove_element("vc_wp_archives");
	vc_remove_element("vc_wp_rss");

}

/* Plugins installation
-------------------------------------------------------------------------------------------------------------------*/

require get_template_directory() . '/inc/plugins.php';

/* Meta Fields
-------------------------------------------------------------------------------------------------------------------*/

require get_template_directory() . '/inc/meta-fields.php';

/* Customizer
-------------------------------------------------------------------------------------------------------------------*/

require get_template_directory() . '/inc/customizer.php';

/* Bootstrap Pagination
-------------------------------------------------------------------------------------------------------------------*/

require get_template_directory() . '/inc/wp_bootstrap_pagination.php';

/* Social Profiles Widget
-------------------------------------------------------------------------------------------------------------------*/

require get_template_directory() . '/inc/social-profiles-widget.php';

/* Salary for WP Job Manager
-------------------------------------------------------------------------------------------------------------------*/

$salary = get_theme_mod('salary', 'yes');
if ($salary != 'no') {
    require get_template_directory() . '/inc/wp-job-manager-salary.php';
}

/* Login/Register Links And User Menu
-------------------------------------------------------------------------------------------------------------------*/

if( !function_exists('jobseek_login_register_function') ) {

    add_filter('wp_nav_menu_items','jobseek_login_register_function', 10, 2);

    function jobseek_login_register_function( $nav, $args ) {

        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

        // check for plugin using plugin name
        if ( is_plugin_active( 'cj-membership-modules/index.php' ) ) {
            if ( !is_user_logged_in() ) {
                if( $args->theme_location == 'primary' ) {
                    return $nav . '<li><a href="#" class="cjfm-show-login-form">' . __( 'Login', 'jobseek' ) . '</a></li><li><a href="#" class="cjfm-show-register-form">' . __( 'Register', 'jobseek' ) . '</a></li>';
                }
            }
        } 

        return $nav;

    }
    
}

/* Excerpt Length
-------------------------------------------------------------------------------------------------------------------*/

function custom_excerpt_length( $length ) {
    return 34;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/* Comments Layout
-------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'jobseek_comment' ) ) {
    function jobseek_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) {
        case 'pingback' :
        case 'trackback' :
            // Display trackbacks differently than normal comments ?>
            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                <article id="comment-<?php comment_ID(); ?>" class="pingback">
                    <p><?php esc_html_e( 'Pingback:', 'jobseek' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'jobseek' ), '<span class="edit-link">', '</span>' ); ?></p>
                </article>
            <?php
            break;
        default :
            // Proceed with normal comments.
            global $post; ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <article id="comment-<?php comment_ID(); ?>" class="comment">
                    <header class="comment-meta comment-author vcard"><?php
                        echo get_avatar( $comment, 60 );
                        comment_reply_link( array_merge( $args, array( 'reply_text' => wp_kses( __( 'Reply', 'jobseek' ), array( 'span' => array() ) ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
                        edit_comment_link( esc_html__( 'Edit', 'jobseek' ) );
                        printf( '<cite class="fn">%1$s %2$s</cite>',
                            get_comment_author_link(),
                            // If current post author is also comment author, make it known visually.
                            ( $comment->user_id === $post->post_author ) ? '<span class="badge">' . esc_html__( 'author', 'jobseek' ) . '</span>' : '' );
                        ?><div class="comment-footer"><?php
                            printf( '<a href="%1$s" title="Posted %2$s"><time itemprop="datePublished" datetime="%3$s">%4$s</time></a>',
                                esc_url( get_comment_link( $comment->comment_ID ) ),
                                sprintf( esc_html__( '%1$s @ %2$s', 'jobseek' ), esc_html( get_comment_date() ), esc_attr( get_comment_time() ) ),
                                get_comment_time( 'c' ),
                                /* Translators: 1: date, 2: time */
                                sprintf( esc_html__( '%1$s at %2$s', 'jobseek' ), get_comment_date(), get_comment_time() )
                            );
                    ?></div></header><?php
                    if ( '0' == $comment->comment_approved ) {
                        ?><p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'jobseek' ); ?></p><?php
                    }
                    ?><section class="comment-content comment"><?php
                        comment_text();
                    ?></section>
                </article><?php
            break;
        }
    }
}

/* Comment Field
-------------------------------------------------------------------------------------------------------------------*/

function jobseek_comment_form_field_comment( $field ) {

    $field = '<div class="form-group comment-form-comment"><textarea class="form-control" placeholder="' . _x( 'Comment *', 'noun', 'jobseek' ) . '" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></div>';

    return $field;

}
add_action( 'comment_form_field_comment', 'jobseek_comment_form_field_comment' );

/* Excerpt More Symbol
-------------------------------------------------------------------------------------------------------------------*/

function jobseek_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter('excerpt_more', 'jobseek_excerpt_more');

/* Single job listing changes
-------------------------------------------------------------------------------------------------------------------*/

function jobseek_job_single() {
    remove_action( 'single_job_listing_start', 'job_listing_meta_display', 20 );
    remove_action( 'single_job_listing_start', 'job_listing_company_display', 30 );

    remove_action( 'single_job_listing_meta_after', 'bookmark_form' );
    remove_action( 'single_resume_start', 'bookmark_form' );

    global $job_manager_bookmarks;
    if( !empty( $job_manager_bookmarks ) ) {
        remove_action( 'single_job_listing_meta_after', array( $job_manager_bookmarks, 'bookmark_form' ) );
        remove_action( 'single_resume_start', array( $job_manager_bookmarks, 'bookmark_form' ) );

        add_action( 'single_job_listing_end', array( $job_manager_bookmarks, 'bookmark_form' ) );
        add_action( 'single_resume_end', array( $job_manager_bookmarks, 'bookmark_form' ) );
    }

}
add_filter( 'after_setup_theme', 'jobseek_job_single', 11 );

add_action( 'single_job_listing_sidebar', 'job_listing_company_display', 10 );

/* Add thumbnail support for job listing
-------------------------------------------------------------------------------------------------------------------*/

function jobseek_post_type_job_listing( $args ) {
    $args[ 'supports' ] = array( 'title', 'editor', 'custom-fields', 'thumbnail' );

    return $args;
}

add_filter( 'register_post_type_job_listing', 'jobseek_post_type_job_listing' );

/* Move Jetpack Share
-------------------------------------------------------------------------------------------------------------------*/

function jobseek_jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }

}
 
add_action( 'loop_start', 'jobseek_jptweak_remove_share' );

/* Set homepage, blog page and menus after import
-------------------------------------------------------------------------------------------------------------------*/

function jobseek_after_import() {
    // Use a static front page
    $about = get_page_by_title( 'Home' );
    update_option( 'page_on_front', $about->ID );
    update_option( 'show_on_front', 'page' );

    // Set the blog page
    $blog = get_page_by_title( 'Blog' );
    update_option( 'page_for_posts', $blog->ID );

    // Set menus
    $theme_locations = get_registered_nav_menus();

    foreach ($theme_locations as $location => $description ) {

        switch($location) {
            case 'primary':
                $menu = get_term_by('name', 'Main Menu', 'nav_menu');
            break;

            case 'candidate-menu':
                $menu = get_term_by('name', 'Candidate Menu', 'nav_menu');
            break;

            case 'employer-menu':
                $menu = get_term_by('name', 'Employer Menu', 'nav_menu');
            break;
        }

        if( isset($menu) ) {
            $theme_locations[$location] = $menu->term_id;
        }

    }

    set_theme_mod( 'nav_menu_locations', $theme_locations );

}

add_action( 'import_end', 'jobseek_after_import' );

function ajax_check_user_logged_in()
{

    $res =  is_user_logged_in() ? 'yes' : 'no' ;

    if($res === 'yes')
    {
        $current_user = wp_get_current_user();
        $roles = $current_user->roles;
        if($roles[0] == 'employer')
        {
            echo 'yes';
        }else {
            echo 'no';
        }
    }else{
        echo $res;
    }

    die();
}
add_action('wp_ajax_is_user_logged_in', 'ajax_check_user_logged_in');
add_action('wp_ajax_nopriv_is_user_logged_in', 'ajax_check_user_logged_in');


/* Disable WordPress Admin Bar for all users but admins. */
  show_admin_bar(false);
