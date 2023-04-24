<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://trailhead.com/docs/off-canvas-menu/
 */
?>

<div class="top-bar-wrap grid-container fluid">

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
		<div class="top-bar-right show-for-tablet">
			<div class="grid-x align-right">
				<div class="cell shrink">
					<div class="grid-x align-right align-middle xlarge-flex-dir-row-reverse">
						<?php if( get_field('playerfirst_login', 'option') ):?>
						<div class="cell small-14 xlarge-shrink text-right">
							<a class="playerfirst-login" href="<?php the_field('playerfirst_login');?>" target="_blank">
								<?php if( !empty( get_field('playerfirst_logo', 'option') ) ) {
									$imgID = get_field('playerfirst_logo', 'option')['ID'];
									$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
									$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
									echo '<span class="logo-wrap">';
									echo $img;
									echo '</span>';
								}?>
								<span>Playerfirst Login</span>
							</a>
						</div>
						<?php endif;?>
						<div class="cell small-14 tablet-shrink">
							<?php seacoast_top_nav(); ?>	
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="menu-toggle-wrap cell shrink hide-for-tablet">
			<ul class="menu">
				<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
				<li><a id="menu-toggle" class="menu-toggle" data-toggle="off-canvas"><span></span><span></span><span></span></a></li>
			</ul>
		</div>
	</div>
	
</div>