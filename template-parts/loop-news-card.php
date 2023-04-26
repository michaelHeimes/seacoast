<article id="post-<?php the_ID(); ?>" <?php post_class('news-card cell relative'); ?>>
	<div class="inner grid-x flex-dir-column h-100 card-shadow">
		<?php if( !empty( get_field('archive_grid_image') ) ) {
			$imgID = get_field('archive_grid_image')['ID'];
			$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
			$img = wp_get_attachment_image( $imgID, 'tournament-thumb', false, [ "class" => "", "alt"=>$img_alt] );
			echo '<div class="img-wrap">';
			echo $img;
			echo '</div>';
		}?>
		<div class="bottom grid-x flex-dir-column align-justify flex-child-auto">
			<div>
				<h2 class="h3"><?php the_title();?></h2>
				<?php
				$post_date = get_the_date( 'F j, Y' ); echo $post_date;
				?>
			</div>
				
			<div class="link-wrap">
				<a class="button" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
					More Information
				</a>
			</div>
				
		</div>
	</div>
</article>