<?php
/**
 * Template name: Home Page
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
				
					<header class="entry-header home-hero has-object-fit">
						<div class="bg bg-img" style="background-image: url(<?php echo $fields['hero_image']['url'];?>)"></div>
						<div class="bg bg-1"></div>
						<?php if( !empty( $fields['hero_image'] ) ):?>
							<div class="bg bg-img grayscale" style="background-image: url(<?php echo $fields['hero_image']['url'];?>)"></div>
						<?php endif;?>
						<div class="bg mask"></div>
						<div class="bg bg-2"></div>
						<div class="grid-container relative">
							<div class="grid-x grid-padding-x align-center">
								<div class="cell small-14 large-12">
									<h1 class="white-color text-shadow"><span class="underline u-yellow">Seacoast</span><br><span class="underline u-yellow">United</span><br><span class="yellow-color">Soccer Club</span></h1>
								</div>
							</div>
						</div>
					</header>
				
					<section class="news-events has-bg">
						<div class="bg"></div>
						<div class="grid-container relative">
							<div class="grid-x grid-padding-x align-center">
								<?php if( !empty( $fields['news_events_heading'] ) ):?>
								<div class="section-header cell small-14 large-12">
									<h2 class="text-center white-color yellow-bold"><?php echo str_replace(['<p>', '</p>'], '',$fields['news_events_heading']);?></h2>
								</div>
								<?php endif;?>
							</div>
							<div class="grid-x grid-padding-x align-left">
								<div class="cell small-12 large-offset-1">
									<?php if( !empty( $fields['news_events'] ) ): 
										$news_events =  $fields['news_events']; ?>
										<div class="news-events-slider-wrap relative">
											<div class="news-events-slider overflow-hidden">
												<div class="swiper-wrapper">
												<?php foreach($news_events as $news_event):
													$page =  $news_event['page'];
													$image =  $news_event['image'];	
													$title =  $news_event['title'];	
													$info =  $news_event['info'];	
												?>
													<div class="swiper-slide card-shadow grid-x flex-dir-column dark-blue-bg h-auto">
														<?php if( !empty( $image ) ) {
															$imgID = $image['ID'];
															$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
															$img = wp_get_attachment_image( $imgID, 'event-thumb', false, [ "class" => "", "alt"=>$img_alt] );
															echo '<div class="img-wrap">';
															echo $img;
															echo '</div>';
														}?>
														<div class="bottom grid-x flex-dir-column flex-child-auto align-justify">
															<div>
																<?php if( !empty($title) ):?>
																	<h3 class="white-color"><?php echo $title;?></h3>
																<?php endif;?>
																<?php if( !empty($info) ):?>
																	<p><?php echo $info;?></p>
																<?php endif;?>
															</div>
															<?php if( !empty($page) ):?>
															<div>
																<a class="button" href="<?php echo $page;?>">Learn More</a>
															</div>
															<?php endif;?>
														</div>
													</div>
												<?php endforeach;?>
												</div>
											</div>
											<div class="ne-swiper-button-prev">
												<?php get_template_part('template-parts/icon', 'slide-prev');?>
											</div>
											<div class="ne-swiper-button-next">
												<?php get_template_part('template-parts/icon', 'slide-next');?>
											</div>
										</div>
									<?php endif;?>
								</div>
							</div>
						</div>
					</section>
					
					<section class="our-clubs has-bg">
						<div class="bg heading-blue-bg"></div>
						<div class="accent-wrap overflow-hidden">
							<svg xmlns="http://www.w3.org/2000/svg" width="262.92" height="124.92" viewBox="-0.14 -0.04 262.91 124.96"><g transform="translate(-14.088 -1327.1)" data-name="Group 324"><g transform="translate(-396 862)" data-name="Group 307"><path transform="translate(-10280 2974.1) rotate(-45)" d="m9361.7 5889.5-60.949-19.2 12.951-12.952 35.958 12.15-12.576-35.532 12.621-12.621 19.955 60.191z" fill="#d7e352" data-name="Path 333"></path><g transform="translate(-10283 3002.1) rotate(-45)" fill="none" data-name="Path 333"><path d="m9361.7 5889.5-60.949-19.2 12.951-12.952 35.958 12.15-12.576-35.532 12.621-12.621 19.955 60.191z"></path><path d="m9361.4 5888.4 7.0947-7.0962-19.251-58.067-11.028 11.029 13.052 36.876-37.318-12.61-11.347 11.347 58.798 18.521m0.27832 1.1362-60.949-19.199 12.951-12.952 35.958 12.15-12.576-35.532 12.621-12.621 19.955 60.191-7.96 7.9614z" fill="#d7e352"></path></g><path transform="translate(-10325 2974.1) rotate(-45)" d="m9326 5879.5" fill="none" stroke="#d7e352" stroke-width="20" data-name="Path 336"></path></g><g transform="translate(-315 862)" data-name="Group 309"><path transform="translate(-10280 2974.1) rotate(-45)" d="m9361.7 5889.5-60.949-19.2 12.951-12.952 35.958 12.15-12.576-35.532 12.621-12.621 19.955 60.191z" fill="#d7e352" data-name="Path 333"></path><g transform="translate(-10283 3002.1) rotate(-45)" fill="none" data-name="Path 333"><path d="m9361.7 5889.5-60.949-19.2 12.951-12.952 35.958 12.15-12.576-35.532 12.621-12.621 19.955 60.191z"></path><path d="m9361.4 5888.4 7.0947-7.0962-19.251-58.067-11.028 11.029 13.052 36.876-37.318-12.61-11.347 11.347 58.798 18.521m0.27832 1.1362-60.949-19.199 12.951-12.952 35.958 12.15-12.576-35.532 12.621-12.621 19.955 60.191-7.96 7.9614z" fill="#d7e352"></path></g><path transform="translate(-10325 2974.1) rotate(-45)" d="m9326 5879.5" fill="none" stroke="#d7e352" stroke-width="20" data-name="Path 336"></path></g><g transform="translate(-233 862)" data-name="Group 310"><path transform="translate(-10280 2974.1) rotate(-45)" d="m9361.7 5889.5-60.949-19.2 12.951-12.952 35.958 12.15-12.576-35.532 12.621-12.621 19.955 60.191z" fill="#d7e352" data-name="Path 333"></path><g transform="translate(-10283 3002.1) rotate(-45)" fill="none" data-name="Path 333"><path d="m9361.7 5889.5-60.949-19.2 12.951-12.952 35.958 12.15-12.576-35.532 12.621-12.621 19.955 60.191z"></path><path d="m9361.4 5888.4 7.0947-7.0962-19.251-58.067-11.028 11.029 13.052 36.876-37.318-12.61-11.347 11.347 58.798 18.521m0.27832 1.1362-60.949-19.199 12.951-12.952 35.958 12.15-12.576-35.532 12.621-12.621 19.955 60.191-7.96 7.9614z" fill="#d7e352"></path></g><path transform="translate(-10325 2974.1) rotate(-45)" d="m9326 5879.5" fill="none" stroke="#d7e352" stroke-width="20" data-name="Path 336"></path></g></g></svg>

						</div>
						<div class="grid-container relative">
							<div class="grid-x grid-padding-x">
								<div class="left cell small-14 medium-10 medium-offset-2 tablet-7 tablet-offset-0 large-10">
									<?php if( !empty($fields['our_clubs_large_heading']) || !empty($fields['our_clubs_small_heading']) ) {
										get_template_part('template-parts/part', 'big-small-header', 
											array(
												'big' => $fields['our_clubs_large_heading'],
												'small' => $fields['our_clubs_small_heading'],
												'color' => 'white',
											),
										);
									};?>
									<?php if( !empty( $fields['region_cards'] ) ):
										$region_cards = $fields['region_cards'];
									?>
									<div class="region-cards grid-x grid-padding-x grid-12 small-up-2 tablet-up-2 large-up-4" data-equalizer data-equalize-on="small">
										<?php foreach( $region_cards as $region_card ):
											$logo = $region_card['logo'];
											$clubs = $region_card['clubs'];
											$border_color = $region_card['bottom_border_color'];

										?>
											<div class="region-card cell">
												<div class="inner white-bg h-100 grid-x align-center card-shadow">
													<?php if( !empty( $logo ) ) {
														$imgID = $logo['ID'];
														$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
														$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
														echo '<div class="logo-wrap text-center grid-x align-center align-middle" data-equalizer-watch>';
														echo $img;
														echo '</div>';
													}?>
													<?php if( !empty($clubs) ):?>
													<ul class="club-list menu align-bottom" style="border-bottom: 8px solid <?php echo $border_color;?>">
														<?php foreach( $clubs as $club ):
															$permalink = get_permalink( $club->ID );
															$name = get_field('name_for_home_page_region_card', $club->ID);
														?>
															
														<li>
															<a class="text-gray-color" href="<?php echo $permalink;?>">
																<div class="grid-x grid-padding-x">
																	<div class="cell auto">
																		<?php echo $name;?>
																	</div>
																	<div class="cell shrink">
																		<svg xmlns="http://www.w3.org/2000/svg" width="28" viewBox="0 0 512 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M504 256C504 119 393 8 256 8S8 119 8 256s111 248 248 248 248-111 248-248zm-448 0c0-110.5 89.5-200 200-200s200 89.5 200 200-89.5 200-200 200S56 366.5 56 256zm72 20v-40c0-6.6 5.4-12 12-12h116v-67c0-10.7 12.9-16 20.5-8.5l99 99c4.7 4.7 4.7 12.3 0 17l-99 99c-7.6 7.6-20.5 2.2-20.5-8.5v-67H140c-6.6 0-12-5.4-12-12z" fill="#D7E352"/></svg>
																	</div>
																</div>
															</a>
														</li>
															
														<?php endforeach;?>
													</ul>
													<?php endif;?>
												</div>
											</div>
											
										<?php endforeach;?>
									</div>
									<?php endif;?>
									
									<?php if( !empty( $fields['our_clubs_logos'] ) ):
										$our_clubs_logos = $fields['our_clubs_logos'];
									?>
									<div class="grid-x grid-padding-x align-center">
										<div class="cell small-12 tablet-10">
											<div class="club-logos grid-x grid-padding-x grid-12 small-up-2 tablet-up-3 large-up-4 align-middle">
												<?php foreach( $our_clubs_logos as $logo ):?>
													<?php if( !empty( $logo ) ) {
														$imgID = $logo['ID'];
														$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
														$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
														echo '<div class="clubs-logo cell text-center">';
														echo $img;
														echo '</div>';
													}?>
													
												<?php endforeach;?>
											</div>
										</div>
									</div>
									<?php endif;?>
									
								</div>
								<div class="left cell show-for-tablet tablet-7 large-4">
									<?php if( !empty( $fields['our_clubs_map_image'] ) ) {
										$imgID = $fields['our_clubs_map_image']['ID'];
										$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
										$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
										echo '<div class="img-wrap">';
										echo $img;
										echo '</div>';
									}?>
								</div>
							</div>
						</div>
					</section>
					
					<section class="about gradient-ld">
						<div class="grid-container relative">
							<div class="grid-x grid-padding-x align-center">
								<div class="cell small-14 large-12 x-large-8">
									<?php if( !empty($fields['about_large_heading']) || !empty($fields['about_small_heading']) ) {
										get_template_part('template-parts/part', 'big-small-header', 
											array(
												'big' => $fields['about_large_heading'],
												'small' => $fields['about_small_heading'],
												'color' => 'white',
											),
										);
									};?>
									<?php if( !empty($fields['about_top_copy_section']) ):?>
										<div class="about-top-copy text-center white-color">
											<?php echo $fields['about_top_copy_section'];?>
										</div>
									<?php endif;?>
								</div>
								<div class="cell small-14 large-12 medium-10 medium-offset-1 x-large-8">
									<?php if( !empty($fields['about_facts_figures']) ):
										$about_facts_figures = $fields['about_facts_figures'];
									?>
										<div class="about-facts-figures aff-slider hide-for-tablet">
											<div class="swiper-wrapper">
												<?php foreach( $about_facts_figures as $about_facts_figure ):
													$figure = $about_facts_figure['figure'];
													$unit = $about_facts_figure['unit'];
													$text = $about_facts_figure['text'];
												?>
													<div class="swiper-slide ff-card text-center">
														<div class="dark-blue-bg">
															<div class="inner">
																<p class="yellow-color heading-font uppercase">
																	<b><?php echo $figure;?></b>
																</p>
																<p class="unit heading-font uppercase">
																	<b><?php echo $unit;?></b>
																</p>
																<p>
																	<?php echo $text;?>
																</p>
															</div>
														</div>
													</div>
												<?php endforeach;?>
											</div>
										</div>
								</div>
								<div class="cell small-14 large-12 x-large-8">
										<div class="about-facts-figures grid-x grid-padding-x small-up-1 medium-up-2 tablet-up-3 show-for-tablet">
											<?php foreach( $about_facts_figures as $about_facts_figure ):
												$figure = $about_facts_figure['figure'];
												$unit = $about_facts_figure['unit'];
												$text = $about_facts_figure['text'];
											?>
												<div class="cell ff-card text-center">
													<div class="dark-blue-bg">
														<div class="inner">
															<p class="yellow-color heading-font uppercase">
																<b><?php echo $figure;?></b>
															</p>
															<p class="unit heading-font uppercase">
																<b><?php echo $unit;?></b>
															</p>
															<p>
																<?php echo $text;?>
															</p>
														</div>
													</div>
												</div>
											<?php endforeach;?>
										</div>
									<?php endif;?>
									<?php if( !empty($fields['about_bottom_copy_section']) ):?>
										<div class="about-top-copy text-center white-color">
											<?php echo $fields['about_bottom_copy_section'];?>
										</div>
									<?php endif;?>
								</div>
							</div>
						</div>
					</section>
					
					<section class="pathways">
						<div class="grid-container relative">
							<div class="grid-x grid-padding-x align-center">
								<div class="cell small-14 large-12">
									<?php if( !empty($fields['pathways_large_heading']) || !empty($fields['pathways_small_heading']) ) {
										get_template_part('template-parts/part', 'big-small-header', 
											array(
												'big' => $fields['pathways_large_heading'],
												'small' => $fields['pathways_small_heading'],
												'color' => '',
											),
										);
									};?>
									<?php if( !empty( $fields['pathways_graphic'] ) ) {
										$imgID = $fields['pathways_graphic']['ID'];
										$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
										$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
										echo '<div class="img-wrap">';
										echo $img;
										echo '</div>';
									}?>
								</div>
							</div>
						</div>
					</section>
					
					<?php get_template_part('template-parts/content', 'instagram-feed');?>
					
					<section class="alumni has-object-fit">
						<div class="banner-gradient-wrap relative">
							<div class="bg bg-1"></div>
							<?php if( !empty( $fields['alumni_background_image'] ) ) {
								$imgID = $fields['alumni_background_image']['ID'];
								$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
								$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "object-fit of-cover grayscale", "alt"=>$img_alt] );
								echo $img;
							}?>							
							<div class="bg mask"></div>
							<div class="bg bg-2"></div>
							
							<div class="grid-container relative">
								<div class="grid-x grid-padding-x align-center">
									<div class="cell small-14 large-12 xxlarge-10">
										<?php if( !empty($fields['alumni_large_heading']) || !empty($fields['alumni_small_heading']) ) {
											get_template_part('template-parts/part', 'big-small-header', 
												array(
													'big' => $fields['alumni_large_heading'],
													'small' => $fields['alumni_small_heading'],
													'color' => 'white',
												),
											);
										};?>
										
										<?php if( !empty( $fields['alumni_player_cards'] ) ):
											$alumni_player_cards = $fields['alumni_player_cards'];
										?>
	
										<div class="alumni-slider">
											<div class="swiper-wrapper">
												<?php 
												$i = 0; // Initialize a counter variable
												foreach( $alumni_player_cards as $alumni_player_card ):
													$logo = $alumni_player_card['logo'];
													$player_name = $alumni_player_card['player_name'];
													
													$i++;
													
													if ($i % 3 == 1) {
														echo '<div class="swiper-slide">';
													}
												?>
													<div class="grid-x grid-padding-x">
														<div class="cell small-12">
															<div class="inner white-bg">
																<div class="grid-x grid-margin-x">
																	<?php if( !empty( $logo ) ) {
																		$imgID = $logo['ID'];
																		$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
																		$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
																		echo '<div class="logo-wrap cell small-14 medium-5">';
																		echo $img;
																		echo '</div>';
																	}?>
																	<?php if( !empty($player_name) ):?>
																		<div class="cell small-14 medium-9">
																			<h6><?php echo $player_name;?></h6>
																		</div>
																	<?php endif;?>
																</div>
															</div>
														</div>
													</div>
												<?php
													if ($i % 3 == 0) {
														echo '</div>';
													}
												endforeach;?>
												</div>
											</div>
											<div class="alumni-swiper-button-prev">
												<?php get_template_part('template-parts/icon', 'slide-prev');?>
											</div>
											<div class="alumni-swiper-button-next">
												<?php get_template_part('template-parts/icon', 'slide-next');?>
											</div>
										</div>
										<?php endif;?>
									</div>
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