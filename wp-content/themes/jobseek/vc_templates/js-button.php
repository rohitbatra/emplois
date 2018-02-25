<?php

/* Button
-------------------------------------------------------------------------------------------------------------------*/

if (!function_exists('js_button')) {
	function js_button($atts, $content = null) {
        $args = array(
            "color"    => "btn-default",
            "size"     => "",
            "link"     => "",
            "el_class" => "",
        );

        extract(shortcode_atts($args, $atts));

        if( !empty( $size ) ) {
            $size = ' ' . $size;
        }
	        	        
        $link = ( $link == '||' ) ? '' : $link;
        $link = vc_build_link( $link );
        $use_link = false;
        if ( strlen( $link['url'] ) > 0 ) {
            $use_link = true;
            $a_href = $link['url'];
            $a_title = $link['title'];
            $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
        }

        if( !empty( $el_class ) ) {
            $output = '<a class="btn ' . $color . $size . ' ' . $el_class . '"';
        } else {
            $output = '<a class="btn ' . $color . $size . '"';
        }

        $output .= ' href="' . $a_href . '" target="' . $a_target . '">' . $a_title . '</a>';
            	    
	    return $output;
	}
}
add_shortcode('js_button', 'js_button');