<article id="post-<?php the_ID(); ?>" <?php post_class('tournament-card grid-card cell relative'); ?>>
	<div class="inner white-bg grid-x flex-dir-column h-100 card-shadow">
		<?php if( !empty( get_field('logo') ) ) {
			$imgID = get_field('logo')['ID'];
			$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
			$img = wp_get_attachment_image( $imgID, 'tournament-thumb', false, [ "class" => "", "alt"=>$img_alt] );
			echo '<div class="img-wrap">';
			echo $img;
			echo '</div>';
		}?>
		<div class="bottom grid-x flex-dir-column align-justify flex-child-auto">
			<div>
				<h3><?php 
					if( !empty(get_field('title')) ) {
						the_field('title');
					} else {
						the_title();	
					}?>
				</h3>
				<?php if( !empty( get_field('dates_for_archive_card') ) ):
					$dates_for_archive_card = get_field('dates_for_archive_card');	
				?>
				<ul class="dates no-bullet">
					<?php foreach( $dates_for_archive_card as $date_for_archive_card ):?>
						<li>
							<div class="heading-font heading-blue-color">
								<?php echo $date_for_archive_card['type'];?>
							</div>
							<p>
								<?php echo $date_for_archive_card['dates'];?>
							</p>
						</li>
					<?php endforeach;?>
				</ul>
				<?php endif;?>
			</div>
				
			<div class="link-wrap">
				<a class="button" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
					More Information
				</a>
			</div>
				
		</div>
	</div>
</article>