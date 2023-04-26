<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if( !empty( get_field('page_banner') ) ) {
		get_template_part('template-parts/part', 'page-banner', 
			array(
				'page_banner' => get_field('page_banner'),
			)
		);
	};?>
		
	<div class="entry-content">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="cell small-14 large-12">
					<?php the_content();?>
				</div>
			</div>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->


