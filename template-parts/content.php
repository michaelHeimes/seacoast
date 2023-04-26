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
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title text-center">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta text-center">
				<?php
				$post_date = get_the_date( 'F j, Y' ); echo $post_date;
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php seacoast_post_thumbnail(); ?>

	<div class="entry-content">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="cell small-14 large-12">
					<?php the_content();?>
				</div>
			</div>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
