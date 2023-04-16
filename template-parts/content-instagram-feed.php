<?php if( !empty( get_field('instagram_feed_shortcode', 'option') ) ):
	$shortcode = get_field('instagram_feed_shortcode', 'option');
?>
<section class="instagram-feed">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-middle">
			<div class="left cell small-14 tablet-7">
				<?php if( !empty(get_field('social_large_heading', 'option')) || !empty(get_field('social_small_heading', 'option')) ) {
					get_template_part('template-parts/part', 'big-small-header', 
						array(
							'big' => get_field('social_large_heading', 'option'),
							'small' => get_field('social_small_heading', 'option'),
							'color' => '',
						),
					);
				};?>
			</div>
			<div class="right cell small-14 tablet-7">
				<?php echo do_shortcode( $shortcode );?>
			</div>
		</div>
	</div>
</section>
<?php endif;?>