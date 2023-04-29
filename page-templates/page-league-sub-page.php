<?php
/**
 * Template name: League Sub-page
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

					<?php if( !empty( $fields['table_header']) || !empty($fields['table_shortcode']) ):?>
					<section class="entry-content" itemprop="text">
						<div class="grid-container">
							<div class="grid-x grid-padding-x">
								<div class="cell small-14">
									<?php if( !empty( $fields['table_header']) ):?>
									<div class="header-wrap underlined-h2-wrap">
										<h2 class="h2-underlined underline-yellow">
											<?php echo $fields['table_header'];?>
										</h2>
									</div>
									<?php endif;?>
									<?php if ( !empty($fields['table_shortcode']) ) {
										echo do_shortcode($fields['table_shortcode']);
									}?>
								</div>
							</div>
						</div>
					</section>
					<?php endif;?>
							
					<footer class="article-footer">
					</footer> <!-- end article footer -->
						
				</article><!-- #post-<?php the_ID(); ?> -->
		
			</main><!-- #main -->
				
		</div>
	</div>

<?php
get_footer();