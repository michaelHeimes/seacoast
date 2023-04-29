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
									<h2 class="h2-underlined underline-yellow white-color relative">Upcoming Tournaments</h2>
								</div>
							</div>
								<?php			
								$args = array(  
									'post_type' => 'tournament',
									'post_status' => 'publish',
									'posts_per_page' => -1,
								);
								
								$loop = new WP_Query( $args ); 
								
								if ( $loop->have_posts() ) : ?>
									
							<div class="grid grid-x grid-padding-x small-up-1 medium-up-2 tablet-up-3 large-up-4">

								<?php	
								while ( $loop->have_posts() ) : $loop->the_post();
								
									get_template_part('template-parts/loop', 'tournament-card');	
								
								endwhile;?>
									
							</div>
								<?php	
								else:?>
							<div class="grid-x grid-padding-x">
								
									<h2 class="cell small-14 text-center">There are no Tournaments at this time.<br>Check back soon.</h2>
							</div>
								<?php endif;
								wp_reset_postdata(); 
								?>
						</div>
					</section>

							
					<footer class="article-footer hide-for-medium">
						<div class="grid-container">
							<div class="grid-x grid-padding-x">
								<div class="text-center cell small-14">
									<a class="button ajax-load-more" href="#">Show More</a>
								</div>
								<div class="text-center cell small-14">
									<a class="button light-blue" href="#top" data-smooth-scroll>
										Top Of Page
									</a>
								</div>
							</div>
						</div>
					</footer> <!-- end article footer -->
						
				</article><!-- #post-<?php the_ID(); ?> -->
		
			</main><!-- #main -->
				
		</div>
	</div>

<?php
get_footer();