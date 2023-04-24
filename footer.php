<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trailhead
 */

?>
				<?php if( !empty( get_field('partners_heading', 'option') ) || !empty( get_field('partners', 'option') ) ):?>
				<div class="partners heading-blue-bg has-bg">
					<?php if( is_page_template('page-templates/page-home.php') ):?>
						<div class="bg"></div>
					<?php endif;?>

					<div class="grid-container relative">
						<div class="grid-x grid-padding-x align-center">
							<div class="cell small-14 large-12">
								
								<?php if( !empty( get_field('partners_heading', 'option') ) ):?>
								<h2 class="h2-underlined underline-yellow white-color"><?php the_field('partners_heading', 'option');?></h2>
								<?php endif;?>
								
								<?php if( !empty( get_field('partners', 'option') ) ):
									$partners = get_field('partners', 'option');	
								?>
									<div class="grid-x grid-padding-x align-center">
										<?php foreach($partners as $partner):
											$url = $partner['url'];
											$logo = $partner['logo'];
										?>
											<div class="cell shrink">
												<?php if( !empty($url) ):?>
												<a href="<?php echo esc_attr($url);?>" target="_blank">
												<?php endif;?>
												<?php if( !empty( $logo ) ) {
													$imgID = $logo['ID'];
													$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
													$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
													echo '<div class="img-wrap">';
													echo $img;
													echo '</div>';
												}?>
												<?php if( !empty($url) ):?>
												</a>
												<?php endif;?>
											</div>
										<?php endforeach;?>
									</div>
								<?php endif;?>
								
							</div>
						</div>
					</div>
				</div>
				<?php endif;?>

				<footer id="colophon" class="site-footer dark-blue-bg">
					<div class="grid-container fluid">
						<div class="grid-x grid-padding-x">
							<div class="cell small-14 medium-auto">
								<?php seacoast_footer_links();?>
								
								<?php if(wp_get_nav_menu_items(get_nav_menu_locations()['social-links'])): ?>
									<div class="social-link-wrap grid-x grid-padding-x align-middle font-weight-light">
										<div class="cell shrink heading-font light">
											Socials:
										</div>
										<div class="cell shrink">
											<?php seacoast_social_links();?>
										</div>
									</div>
								<?php endif;?>

								<?php 
								$link = get_field('subscribe_button_link', 'option');
								if( $link ): 
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
									?>
									<a class="button light-blue" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
								<?php endif; ?>
								
							</div>
							<div class="cell small-14 medium-shrink text-center">
								
								<?php if( !empty( get_field('three_step_url', 'option') ) ):
									$three_step_url = get_field('three_step_url', 'option');
								?>
								<a class="white-color" href="<?php echo esc_attr( $three_step_url );?>" target="_blank">
								<?php endif;?>
								<?php
									$image = get_field('footer_logo', 'option');
									if( !empty( $image ) ): ?>
									<div class="logo-wrap">
										<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									</div>
								<?php endif; ?>
								<?php if( !empty( get_field('logo_text', 'option') ) ):
									
								?>
									<div class="heading-font font-weight-light"><?php the_field('logo_text', 'option');?></div>	
								<?php endif;?>	
								<?php if( !empty( get_field('three_step_url', 'option') ) ):
									$three_step_url = get_field('three_step_url', 'option');
								?>
								</a>
								<?php endif;?>

							</div>
							<div class="copyright cell small-14 text-center heading-font font-weight-light">
								<small>Copyright &copy; <?php echo date("Y");?>, <?php the_field('copyright_text', 'option');?></small>
							</div>
						</div>
					</div>
				</footer><!-- #colophon -->
					
			</div><!-- #page -->
			
		</div>  <!-- end .off-canvas-content -->
							
	</div> <!-- end .off-canvas-wrapper -->
					
<?php wp_footer(); ?>

</body>
</html>
