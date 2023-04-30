<?php
/**
 * Template name: Facilities Page
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
				
					<?php get_template_part('template-parts/part', 'page-banner-text-links');?>
					
					<?php if( !empty($fields['image_and_copy']) ) {
						echo '<div class="relative"><div class="bg gradient-dl"></div>';
						get_template_part('template-parts/content', 'image-and-copy', 
							array(
								'image_and_copy' => $fields['image_and_copy'],
							)
						);	
						echo '</div>';
					}?>
					
					<?php			
					$args = array(  
						'post_type' => 'facility',
						'post_status' => 'publish',
						'posts_per_page' => -1,
					);
					
					$loop = new WP_Query( $args ); 
					
					if ( $loop->have_posts() ) :?>
					<div class="facilities">
						<div class="grid-container">
							<div class="grid-x grid-padding-x">
								<div class="cell small-14 underlined-h2-wrap">
									<h2 class="h2-underlined underline-yellow">Facilities</h2>
								</div>
							</div>
							<div class="grid-x grid-padding-x small-up-1 medium-up-2 tablet-up-3">
								
							<?php
							while ( $loop->have_posts() ) : $loop->the_post();?>
							
							<article id="post-<?php the_ID(); ?>" <?php post_class('cell'); ?>>
								<a class="inner grid-x flex-dir-column white-bg card-shadow align-center text-center" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
									<?php if( !empty( get_field('banner_image') ) ) {
										$imgID = get_field('banner_image')['ID'];
										$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
										$img = wp_get_attachment_image( $imgID, 'facility-thumb', false, [ "class" => "", "alt"=>$img_alt] );
										echo '<div class="img-wrap">';
										echo $img;
										echo '</div>';
									}?>
									<?php if( !empty(get_field('archive_card_location')) ):?>
										<div>
											<h3 class="text-center"><?php the_field('archive_card_location');?></h3>
										</div>
									<?php endif;?>
								</a>
							</article>
								
							<?php
							endwhile;?>

							</div>
						</div>
					</div>
					<?php
					endif;
					wp_reset_postdata(); 
					?>
								
					<footer class="article-footer">
						<?php wp_link_pages(); ?>
					</footer> <!-- end article footer -->
						
				</article><!-- #post-<?php the_ID(); ?> -->
		
			</main><!-- #main -->
				
		</div>
	</div>

<?php
get_footer();