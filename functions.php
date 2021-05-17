<?php
add_theme_support( 'post-thumbnails' );

add_action( 'wp_enqueue_scripts', 'strategy_assets' );

//include all files in /inc/
foreach (scandir(dirname(__FILE__) . '/inc/') as $filename) {
    $includesPath = dirname(__FILE__);
    $path = $includesPath . '/inc/' . $filename;
    if (is_file($path)) {
        require_once $path;
    }
}

add_action( 'after_setup_theme', 'theme_register_nav_menu' );
function theme_register_nav_menu() {
    register_nav_menu( 'primary', 'Primary Menu' );
}

add_filter('show_admin_bar', '__return_false'); // отключить

function prefix_tinymce_toolbar( $args ) {

    $args['fontsize_formats'] = "56px 5.5vw 7vw 9vw 13vw 15vw 16vw 19vw 20vw";

    return $args;

}
add_filter( 'tiny_mce_before_init', 'prefix_tinymce_toolbar' );

function change_term_order( $orderby, $args, $taxonomies ) {

    if ( is_admin() && 'tax_products' !== $taxonomies[0] ) {
        return $orderby;
    }

    $orderby        = 'term_group';
    $args['order']  = 'ASC';

    return $orderby;
}
add_filter( 'get_terms_orderby', 'change_term_order', 10, 3 );


add_action('wp_ajax_my_ajax_action', 'my_ajax_action' );
add_action('wp_ajax_nopriv_my_ajax_action', 'my_ajax_action' );
function my_ajax_action() {
    $postID = $_POST['post_id'];
    $requested_page = intval($_POST['page']);
    $posts_per_page = intval($_POST['posts_per_page']) - 1;
    $my_posts = array(
        'cat' => $postID,
        'posts_per_page' => $posts_per_page,
        'offset' => 1
    );

    $loop = new WP_Query( $my_posts );?>
        <?php if($loop->have_posts()):
        $data = [];
        while ( $loop->have_posts() ) : $loop->the_post();
        $data = $posts_per_page;
        ?>
        <?php endwhile;
        wp_send_json_success( $data );
        endif;
}
