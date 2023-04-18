<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */
$fields = get_fields();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part('template-parts/part', 'page-banner-text-links');?>
	
	<div class="entry-content">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="cell small-14 large-12">
					<?php if( !empty( $fields['overview'] ) ):?>
						<h2 class="underlined">
							Facility Overview
						</h2>
						<div class="overview-copy-wrap heading-font">
							<?php echo $fields['overview'];?>
						</div>
					<?php endif;?>
				</div>
				<?php if( !empty( $fields['rental_rates_rows'] ) ):
					$rental_rates_rows = $fields['rental_rates_rows'];
				?>
				<div class="rates-wrap cell small-14 tablet-7 large-6">
					<h2 class="underline">
						Rental Rates
					</h2>
					<?php if( !empty($rental_rates_rows) ):?>
						<div class="rate-rows">
							<?php foreach( $rental_rates_rows as $rental_rates_row ):
								$heading = $rental_rates_row['heading'];
								$table_rows = $rental_rates_row['table_rows'];
								$copy = $rental_rates_row['copy'];
							?>
								<div class="rate-row">
									<?php if( !empty($heading) ):?>
										<h3 class="blue-color"><?php echo $heading;?></h3>
									<?php endif;?>
									<?php if( !empty($table_rows) ):?>
										<div class="table-rows">
											<table>
												<tbody>
													<?php foreach($table_rows as $table_row):?>
														<tr>
															<td><?php echo $table_row['fee_name'];?></td>
															<td><?php echo $table_row['fee'];?></td>
														</tr>
													<?php endforeach;?>
												</tbody>
											</table>
										</div>
									<?php endif;?>
									<?php if( !empty($copy) ):?>
										<div class="copy-wrap">
											<?php echo $copy;?>
										</div>
									<?php endif;?>
								</div>
							<?php endforeach;?>
						</div>
					<?php endif;?>
				</div>
				<?php endif;?>
				<?php if( !empty( $fields['photos'] ) ):
					$photos = $fields['photos'];	
				?>
				<div class="facility-slider-wrap cell small-14 tablet-7 large-6">
					<h2 class="underline">
						Facility Photos
					</h2>
					<div class="facility-slider overflow-hidden">
						<div class="swiper-wrapper">
							<?php foreach($photos as $image):?>
								<div class="swiper-slide">
									<?php if( !empty( $image ) ) {
										$imgID = $image['ID'];
										$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
										$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
										echo '<div class="img-wrap">';
										echo $img;
										echo '</div>';
									}?>
								</div>
							<?php endforeach;?>
						</div>
						<div class="facility-swiper-button-prev">
							<svg xmlns="http://www.w3.org/2000/svg" width="13.313" height="21.936" viewBox="0 0 13.313 21.936">
							  <path id="Icon_awesome-chevron-left" data-name="Icon awesome-chevron-left" d="M2.286,12.764,12.049,3a1.206,1.206,0,0,1,1.7,0L14.893,4.14a1.206,1.206,0,0,1,0,1.7L7.157,13.616l7.737,7.774a1.205,1.205,0,0,1,0,1.7l-1.139,1.139a1.206,1.206,0,0,1-1.7,0L2.286,14.469A1.206,1.206,0,0,1,2.286,12.764Z" transform="translate(-1.933 -2.648)" fill="#fff"/></svg>
						</div>
						<div class="facility-swiper-button-next">
							<svg xmlns="http://www.w3.org/2000/svg" width="13.313" height="21.936" viewBox="0 0 13.313 21.936">
							  <path id="Icon_awesome-chevron-left" data-name="Icon awesome-chevron-left" d="M.353,10.115,10.116.353a1.206,1.206,0,0,1,1.7,0L12.96,1.492a1.206,1.206,0,0,1,0,1.7L5.224,10.968l7.737,7.774a1.205,1.205,0,0,1,0,1.7L11.82,21.583a1.206,1.206,0,0,1-1.7,0L.353,11.82A1.206,1.206,0,0,1,.353,10.115Z" transform="translate(13.313 21.936) rotate(180)" fill="#fff"/></svg>
						</div>
					</div>
				</div>
				<?php endif;?>
			</div>
		</div>
	</div>

	<footer class="entry-footer">
		<?php seacoast_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
