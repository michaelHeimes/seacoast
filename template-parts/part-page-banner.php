<?php 
	$page_banner = $args['page_banner'];
	$button_links = $page_banner['button_links'];
?>
<header class="entry-header banner text-center has-object-fit<?php if( !empty($button_links) ){ echo ' has-btns'; };?>">
	<div class="banner-gradient-wrap relative display-on-load" style="visibility: hidden">
		<div class="bg bg-1"></div>
		<?php if( !empty( $page_banner ) ) {
			$style = 'visibility: hidden';
			$pbImg = $page_banner['background_image'];
			$imgID = $pbImg['ID'];
			$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
			$img = wp_get_attachment_image( $imgID, 'banner-bg', false, [ "class" => "object-fit of-cover grayscale", "alt"=>$img_alt]);
			echo $img;
		}?>							
		<!-- <div class="bg mask"></div> -->
		<div class="bg bg-2"></div>
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="cell small-14">
					<?php if( !empty( $page_banner['large_heading']) || !empty( $page_banner['small_heading']) ) {
						get_template_part('template-parts/part', 'big-small-header', 
							array(
								'big' => $page_banner['large_heading'],
								'small' => $page_banner['small_heading'],
								'color' => 'white',
							),
						);
					};?>
					<?php 
					if( !empty($button_links) ):?>
						<div class="button-links grid-x grid-padding-x align-center relative">
							<?php foreach($button_links as $button_link):
								$link = $button_link['link'];
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
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</header><!-- .entry-header -->