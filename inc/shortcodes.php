<?php 
function careers_shortcode_callback( $atts ){
    $atts = shortcode_atts(
        array(
            'limit' => -1
    ), $atts, 'careers' );
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;   
    $args = array(
        'post_type'     => 'careers',
        'posts_per_page'   => $atts['limit'],
        'paged'             =>  $paged
    );      
    $the_query = new WP_Query($args);
    ob_start();
    if ($the_query->have_posts()) { ?>
        <div class="archive-list">            
            <div class="carrers_block text-center"><?php
                while ($the_query->have_posts()) {
                    $the_query->the_post();?>
                    <div class="block_item">
                        <div class="img_block">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full') ?>" alt="<?php echo get_the_title() ?>">
                        </div>
                        <div class="right_content">
                            <h3><?php echo get_the_title() ?></h3>
                            <p><?php echo get_the_excerpt() ?></p>
                            <div class="career_cta">
                                <a class="btn pink btn-block" href="<?php echo get_the_permalink(get_the_ID()) ?>#job_apply">Apply now!</a>
                                <a class="btn transparent btn-block" href="<?php echo get_the_permalink(get_the_ID()) ?>">Learn more</a>
                            </div>
                        </div>
                    </div>
                    <?php 
                } ?>               
            </div>
            <nav class="navigation pagination" aria-label="Careers">
                <div class="nav-links">
                    <?php 
                    $big = 999999999;
                    echo paginate_links(
                        array(
                            'base'          => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format'        => '?paged=%#%', // used for replacing the page number
                            'current'       => max(1, get_query_var('paged')), // grabs the page data
                            'total'         => $the_query->max_num_pages, //$the_query is your custom query
                            'prev_text'     => '',
                            'next_text'     => '',
                            'type'          => 'list'
                        )
                    ); ?>
                </div>
            </nav>
        </div>
        <?php
    } // endif
    wp_reset_postdata();
    $content = ob_get_clean();
    return $content;
}
add_shortcode('careers', 'careers_shortcode_callback');

/*Sortcode to Set a link to visit the instructions page directly.*/
add_shortcode('redirect-link', 'redirect_to_s9s');
function redirect_to_s9s($atts){
    $atts = shortcode_atts(
        array(
            'link' => '/clustercontrol/download/'
    ), $atts, 'redirect-link' );
    ob_start();
    if(isset($_SESSION['__garvity__entry_id']) && $_SESSION['__garvity__entry_id'] != ''){ 
        $digits = 5;
        $qr = ID_PREFIX.str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
        $qr = s9s_features_encrypt($qr); ?>
        <h4 class='cst_gravity_desc'>You have already submitted this form in the past, click <a href='<?=$atts['link']?>?qr=<?=$qr?>'>here</a> to visit the instruction page.</h4>
        <?php
    }
    return ob_get_clean();
}