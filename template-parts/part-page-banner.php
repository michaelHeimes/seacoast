<?php $page_banner = $args['page_banner'];?>
<header class="entry-header banner text-center has-object-fit">
	<div class="banner-gradient-wrap relative">
		<div class="bg bg-1"></div>
		<?php if( !empty( $page_banner ) ) {
			$pbImg = $page_banner['background_image'];
			$imgID = $pbImg['ID'];
			$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
			$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "object-fit of-cover grayscale", "alt"=>$img_alt] );
			echo $img;
		}?>							
		<div class="bg mask"></div>
		<div class="bg bg-2"></div>
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
		$link = $page_banner['button_link'];
		if( $link ): 
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';
			?>
		<div class="text-center btn-link relative">
			<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
		</div>
		<?php endif; ?>
	</div>
</header><!-- .entry-header -->