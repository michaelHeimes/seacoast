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
				<div class="cell small-14 tablet-9 large-7">
					<?php if( !empty( $fields['overview_copy'] ) ):?>
						<h2 class="h2-underlined underline-yellow">
							Tournament Overview
						</h2>
						<div class="overview-copy-wrap heading-font">
							<?php echo $fields['overview_copy'];?>
						</div>
					<?php endif;?>
					
					<?php if( !empty($fields['general_information_copy']) || !empty($fields['rules_copy']) || !empty($fields['housing_information_copy']) || !empty($fields['f_info_copy']) || !empty($fields['contact_copy']) ):?>
						<ul class="accordion" data-accordion data-allow-all-closed="true">
							
							<?php if( !empty($fields['general_information_copy']) ):?>
								<li class="accordion-item is-active" data-accordion-item>
									<a class="accordion-title text-gray-color h3" href="#">General Information</a>
									<div class="accordion-content" data-tab-content>
										<?php echo $fields['general_information_copy'];?>
									</div>
								</li>
							<?php endif;?>
							
							<?php if( !empty($fields['rules_copy']) ):?>
								<li class="accordion-item" data-accordion-item>
									<a class="accordion-title text-gray-color h3" href="#">Rules</a>
									<div class="accordion-content" data-tab-content>
										<?php echo $fields['rules_copy'];?>
									</div>
								</li>
							<?php endif;?>
							
							<?php if( !empty($fields['housing_information_copy']) ):?>
								<li class="accordion-item" data-accordion-item>
									<a class="accordion-title text-gray-color h3" href="#">Housing Information</a>
									<div class="accordion-content" data-tab-content>
										<?php echo $fields['housing_information_copy'];?>
									</div>
								</li>
							<?php endif;?>
							
							<?php if( !empty($fields['f_info_copy']) ):?>
								<li class="accordion-item" data-accordion-item>
									<a class="accordion-title text-gray-color h3" href="#">Field Info</a>
									<div class="accordion-content" data-tab-content>
										<?php echo $fields['f_info_copy'];?>
									</div>
								</li>
							<?php endif;?>
							
							<?php if( !empty($fields['schedule_scores_copy']) ):?>
								<li class="accordion-item" data-accordion-item>
									<a class="accordion-title text-gray-color h3" href="#">Schedule & Scores</a>
									<div class="accordion-content" data-tab-content>
										<?php echo $fields['schedule_scores_copy'];?>
									</div>
								</li>
							<?php endif;?>
							
							<?php if( !empty($fields['contact_copy']) ):?>
								<li class="accordion-item" data-accordion-item>
									<a class="accordion-title text-gray-color h3" href="#">General Information</a>
									<div class="accordion-content" data-tab-content>
										<?php echo $fields['contact_copy'];?>
									</div>
								</li>
							<?php endif;?>
		
						</ul>
						
					<?php endif;?>
					
				</div>
				<div class="cell small-14 tablet-5 large-4 large-offset-1">
					<?php if( !empty( $fields['fee_types'] ) ):
						$fee_types = $fields['fee_types'];
					?>
					<div class="fee-types card-shadow">
						<h3>Registration Fees</h3>
						<?php foreach( $fee_types as $fee_type ):
							$type_and_dates = $fee_type['type_and_dates'];
							$table_rows = $fee_type['table_rows'];
						?>
						<div class="fee-type">
							<?php if( !empty($type_and_dates) ):?>
								<p class="heading-font heading-blue-color"><?php echo $type_and_dates;?></p>
							<?php endif;?>
							
							<?php if( !empty($table_rows) ):?>
							<table>
								<thead>
								<tr class="heading-font">
									<th>Age Group</th>
									<th>Format</th>
									<th>Fee</th>
								</tr>
								</thead>
								<tbody>
									
									<?php foreach( $table_rows as $table_row ):?>
									<tr>									
										<td><?php echo $table_row['age_group'];?></td>
										<td><?php echo $table_row['format'];?></td>
										<td><?php echo $table_row['fee'];?></td>
									</tr>
									<?php endforeach;?>
									
								</tbody>
							</table>
							<?php endif;?>
							
						</div>
						<?php endforeach;?>
						
						<?php 
						$link = $fields['fees_button_link'];
						if( $link ): 
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
							?>
						<div class="btn-wrap">
							<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						</div>
						<?php endif; ?>
						
					</div>						
					<?php endif?>
				</div>
			</div>
		</div>
	</div>

	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
