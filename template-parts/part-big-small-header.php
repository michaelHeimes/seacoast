<?php
	$big = $args['big'];
	$small = $args['small'];
	$small_no_p = str_replace(['<p>', '</p>'], '', $small);
	$color = $args['color'];
?>
<div class="section-header big-small-wrap yellow-bold text-center relative uppercase">
	<?php if( !empty( $big ) ):?>
	<h2 class="large-heading <?php if( !empty($color) ) { echo $color . '-color';}?>"><?php echo $big;?></h2>
	<?php endif;?>
	<?php if( !empty( $small ) ):?>
	<h3 class="h2 small-heading text-shadow <?php if( !empty($color) ) { echo $color . '-color';}?>"><?php echo $small_no_p;?></h3>
	<?php endif;?>
</div>