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
	</div>
</header><!-- .entry-header -->