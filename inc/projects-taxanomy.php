<?php

add_action( 'init', 'register_post_projects' );
function register_post_projects(){
    register_post_type( 'post_projects', [
        'label'  => 'projects',
        'labels' => [
            'name'               => 'Проекты',
            'singular_name'      => 'projects',
            'add_new'            => 'Добавить проект',
            'add_new_item'       => 'Добавить новый проект',
            'edit_item'          => 'Редактировать проект',
            'new_item'           => 'Новый проект',
            'view_item'          => 'Посмотреть проект',
            'search_items'       => 'Поиск проекта',
            'not_found'          => 'Ничего не найдено',
            'not_found_in_trash' => 'Ничего не найдено в корзине',
            'parent_item_colon' => 'Родительская страница',
            'menu_name'          => 'Проект',
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null,
        // 'exclude_from_search' => null,
        // 'show_ui'             => null,
        // 'show_in_nav_menus'   => null,
        'show_in_menu'        => null,
        // 'show_in_admin_bar'   => null,
        'show_in_rest'        => true,
        'rest_base'           => null,
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-sticky',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post',
        //'map_meta_cap'      => null,
        'hierarchical'        => true,
        'supports'            => [ 'title', 'editor', 'author', 'thumbnail', 'page-attributes' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}