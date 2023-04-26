<?php
/**
 * Template name: News Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

get_header();
$fields = get_fields();
?>
	<div class="content">
		<div class="inner-content">

			<main id="primary" class="site-main">
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				
					<?php if( !empty( $fields['page_banner'] ) ) {
						get_template_part('template-parts/part', 'page-banner', 
							array(
								'page_banner' => $fields['page_banner'],
							)
						);
					};?>
					
					<section class="news">
						<div class="grid-container">
								<?php		
								$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;	
								$args = array(  
									'post_type' => 'post',
									'post_status' => 'publish',
									'posts_per_page' => 8,
									'paged' => $paged
								);
								
								$loop = new WP_Query( $args ); 
								
								if ( $loop->have_posts() ) : ?>
							<div class="grid-x grid-padding-x small-up-1 medium-up-2 tablet-up-3 large-up-4">
								<?php	
								while ( $loop->have_posts() ) : $loop->the_post();
								
									get_template_part('template-parts/loop', 'news-card');	
								
								endwhile;?>
							</div>
							<div class="grid-x grid-padding-x">
								<?php
								$pagination = paginate_links( array(
									'base' => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
									'format' => '?paged=%#%',
									'current' => max( 1, get_query_var( 'paged' ) ),
									'total' => $loop->max_num_pages,
									'prev_text' => __( '<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"><g id="Group_362" data-name="Group 362" transform="translate(-52 -845)"><circle id="Ellipse_12" data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(52 845)" fill="#d7e352"/><path id="Icon_awesome-chevron-left" data-name="Icon awesome-chevron-left" d="M2.223,10.948l8.011-8.011a.989.989,0,0,1,1.4,0l.934.934a.989.989,0,0,1,0,1.4L6.22,11.648l6.349,6.379a.989.989,0,0,1,0,1.4l-.934.934a.989.989,0,0,1-1.4,0L2.223,12.347A.989.989,0,0,1,2.223,10.948Z" transform="translate(61.067 851.352)" fill="#1a293c"/></g></svg>', 'textdomain' ),
									'next_text' => __( '<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"><g id="Group_362" data-name="Group 362" transform="translate(88 881) rotate(180)"><circle id="Ellipse_12" data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(52 845)" fill="#d7e352"/><path id="Icon_awesome-chevron-left" data-name="Icon awesome-chevron-left" d="M2.223,10.948l8.011-8.011a.989.989,0,0,1,1.4,0l.934.934a.989.989,0,0,1,0,1.4L6.22,11.648l6.349,6.379a.989.989,0,0,1,0,1.4l-.934.934a.989.989,0,0,1-1.4,0L2.223,12.347A.989.989,0,0,1,2.223,10.948Z" transform="translate(61.067 851.352)" fill="#1a293c"/></g></svg>', 'textdomain' )
								) );
								
								if ( $pagination ) :
									echo '<div class="pagination cell small-14 grid-x align-middle align-center">' . $pagination . '</div>';
								endif;
									
							?>
							</div>
								<?php	
								else:?>
							<div class="grid-x grid-padding-x">
									<h2 class="cell small-14 text-center">There are no News at this time.<br>Check back soon.</h2>
							</div>
								<?php endif;
								wp_reset_postdata(); 
								?>
						</div>
					</section>

							
					<footer class="article-footer">
					</footer> <!-- end article footer -->
						
				</article><!-- #post-<?php the_ID(); ?> -->
		
			</main><!-- #main -->
				
		</div>
	</div>

<?php
get_footer();