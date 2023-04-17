<?php 
	if ( is_singular( 'tournament' ) ) {
		$image = get_field('logo');
		$heading = get_field('title');
	} else {
		$page_banner = get_field('page_banner:_image_and_textslinks');
		$image = $page_banner['image'];	
		$heading = $page_banner['heading'];	
		$button_links = $page_banner['button_links'];
		$copy = $page_banner['copy'];
	}
	
?>
<header class="entry-header banner banner-text-links heading-blue-bg">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center align-middle">
			<?php if( !empty( $image ) ) {
				$imgID = $image['ID'];
				$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
				$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
				echo '<div class="img-wrap cell small-14 medium-5 tablet-6 large-4">';
				echo $img;
				echo '</div>';
			}?>
			<div class="cell small-14 medium-9 tablet-8 large-7 large-offset-1">
				<h1 class="white-color underlined"><?php echo $heading;?></h1>
				
				<?php if( is_singular( 'tournament' ) ):?>
					<?php if( !empty( get_field('dates_for_single_post_banner') ) ):?>
						<h2 class="yellow-color">
							<?php the_field('dates_for_single_post_banner');?>
						</h2>	
					<?php endif;?>
					<?php if( !empty(get_field('location')) ):?>
						<p><?php the_field('location');?></p>
					<?php endif;?>
					<?php if( !empty( get_field('registration_url') ) ):?>
						<a class="button" href="<?php the_field('registration_url');?>" target="_blank">
							Register Now
						</a>
					<?php endif;?>	
				<?php endif;?>
				
				<?php if( !empty( $button_links ) ):?>
					<div class="button-links grid-x grid-padding-x">
						<?php foreach( $button_links as $button_link ):
							$link = $button_link['button_link'];
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
					</div>
				<?php endif;?>
				
				<?php if( !empty($copy) ):?>
					<div class="copy-wrap white-color">
						<?php echo $copy;?>
					</div>
				<?php endif;?>
				
			</div>
		</div>
	</div>
</header><!-- .entry-header -->