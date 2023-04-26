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
									'posts_per_page' => -1,
								);
								
								$loop = new WP_Query( $args ); 
								
								if ( $loop->have_posts() ) : ?>
							<div class="grid-x grid-padding-x small-up-1 medium-up-2 tablet-up-3 large-up-4">
								<?php	
								while ( $loop->have_posts() ) : $loop->the_post();
								
									get_template_part('template-parts/loop', 'news-card');	
								
								endwhile;?>
							</div>
								<?php	
								else:?>
							<div class="grid-x grid-padding-x">
									<h2 class="cell small-14 text-center">There are no News at this time.<br>Check back soon.</h2>
							</div>
								<?php endif;
								echo paginate_links( array(
									'total' => $loop->max_num_pages
								) );
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