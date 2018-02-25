<?php

/* HGroup
-------------------------------------------------------------------------------------------------------------------*/

if (!function_exists('hgroup')) {
	function hgroup( $atts, $content = null) {

	    extract( shortcode_atts( array(
	        "title"    => "",
	        "subtitle" => "",
	        "el_class" => ""
	    ), $atts ) );

	    if( !empty( $el_class ) ) {
		    $output = '<div class="section-title ' . $el_class . '">';
	    } else {
		    $output = '<div class="section-title">';
	    }

	    	if( !empty( $title ) ) {
	    		$output .= '<h1>' . $title . '</h1>';
	    	}

	    	if( !empty( $subtitle ) ) {
	    		$output .= '<h4>' . $subtitle . '</h4>';
	    	}

	    $output .= '</div>';

	    return $output;

	}

}

add_shortcode('hgroup', 'hgroup');