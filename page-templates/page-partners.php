<?php
/**
 * Template name: Partners Page
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
	
					<section class="entry-content has-sidebar">
						<div class="grid-container">
							<div class="grid-x grid-padding-x align-center">
								<div class="cell small-14">
									<?php if( !empty($fields['copy_heading']) ):?>
									<div class="underlined-h2-wrap">
										<h2 class="underline h2-underlined"><?php echo $fields['copy_heading'];?></h2>	
									</div>
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
							</div>
						</div>
					</section>
					
					<?php if( !empty($fields['partner_rows']) ):
						$partner_rows = $fields['partner_rows'];
					?>
					<section class="partner-rows">
						<div class="grid-container">
							<?php foreach( $partner_rows as $partner_row ):
								$heading = 	$partner_row['row_heading'];
								$partners =	$partner_row['partners'];
							?>
								<div class="partner-row grid-x grid-padding-x">
									<div class="cell small-14">
										<?php if( !empty($heading) ):?>
										<div class="grid-x grid-padding-x">
											<div class="cell small-14">
												<h3><?php echo $heading;?></h3>
											</div>
										</div>
										<?php endif;?>
										<?php if( !empty($partners) ):?>
										<div class="grid-x grid-padding-x small-up-2 medium-up-3 tablet-up-4 large-up-5">
											<?php foreach($partners as $partner):
												$url = $partner['url'];
												$partner_name = $partner['partner_name'];
												$logo = $partner['logo'];
											?>
											<div class="cell single-partner grid-x align-center align-middle">
												<?php if(!empty($url)):?>
												<a href="<?php echo esc_attr($url);?>" target="_blank">
												<?php endif;?>
												<?php if( !empty( $logo ) ) {
													$imgID = $logo['ID'];
													$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
													$img = wp_get_attachment_image( $imgID, 'medium', false, [ "class" => "", "alt"=>$img_alt] );
													echo '<div class="img-wrap text-center">';
													echo $img;
													echo '</div>';
												}?>
												<?php if( !empty($partner_name) ):?>
													<h4 class="show-for-sr">
														<?php echo $partner_name;?>
													</h4>
												<?php endif;?>
												<?php if(!empty($url)):?>
												</a>
												<?php endif;?>
											</div>
											<?php endforeach;?>
										</div>
										<?php endif;?>
									</div>
								</div>
							<?php endforeach;?>
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