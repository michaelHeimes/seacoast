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
						<?php if( !empty( $fields['hero_image'] ) ) {
							$imgID = $fields['hero_image']['ID'];
							$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
							$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "object-fit of-cover", "alt"=>$img_alt] );
							echo $img;
						}?>
						<div class="grid-container relative">
							<div class="grid-x grid-padding-x align-center">
								<div class="cell small-14 large-12">
									<h1><span class="underline u-yellow">Seacoast</span><br><span class="underline u-yellow">United</span><br><span class="yellow-color">Soccer Club</span></h1>
								</div>
							</div>
						</div>
					</header>
				
					<section class="news-events">
						<div class="grid-container relative">
							<div class="grid-x grid-padding-x align-center">
								<?php if( !empty( $fields['news_events_heading'] ) ):?>
								<div class="section-header cell small-14 large-12">
									<h2 class="text-center"><?php echo strip_tags($fields['news_events_heading']);?></h2>
								</div>
								<?php endif;?>
							</div>
							<?php if( !empty( $fields['news_events'] ) ): 
								$news_events =  $fields['news_events']; ?>
								<div class="news-events-slider">
									<div class="swiper-wrapper">
									<?php foreach($news_events as $news_event):
										$page =  $news_event['page'];
										$image =  $news_event['image'];	
										$title =  $news_event['title'];	
										$info =  $news_event['info'];	
									?>
										<div class="swiper-slide grid-x flex-dir-column dark-blue-bg h-auto">
											<?php if( !empty( $image ) ) {
												$imgID = $image['ID'];
												$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
												$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
												echo '<div class="img-wrap">';
												echo $img;
												echo '</div>';
											}?>
											<div class="bottom grid-x flex-dir-column flex-child-auto align-justify">
												<div>
													<?php if( !empty($title) ):?>
														<h3><?php echo $title;?></h3>
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
									<div class="ne-swiper-button-prev">
										<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"><g id="Group_362" data-name="Group 362" transform="translate(-52 -845)"><circle id="Ellipse_12" data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(52 845)" fill="#d7e352"/><path id="Icon_awesome-chevron-left" data-name="Icon awesome-chevron-left" d="M2.223,10.948l8.011-8.011a.989.989,0,0,1,1.4,0l.934.934a.989.989,0,0,1,0,1.4L6.22,11.648l6.349,6.379a.989.989,0,0,1,0,1.4l-.934.934a.989.989,0,0,1-1.4,0L2.223,12.347A.989.989,0,0,1,2.223,10.948Z" transform="translate(61.067 851.352)" fill="#1a293c"/></g></svg>
									</div>
									<div class="ne-swiper-button-next">
										<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"><g id="Group_362" data-name="Group 362" transform="translate(88 881) rotate(180)"><circle id="Ellipse_12" data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(52 845)" fill="#d7e352"/><path id="Icon_awesome-chevron-left" data-name="Icon awesome-chevron-left" d="M2.223,10.948l8.011-8.011a.989.989,0,0,1,1.4,0l.934.934a.989.989,0,0,1,0,1.4L6.22,11.648l6.349,6.379a.989.989,0,0,1,0,1.4l-.934.934a.989.989,0,0,1-1.4,0L2.223,12.347A.989.989,0,0,1,2.223,10.948Z" transform="translate(61.067 851.352)" fill="#1a293c"/></g></svg>
									</div>
								</div>
							<?php endif;?>
						</div>
					</section>
					
					<section class="our-clubs dark-blue-bg">
						<div class="grid-container relative">
							<div class="grid-x grid-padding-x">
								<div class="left cell small-14 tablet-7 large-10">
									<div class="section-header big-small-wrap text-center">
										<?php if( !empty( $fields['our_clubs_large_heading'] ) ):?>
										<h2 class="large-heading"><?php echo $fields['our_clubs_large_heading'];?></h2>
										<?php endif;?>
										<?php if( !empty( $fields['our_clubs_small_heading'] ) ):?>
										<h3 class="small-heading"><?php echo $fields['our_clubs_small_heading'];?></h3>
										<?php endif;?>
									</div>
									<?php if( !empty( $fields['region_cards'] ) ):
										$region_cards = $fields['region_cards'];
									?>
									<div class="region-cards grid-x grid-padding-x grid-12 small-up-2 tablet-up-3 large-up-4">
										<?php foreach( $region_cards as $region_card ):
											$logo = $region_card['logo'];
											$clubs = $region_card['clubs'];
											$border_color = $region_card['bottom_border_color'];

										?>
											<div class="region-card cell">
												<?php if( !empty($clubs) ):?>
												<ul class="club-list menu">
													<?php foreach( $clubs as $club ):
														$permalink = get_permalink( $club->ID );
														$name = get_field('name_for_home_page_region_card', $club->ID);
													?>
														
													<li>
														<a class="text-gray-color white-bg" href="<?php echo $permalink;?>" style="border-bottom: 8px solid <?php echo $border_color;?>">
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
											
										<?php endforeach;?>
									</div>
									<?php endif;?>
									
									<?php if( !empty( $fields['our_clubs_logos'] ) ):
										$our_clubs_logos = $fields['our_clubs_logos'];
									?>
									<div class="grid-x grid-padding-x align-center">
										<div class="cell small-12 tablet-10">
											<div class="club-logos grid-x grid-padding-x grid-12 small-up-2 tablet-up-3 large-up-4">
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
									<div class="section-header big-small-wrap text-center">
										<?php if( !empty( $fields['about_large_heading'] ) ):?>
										<h2 class="large-heading"><?php echo $fields['about_large_heading'];?></h2>
										<?php endif;?>
										<?php if( !empty( $fields['about_small_heading'] ) ):?>
										<h3 class="small-heading"><?php echo $fields['about_small_heading'];?></h3>
										<?php endif;?>
									</div>
									<?php if( !empty($fields['about_top_copy_section']) ):?>
										<div class="about-top-copy text-center white-color">
											<?php echo $fields['about_top_copy_section'];?>
										</div>
									<?php endif;?>
									<?php if( !empty($fields['about_facts_figures']) ):
										$about_facts_figures = $fields['about_facts_figures'];
									?>
										<div class="about-facts-figures grid-x grid-padding-x small-up-1 medium-up-2 tablet-up-3">
											<?php foreach( $about_facts_figures as $about_facts_figure ):
												$figure = $about_facts_figure['figure'];
												$unit = $about_facts_figure['unit'];
												$text = $about_facts_figure['text'];
											?>
												<div class="cell ff-card text-center">
													<div class="dark-blue-bg">
														<div class="inner">
															<p class="yellow-color heading-font uppercase">
																<?php echo $figure;?>
															</p>
															<p class="unit heading-font uppercase">
																<?php echo $unit;?>
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
									<div class="section-header big-small-wrap text-center">
										<?php if( !empty( $fields['pathways_large_heading'] ) ):?>
										<h2 class="large-heading"><?php echo $fields['pathways_large_heading'];?></h2>
										<?php endif;?>
										<?php if( !empty( $fields['pathways_small_heading'] ) ):?>
										<h3 class="small-heading"><?php echo $fields['pathways_small_heading'];?></h3>
										<?php endif;?>
									</div>
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
							
					<footer class="article-footer">
						 <?php wp_link_pages(); ?>
					</footer> <!-- end article footer -->
						
				</article><!-- #post-<?php the_ID(); ?> -->
		
			</main><!-- #main -->
				
		</div>
	</div>

<?php
get_footer();