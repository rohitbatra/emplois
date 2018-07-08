<?php
/* Template name: Dashboard Template */
// NOT USED
get_header();
$user_ID = get_current_user_id();
#var_dump($user_ID);die();
$current_user = wp_get_current_user();
if ( !($current_user instanceof WP_User) )
   return;
$roles = $current_user->roles;  //$roles is an array


$page_title = get_post_meta( get_the_ID(), '_jobseek_page_title_show', true );

if( $page_title != 'hide' ) {

	$page_subtitle = get_post_meta( get_the_ID(), '_jobseek_page_title_subtitle', true ); ?>

	<section id="title">
		<div class="container">
			<h1><?php the_title(); ?></h1>
			<?php if( !empty( $page_subtitle ) ) { ?><h4><?php echo esc_html($page_subtitle); ?></h4><?php } ?>
		</div>
	</section>

<?php } ?>

<section id="content"<?php if( $page_title != 'show' ) { ?> class="no-title"<?php } ?>>
	<div class="container">
    <?php //print_r($roles);?>
    <!-- || $roles['0'] == 'administrator' -->
<?php if($user_ID != 0 && $roles['0'] == 'employer' ) { echo do_shortcode('[job_dashboard]'); } ?>
<?php if($user_ID != 0 && $roles['0'] == 'subscriber' ) { ?>

    <div id="job-manager-job-dashboard">

    <p>Your Job Applied listings are shown in the table below.</p>

        <div class="table-responsive">
            <table class="job-manager-jobs table table-striped">
            <thead>
            <tr>
            <th class="job_title">#</th>
            <th class="job_title">Title</th>
            <th class="date">Date Posted</th>
            <th class="date">Applied Date</th>
            <th class="date">Status</th>
            </tr>
            </thead>
            <tbody>

            <?php
				include("database.php");

				$get_job	=	"SELECT * FROM applied_job_details WHERE user_ID = '$user_ID'";
				$result 	= 	mysqli_query($conn, $get_job);
				if ($result->num_rows > 0) {
				$i=1;
				while($row = $result->fetch_assoc())
					{
						$j_id			=	$row['job_ID'];
						$app_date		=	date_create($row['applied_date']);
				?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td> <a target="_blank" href="<?php echo esc_url( get_permalink($j_id) ); ?>"><?php echo get_the_title($j_id); ?></a></td>
                    <td><?php echo  get_the_date( $format, $j_id ) ; ?></td>
                    <td><?php echo date_format($app_date,"F j, Y"); ?></td>
                    <td><strong><?php echo "Applied" ?></strong></td>
                </tr>

	<?php
                        $i++;
					}
				}
	?>

            </tbody>
            </table>

        </div>

    </div>

<?php } else {}?>

		<?php if ( have_posts() ) :

			while ( have_posts() ) : the_post();

				the_content();

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'modellic' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'modellic' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );

				if ( comments_open() ) {
					comments_template();
				}

			endwhile;

		else :

			get_template_part( 'content', 'none' );

		endif; ?>

	</div>
</section>

<?php get_footer(); ?>
