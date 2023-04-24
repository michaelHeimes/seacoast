<?php
/**
 * Template name: Tournaments Page
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
				
					<?php if( !empty($fields['image_and_copy']) ) {
						echo '<div class="relative"><div class="bg gradient-dl"></div>';
						get_template_part('template-parts/content', 'image-and-copy', 
							array(
								'image_and_copy' => $fields['image_and_copy'],
							)
						);	
						echo '</div>';
					}?>
					
					<section class="tournaments">
						<div class="grid-container">
							<div class="grid-x grid-padding-x">
								<div class="heading-wrap cell small-14">
									<h2 class="h2-underlined underline-yellow white-color">Upcoming Tournaments</h2>
								</div>
							</div>
							<div class="grid-x grid-padding-x small-up-1 medium-up-2 tablet-up-3 large-up-4">
								<?php			
								$args = array(  
									'post_type' => 'tournament',
									'post_status' => 'publish',
									'posts_per_page' => -1,
								);
								
								$loop = new WP_Query( $args ); 
								
								if ( $loop->have_posts() ) : 
									
									while ( $loop->have_posts() ) : $loop->the_post();
									
										get_template_part('template-parts/loop', 'tournament-card');	
									
									endwhile;
									
								else:?>
								
									<h2 class="text-center">There are no Tournaments at this time.<br>Check back soon.</h2>
								
								<?php endif;
								wp_reset_postdata(); 
								?>
							</div>
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