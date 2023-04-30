<?php
/**
 * The template part for displaying offcanvas content
 *
 * For more info: http://trailhead.com/docs/off-canvas-menu/
 */
?>

<div class="off-canvas gradient-ld" id="off-canvas" style="display: none;" data-off-canvas>
	<div id="off-canvas-top"></div>
	
	<div class="top-bar grid-x grid-padding-x" id="top-bar-menu">
	
		<div class="cell auto">
			
			<div class="site-branding show-for-sr">
				<?php
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$seacoast_description = get_bloginfo( 'description', 'display' );
				if ( $seacoast_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $seacoast_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
		
			<ul class="menu logo-menu">
				<li class="logo"><a href="<?php echo home_url(); ?>">
					<?php 
					$image = get_field('header_logo', 'option');
					if( !empty( $image ) ): ?>
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif; ?>
				</a></li>
			</ul>
						
		</div>

	</div>

	<div class="inner">
	
		<?php seacoast_off_canvas_nav(); ?>
				
	</div>

</div>
