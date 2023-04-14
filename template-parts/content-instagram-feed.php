<?php if( !empty( get_field('instagram_feed_shortcode', 'option') ) ):
	$shortcode = get_field('instagram_feed_shortcode', 'option');
?>
<section class="instagram-feed">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="left cell small-14 tablet-7">
				<div class="section-header big-small-wrap text-center">
					<?php if( !empty( get_field('social_large_heading', 'option') ) ):?>
					<h2 class="large-heading"><?php the_field('social_large_heading', 'option');?></h2>
					<?php endif;?>
					<?php if( !empty( get_field('social_small_heading', 'option') ) ):?>
					<h3 class="small-heading"><?php the_field('social_small_heading', 'option');?></h3>
					<?php endif;?>
				</div>
			</div>
			<div class="right cell small-14 tablet-7">
				<?php echo do_shortcode( $shortcode );?>
			</div>
		</div>
	</div>
</section>
<?php endif;?>