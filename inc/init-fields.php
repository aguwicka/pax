<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_action('acf/init', 'my_acf_init');
function my_acf_init() {

    // check function exists
    if( function_exists('acf_register_block') ) {

        // register a testimonial block
        acf_register_block(array(
            'name'				=> 'main',
            'title'				=> __('Название страницы'),
            'render_template'	=> 'template-parts/blocks/main-screen/main-screen.php',
            'icon'				=> 'admin-comments',
            'keywords'			=> array( 'Название страницы', 'Main' ),
        ));

        acf_register_block(array(
            'name'				=> 'slider',
            'title'				=> __('Слайдер'),
            'render_template'	=> 'template-parts/blocks/slider/slider.php',
            'icon'				=> 'admin-comments',
            'keywords'			=> array( 'Слайдер', 'Slider' ),
        ));

        acf_register_block(array(
            'name'				=> 'tabs',
            'title'				=> __('Табы'),
            'render_template'	=> 'template-parts/blocks/tabs/tabs.php',
            'icon'				=> 'admin-comments',
            'keywords'			=> array( 'Табы', 'Tabs' ),
        ));

        acf_register_block(array(
            'name'				=> 'contacts',
            'title'				=> __('Контакты'),
            'render_template'	=> 'template-parts/blocks/contacts/contacts.php',
            'icon'				=> 'admin-comments',
            'keywords'			=> array( 'Контакты', 'Contacts' ),
        ));

        acf_register_block(array(
            'name'				=> 'news',
            'title'				=> __('Новости'),
            'render_template'	=> 'template-parts/blocks/news/news.php',
            'icon'				=> 'admin-comments',
            'keywords'			=> array( 'Новости', 'News' ),
        ));
    }
}