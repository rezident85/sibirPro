<?php 
function my_career_scripts() {
	wp_enqueue_style( 'sibir-pro-style', get_stylesheet_uri() );
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700&amp;subset=cyrillic', false );
	wp_enqueue_script( 'my-career-main', get_template_directory_uri() . '/js/index.min.js', array('jquery'), microtime(), true );
}
add_action( 'wp_enqueue_scripts', 'my_career_scripts' );

add_theme_support( 'post-thumbnails' );

function create_post_types() {
  //New post type
  register_post_type('competition', [
    'supports' => ['title', 'editor', 'thumbnail'],
    'rewrite' => [
      'slug' => 'competition'
    ],
    'has_archive' => true,
    'public'      => true,
    'labels'      => [
      'name'                  => 'Новости конкурса',
      'add_new_item'          => 'Добавить новость',
      'edit_item'             => 'Редактировать новость',
      'all_items'             => 'Все новости',
      'singular_name'         => 'Новость',
      'new_item'              => 'Добавить новость',
      'add_new'               => 'Добавить новость',
      'featured_image'        => 'Миниатюра новости',
      'set_featured_image'    => 'Установить миниатюру новости',
      'remove_featured_image' => 'Удалить миниатюру новости',
    ],
    'menu_icon'   => 'dashicons-analytics'
  ]);

  // Disabe emoji  
	// remove all actions related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );  
    
  // Add category metabox to page
  register_taxonomy_for_object_type('category', 'page');
}

add_action('init', 'create_post_types');

?>