<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */
$fields = get_fields();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if( !empty( get_field('page_banner') ) ) {
        get_template_part('template-parts/part', 'page-banner', 
            array(
                'page_banner' => get_field('page_banner'),
            )
        );
    };?>
		
    <?php if( !empty( get_field('seacoast_difference_image', 'option') ) || !empty( get_field('seacoast_difference_heading', 'option') ) || !empty( get_field('seacoast_difference_copy', 'option') ) ):?>
	<section class="seacoast-difference">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-middle">
                <div class="cell small-14 tablet-7">
		            <?php if( !empty( get_field('seacoast_difference_image', 'option') ) ) {
                        $imgID = get_field('seacoast_difference_image', 'option')['ID'];
                        $img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
                        $img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
                        echo '<div class="img-wrap">';
                        echo $img;
                        echo '</div>';
                    }?>
                </div>
                <div class="cell small-14 tablet-7 large-6">
                    <?php if( !empty( get_field('seacoast_difference_heading', 'option') ) ):?>
                        <h2 class="underline">
                            <?php the_field('seacoast_difference_heading', 'option') ;?>
                        </h2>
                    <?php endif;?>
                    <?php if( !empty( get_field('seacoast_difference_copy', 'option') ) ):?>
                        <div class="copy-wrap">
                            <?php the_field('seacoast_difference_copy', 'option') ;?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
	</section>
    <?php endif;?>
    
    <?php if( !empty( $fields['staff_heading']) || !empty( $fields['staff_text']) || !empty( $fields['staff_members'] ) ):?>
    <section class="staff gradient-dl">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-center">
                <div class="cell small-14 large-12">
        
                    <?php if( !empty($fields['staff_heading']) ) {
                        get_template_part('template-parts/part', 'big-small-header', 
                            array(
                                'big' => 'Staff',
                                'small' => $fields['staff_heading'],
                                'color' => 'white',
                            ),
                        );
                    };?>
                    
                    <?php if( !empty( $fields['staff_text']) ):?>
                    <p class="text-center white-color"><?php echo $fields['staff_text'];?></p>
                    <?php endif;?>
                    
                    <?php if( !empty( $fields['staff_members'] ) ):
                        $staff_members = $fields['staff_members'];    
                    ?>
                    <div class="staff-grid grid-x grid-padding-x small-up-2 medium-up-3 tablet-up-4 large-up-5">
                        <?php foreach( $staff_members as $staff_member ):
                            $photo = $staff_member['photo'];
                            $name = $staff_member['name'];
                            $position = $staff_member['position'];
                            $email_address = $staff_member['email_address'];
                        ?>
                        <div class="cell">
                            <?php if( !empty($email_address) ):?>
                            <a href="mailto:<?php echo $email_address;?>">
                            <?php endif;?>
                            
                                <?php if( !empty( $photo ) ) {
                                    $imgID = $photo['ID'];
                                    $img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
                                    $img = wp_get_attachment_image( $imgID, 'staff-card', false, [ "class" => "", "alt"=>$img_alt] );
                                    echo '<div class="img-wrap">';
                                    echo $img;
                                    echo '</div>';
                                }?>
                                <div>
                                    <?php if( !empty($name) ):?>
                                    <h3 class="yellow-color">
                                        <?php echo $name;?>
                                    </h3>
                                    <?php endif;?>
                                    <?php if( !empty($title) ):?>
                                    <p class="white-color">
                                        <?php echo $title;?>
                                    </p>
                                    <?php endif;?>
                                </div>
                            
                            <?php if( !empty($email_address) ):?>
                            </a> 
                            <?php endif;?>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section>
    <?php endif;?>
    
    <?php if( !empty( $fields['programs_heading'] ) || !empty( $fields['programs_copy'] ) || !empty( $fields['programs_links_heading'] ) || !empty( $fields['programs_button_links'] ) || !empty( $fields['programs_cta'] ) ):?>
    <section class="programs heading-blue-bg">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-center">
                <div class="cell small-14 tablet-7 large-6">
                    <?php if( !empty( $fields['programs_heading']) ):?>
                    <h2 class="underline white-color">
                        <?php echo $fields['programs_heading'];?>
                    </h2>
                    <?php endif;?>
                    <?php if( !empty( $fields['programs_copy']) ):?>
                    <div class="copy-wrap">
                        <?php echo $fields['programs_copy'];?>
                    </div>
                    <?php endif;?>
                    <?php if( !empty( $fields['programs_links_heading']) ):?>
                    <h3 class="white-color">
                        <?php echo $fields['programs_links_heading'];?>
                    </h3>
                    <?php endif;?>
                    <?php if( !empty( $fields['programs_button_links'] ) ):
                        $programs_button_links = $fields['programs_button_links'];    
                    ?>
                    <div class="grid-x grid-padding-x">
                        <?php foreach($programs_button_links as $programs_button_link):?>
                            <?php 
                            $link = $programs_button_link['button_link'];
                            if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                            <div class="cell shrink">
                                <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            </div>
                            <?php endif; ?>
                        <?php endforeach;?>
                    </div>
                    <?php endif;?>
                </div>
                <div class="cell small-14 tablet-7 large-6">
                    <?php if( !empty($fields['programs_cta']) ):
                        $image = $fields['programs_cta']['image'];
                        $title = $fields['programs_cta']['title'];
                        $dates_type = $fields['programs_cta']['dates_type'];
                        $location = $fields['programs_cta']['location'];
                        $page_link = $fields['programs_cta']['page_link'];
                    ?>
                    <a href="<?php echo esc_url($page_link);?>" class="inner white-bg grid-x flex-dir-column">
                        <?php if( !empty( $image ) ) {
                            $imgID = $image['ID'];
                            $img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
                            $img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
                            echo '<div class="img-wrap">';
                            echo $img;
                            echo '</div>';
                        }?>
                        <div>
                            <?php if( !empty($title) ):?>
                            <h3 class="blue-color">
                                <?php echo $title;?>
                            </h3>
                            <?php endif;?>
                            <?php if( !empty($dates_type) || !empty($location) ):?>
                            <p class="text-gray-color">
                                <?php echo $dates_type;?>
                                <?php if( !empty($location) ):?>
                                <br><?php echo $location;?>
                                <?php endif;?>
                            </p>
                            <?php endif;?>
                        </div>
                    </a>    
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section>
    <?php endif;?>
    
    <?php if( !empty( $fields['locations_map_embed_code'] ) || !empty( $fields['locations_heading'] ) || !empty( $fields['locations'] ) ):?>
    <section class="locations">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-center">
                <div class="cell small-14 tablet-6 large-6">
                    <?php if( !empty( $fields['locations_map_embed_code'] ) ):
                        echo $fields['locations_map_embed_code'];
                    endif;?>
                </div>
                <?php if( !empty( $fields['locations_heading'] ) || !empty( $fields['locations'] ) ):?>
                <div class="cell small-14 tablet-6 large-6">
                    <?php if( !empty( $fields['locations_heading'] ) ):?>
                    <h2 class="underline">
                        <?php echo $fields['locations_heading'];?>
                    </h2>
                    <?php endif;?>
                    <?php if( !empty( $fields['locations'] ) ):
                        $locations = $fields['locations']
                    ?>
                    <div class="locations">
                        <?php foreach( $locations as $location ):
                            $name = $location['name'];    
                            $address = $location['address'];    
                            $directions_url = $location['directions_url'];    
                        ?>
                        <a href="<?php echo esc_attr($directions_url);?>" class="location text-gray-color">
                            <div class="grid-x grid-padding-x">
                                <div class="cell shrink">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13.004" height="17" viewBox="0 0 13.004 17"><path id="Subtraction_2" data-name="Subtraction 2" d="M-14648.5,5756.972a4.623,4.623,0,0,1-1.237-1.159,34.242,34.242,0,0,1-2.21-2.815c-.412-.583-.794-1.161-1.135-1.718-.379-.617-.707-1.208-.977-1.76a7.636,7.636,0,0,1-.943-3.147,6.335,6.335,0,0,1,.133-1.29,6.263,6.263,0,0,1,.379-1.2,6.244,6.244,0,0,1,.6-1.087,6.472,6.472,0,0,1,.793-.948,6.521,6.521,0,0,1,.963-.781,6.546,6.546,0,0,1,1.1-.59,6.553,6.553,0,0,1,1.221-.373,6.635,6.635,0,0,1,1.311-.13,6.642,6.642,0,0,1,1.311.13,6.544,6.544,0,0,1,1.22.373,6.518,6.518,0,0,1,1.1.59,6.6,6.6,0,0,1,.963.781,6.533,6.533,0,0,1,.793.948,6.357,6.357,0,0,1,.6,1.087,6.332,6.332,0,0,1,.379,1.2,6.335,6.335,0,0,1,.133,1.29,7.651,7.651,0,0,1-.943,3.147c-.27.551-.6,1.143-.977,1.76-.342.557-.723,1.135-1.135,1.718a34.117,34.117,0,0,1-2.211,2.815A4.611,4.611,0,0,1-14648.5,5756.972Zm0-14.341a3.828,3.828,0,0,0-1.48.294,3.8,3.8,0,0,0-1.207.8,3.724,3.724,0,0,0-.815,1.189,3.673,3.673,0,0,0-.3,1.457,3.669,3.669,0,0,0,.3,1.457,3.726,3.726,0,0,0,.815,1.19,3.8,3.8,0,0,0,1.207.8,3.829,3.829,0,0,0,1.48.294,3.824,3.824,0,0,0,1.479-.294,3.8,3.8,0,0,0,1.208-.8,3.729,3.729,0,0,0,.814-1.19,3.653,3.653,0,0,0,.3-1.457,3.657,3.657,0,0,0-.3-1.457,3.722,3.722,0,0,0-.814-1.189,3.79,3.79,0,0,0-1.208-.8A3.824,3.824,0,0,0-14648.5,5742.631Z" transform="translate(14655.002 -5739.972)" fill="#005697"/> </svg>
                                </div>
                                <div class="cell auto">
                                    <h3 class="blue-color">
                                        <?php echo $name;?>
                                    </h3>
                                    <p><?php echo $address;?></p>
                                </div>
                            </div>
                        </a>
                        <?php endforeach;?>
                    </div>
                    <?php endif;?>
                    
                </div>
                <?php endif;?>
            </div>
        </div>
    </section>
    <?php endif;?>
    
    <?php get_template_part('template-parts/content', 'instagram-feed');?>
    
</article><!-- #post-<?php the_ID(); ?> -->
