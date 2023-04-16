<?php
	$big = $args['big'];
	$small = $args['small'];
	$color = $args['color'];
?>
<div class="section-header big-small-wrap yellow-bold text-center">
	<?php if( !empty( $big ) ):?>
	<h2 class="large-heading <?php if( !empty($color) ) { echo $color . '-color';}?>"><?php echo $big;?></h2>
	<?php endif;?>
	<?php if( !empty( $small ) ):?>
	<h3 class="small-heading <?php if( !empty($color) ) { echo $color . '-color';}?>"><?php echo $small;?></h3>
	<?php endif;?>
</div>