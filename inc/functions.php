<?php
! defined('ABSPATH') && exit;
//register post type sa_slider
function sa_slider_post_type(){
    $labels = array(
        'name' => 'Slider',
        'singular_name' => 'Slider',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Slider',
        'edit_item' => 'Edit Slider',
        'new_item' => 'New Slider',
        'view_item' => 'View Slider',
        'search_items' => 'Search Slider',
        'not_found' => 'No Slider Found',
        'not_found_in_trash' => 'No Slider Found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Slider'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
    );
    register_post_type('sa_slider', $args);

}

add_action('init', 'sa_slider_post_type');

//register shortcode
function sa_slider_shortcode($atts, $content = null){
    ob_start();
    ?>
        <header class="page-header home home-slider-1">
            <div class="slider caption-slider control-nav direction-nav">
                <?php
                $slider = new WP_Query(array(
                    'post_type' => 'sa_slider',
                ));

                if($slider->have_posts()){
                    while($slider->have_posts()){
                        $slider->the_post();
                        $btn_text = ! empty(get_post_meta(get_the_ID(), 'button_text', true)) ? get_post_meta(get_the_ID(), 'button_text', true) : 'CONTÁCTENOS ';
                        $btn_url = ! empty(get_post_meta(get_the_ID(), 'button_url', true)) ? get_post_meta(get_the_ID(), 'button_url', true) : '#';
                        ?>
                         <div class="block-caption-slider overlay-container">
                            <div class="__img-background" style="background-image: url(<?php the_post_thumbnail_url() ?>) ; background-position: undefined" title=" Stoica abogados, Derecho inmobiliario Madrid, Abogados para Agencias Inmobiliarias Madrid, Derecho inmobiliario Madrid Alcalá de Henares"></div>
                            <div class="overlay bgc-dark-o-4">
                                <div class="cell-vertical-wrapper">
                                    <div class="cell-middle">
                                    <div class="caption-preset-simple-5 text-center-sm-max">
                                        <div class="container">
                                            <div class="caption-wrapper">
                                                <h1 class="text-responsive size-ll caption" style="font-size: 35px"><?php the_title(); ?></h1>
                                                <div class="__buttons caption"><a class="btn btn-gray-base fullwidth" href="<?php echo $btn_url ?>"><?php echo $btn_text ?></a></div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
              
            </div>
         </header>

    <?php
    return ob_get_clean();
}

add_shortcode('sa_slider', 'sa_slider_shortcode');

//register sidebar
register_sidebar(array(
    'name'          => 'Footer Address Sidebar',
    'id'            => 'footer-address-sidebar',
    'description'   => 'Footer Address Sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
));

//Footer middle sidebar
register_sidebar(array(
    'name'          => 'Footer Middle Sidebar',
    'id'            => 'footer-middle-sidebar',
    'description'   => 'Footer Middle Sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
));

//footer left sidebar
register_sidebar(array(
    'name'          => 'Footer Left Sidebar',
    'id'            => 'footer-left-sidebar',
    'description'   => 'Footer Left Sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
));

//Footer bottom sidebar
register_sidebar(array(
    'name'          => 'Footer Bottom Sidebar',
    'id'            => 'footer-bottom-sidebar',
    'description'   => 'Footer Bottom Sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
));