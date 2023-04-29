<?php 
	$image_copy = $args['image_and_copy'];
	$image = $image_copy['image'];
	$copy = $image_copy['copy'];	
?>
<section class="image-copy relative white-color">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-middle tablet-flex-dir-row-reverse">
			<?php if( !empty($copy) ):?>
				<div class="copy-wrap cell small-14 tablet-7">
					<?php echo $copy;?>
				</div>
			<?php endif;?>
			<?php if( !empty( $image ) ) {
				$imgID = $image['ID'];
				$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
				$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
				echo '<div class="img-wrap cell small-14 tablet-7">';
				echo $img;
				echo '</div>';
			}?>
		</div>
	</div>
</section>