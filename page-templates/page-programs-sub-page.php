<?php
/**
 * Template name: Program Sub-page
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
					
					<div class="entry-content has-sidebar">
						<div class="grid-container">
							<div class="grid-x grid-padding-x align-center">
								<div class="cell small-14 tablet-9 large-7">
									<?php if( !empty($fields['copy_heading']) ):?>
									<h2 class="h2-underlined underline-yellow"><?php echo $fields['copy_heading'];?></h2>	
									<?php endif;?>
									<?php if( !empty($fields['copy']) ):?>
										<div class="copy-wrap">
											<?php echo $fields['copy'];?>
										</div>
									<?php endif;?>
									<?php if( !empty( $fields['button_links'] ) ):
										$button_links = $fields['button_links'];
									?>
										<div class="button-links grid-x grid-padding-x">
											<?php foreach($button_links as $button_link):
												$link = $button_link['button_link'];
											?>
												<?php 
												if( $link ): 
													$link_url = $link['url'];
													$link_title = $link['title'];
													$link_target = $link['target'] ? $link['target'] : '_self';
													?>
												<div class="cell shrink">
													<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
												</div>
												<?php endif; ?>
											<?php endforeach;?>
										</div>
									<?php endif;?>
								</div>
								<div class="sidebar cell small-14 tablet-5 large-4 large-offset-1">
									<?php if( !empty( $fields['contact_rows'] ) ):
										$contact_rows = $fields['contact_rows'];
									?>
										<div class="contact-card card-shadow">
											<?php foreach($contact_rows as $contact_row):
												$heading = 	$contact_row['heading'];
												$name = $contact_row['name'];
												$phone_number =	$contact_row['phone_number'];
												$email = $contact_row['email'];
											?>
											<div class="card-row">
												<?php if( !empty($heading ) ):?>
												<h3><?php echo $heading;?></h3>
												<?php endif;?>
												<?php if( !empty($name) || !empty($phone_number) || !empty($email) ):?>
												<ul class="no-bullet">
													<?php if( !empty($name) ):?>
													<li><?php echo $name;?></li>
													<?php endif;?>
													<?php if( !empty($phone_number) ):?>
													<li>Phone: <a class="text-gray-color" href="tel:<?php echo $phone_number;?>">
														<?php echo $phone_number;?></a>
													</li>
													<?php endif;?>
													<?php if( !empty($email) ):?>
													<li>Phone: <a class="text-gray-color" href="mailto:<?php echo $email;?>">
														<?php echo $email;?></a>
													</li>
													<?php endif;?>
												</ul>
												<?php endif;?>
											</div>
											<?php endforeach;?>
										</div>
									<?php endif;?>
								</div>
							</div>
						</div>
					</div>
					
					<section class="camps-table">
						<div class="grid-container">
							<div class="grid-x grid-padding-x align-center">
								<div class="cell small-14">
									<?php if( !empty( $fields['table_heading']) ):?>
										<h2 class="h3 text-center underline">
											<?php echo $fields['table_heading'];?>
										</h2>
									<?php endif;?>
									<?php if ( !empty($fields['table_shortcode']) ) {
										echo do_shortcode($fields['table_shortcode']);
									}?>
								</div>
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