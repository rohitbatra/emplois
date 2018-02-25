<?php global $post; ?>
<li <?php job_listing_class(); ?> data-longitude="<?php echo esc_attr( $post->geolocation_lat ); ?>" data-latitude="<?php echo esc_attr( $post->geolocation_long ); ?>">
	
	<?php if( function_exists('user_has_applied_for_job') ) 

	{ ?>
	
	<a class="class1" href="<?php the_job_permalink(); ?>"<?php if( user_has_applied_for_job(get_current_user_id(), $post->ID) ) { echo ' class="applied"'; } ?>></a>
	
	<?php }


	 else { 
	 	?>
	<a class="class2" href="<?php the_job_permalink(); ?>">

	<?php } ?>
		<div class="row">
			<div class="col job-logo">
				<?php the_company_logo(); ?>
			</div>
			<div class="col job-title">
				<?php the_title('<h5>', '</h5>'); ?>
				<?php the_company_name( '<strong>', '</strong>' ); ?> <?php the_company_tagline(); ?>
			</div>
			<div class="col job-location">
				<p style=" margin-bottom: 0em; "><?php the_job_location( false ); ?></p>
				
			</div>

			<div class="col job-type">
				<ul>
					<?php do_action( 'job_listing_meta_start' ); ?>
					<li class="badge job-type <?php echo get_the_job_type() ? sanitize_title( get_the_job_type()->slug ) : ''; ?>"><?php the_job_type(); ?></li>
				</ul>
			</div>



		<div class="col job-category">
                            <?php $terms = get_the_terms( get_the_ID(), 'job_listing_category' );

				if ( $terms && ! is_wp_error( $terms ) ) : 
				    $draught_links = array();
				    foreach ( $terms as $term ) {
				        //$draught_links[] = '<a class="class1" href="'.get_term_link( $term->slug, $term->taxonomy).'">'.$term->name.'</a>';
					$draught_links[] = $term->name;
				    }
			    $on_draught = join( ", ", $draught_links );                            
			    ?>
		        <?php print($on_draught); ?>
			<?php endif; ?>
		        </div>
		</div>
	</a>
</li>