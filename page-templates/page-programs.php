<?php
/**
 * Template name: Program Page
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
					
					<section class="overview has-sidebar">
						<div class="grid-container">
							<div class="grid-x grid-padding-x align-center">
								<div class="cell small-14 tablet-9 large-7">
				
									<section class="entry-content" itemprop="text">
										<?php if( !empty($fields['overview_heading']) ):?>
										<h2 class="h2-underlined underline-yellow"><?php echo $fields['overview_heading'];?></h2>	
										<?php endif;?>
										<?php if( !empty($fields['overview_copy']) ):?>
											<div class="copy-wrap">
												<?php echo $fields['overview_copy'];?>
											</div>
										<?php endif;?>
									</section>
								
								</div>
								<div class="sidebar cell small-14 tablet-5 large-4 large-offset-1 text-center">
									<?php if( !empty($fields['region_links']) ):
										$region_links = $fields['region_links'];
									?>
									<div class="region-nav card-shadow">
										<h3>Camps By Region</h3>
										<ul class="regions text-center no-bullet">
											<?php foreach($region_links as $region_link):
												$region_link = $region_link['region_link'];
	
												$link = $region_link;
												if( $link ): 
													$link_url = $link['url'];
													$link_title = $link['title'];
													$link_target = $link['target'] ? $link['target'] : '_self';
													?>
												<li>
													<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
												</li>
												<?php endif; ?>
											<?php endforeach;?>
										</ul>
									</div>
									<?php endif;?>
								</div>
							</div>
						</div>
					</section>
					
					<?php if( !empty( $fields['types_heading'] ) || !empty( $fields['types_accordions'] ) ):?>
					<section class="camp-types">
						<div class="grid-container">
							<div class="grid-x grid-padding-x align-center">
								<div class="cell small-14 large-12">
									<h2 class="text-center">
										<?php echo $fields['types_heading'];?>
									</h2>
									<?php if( !empty( $fields['types_accordions'] ) ):
										$types_accordions = $fields['types_accordions'];
									?>
									<ul class="accordion" data-accordion data-allow-all-closed="true">
										<?php $i = 1; foreach($types_accordions as $types_accordion):
											$accordion_title = $types_accordion['accordion_title'];
											$copy = $types_accordion['copy'];
											$button_links = $types_accordion['button_links'];
											$image = $types_accordion['image'];
										?>
										<li class="accordion-item<?php if( $i == 1 ){ echo ' is-active';}?>" data-accordion-item>
											<a class="accordion-title text-gray-color h3" href="#">
												<?php echo $accordion_title;?>
											</a>
											<div class="accordion-content" data-tab-content>
												<div class="grid-x grid-padding-x medium-flex-dir-row-reverse">
													<?php if( !empty( $image ) ) {
														$imgID = $image['ID'];
														$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
														$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
														echo '<div class="img-wrap cell small-14 medium-6 large-6">';
														echo $img;
														echo '</div>';
													}?>
													<?php if( !empty($copy) || !empty(button_links) ):?>
													<div class="cell small-12 medium-8 large-8">
														<?php if( !empty($copy) ):?>
														<div class="copy-wrap">
															<?php echo $copy;?>
														</div>
														<?php endif;?>
														<?php if(!empty( $button_links )):?>
															<div class="button-links grid-x grid-padding-x">
															<?php foreach($button_links as $button_link):
																$button_link = $button_link['button_link'];
																$link = $button_link ;
																if( $link ): 
																	$link_url = $link['url'];
																	$link_title = $link['title'];
																	$link_target = $link['target'] ? $link['target'] : '_self';
																	?>
																<div class="cell shrink">
																	<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
																</div>
																<?php endif; 
															endforeach;?>
															
														<?php endif;?>
													</div>
													<?php endif;?>
												</div>
											</div>
										</li>
										<?php $i++; endforeach;?>
									</ul>	
									<?php endif;?>
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