<?php
add_action('wp_enqueue_scripts', 'style_them');
add_action('wp_footer', 'script_them');
add_action('after_setup_theme', 'menu');
//gfg
add_filter( 'excerpt_length', function(){
  return 18;
} );

function menu() {
  register_nav_menu('header', 'Главное меню в шапке'); 
  register_nav_menu('footer', 'Меню в подвале');
//  register_nav_menu('footer', 'Меню в подвале');
  register_nav_menu('footer_doc', 'Документы в подвале');
  add_theme_support( 'post-thumbnails', array('post', 'catalog', 'product', 'item', 'brand_main', 'offers', 'slider', 'school', 'equipment','equipment_product') );
  add_filter('excerpt_more', function($more) {
    return '';
  });
}

function style_them() {
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_style('owl_default', get_template_directory_uri() . '/css/owl.theme.default.min.css');
  wp_enqueue_style('owl', get_template_directory_uri() . '/css/owl.carousel.min.css');
  wp_enqueue_style('submain', get_template_directory_uri() . '/css/main_new.css');
  wp_enqueue_style('schoolPage', get_template_directory_uri() . '/css/school-page.css');
  wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');

//  wp_enqueue_style('popup', get_template_directory_uri() . '/css/magnific-popup.css');
}

function script_them() {
 wp_enqueue_script('carousel', get_template_directory_uri() . '/buildjs/owl.carousel.min.js');
//  wp_enqueue_script('pupupscript', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js');
  wp_enqueue_script('script', get_template_directory_uri() . '/buildjs/index.js');
  wp_enqueue_script('subscript', get_template_directory_uri() . '/buildjs/index_new.js');
  wp_enqueue_script('fix', get_template_directory_uri() . '/buildjs/fix.js');
//  wp_enqueue_script('personal', get_template_directory_uri() . '/js/personal.js');

  add_filter('script_loader_tag', 'codeless_remove_type_attr', 10, 2);
  function codeless_remove_type_attr($tag, $handle) {
    return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
  }
}

add_action( 'init', 'register_post_types' );
function register_post_types(){
  register_post_type('catalog', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Категории', // основное название для типа записи
      'singular_name'      => 'Категория', // название для одной записи этого типа
      'add_new'            => 'Добавить Категорию', // для добавления новой записи
      'add_new_item'       => 'Добавление категории', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование категории', // для редактирования типа записи
      'new_item'           => 'Новая категория', // текст новой записи
      'view_item'          => 'Смотреть категорию', // для просмотра записи этого типа.
      'search_items'       => 'Искать категорию', // для поиска по этим типам записи
      'not_found'          => 'Не найдена категория', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найдена категория в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Категории', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => true, // зависит от public
    'exclude_from_search' => true, // зависит от public
    'show_ui'             => true, // зависит от public
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => true, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => 2,
    'menu_icon'           => 'dashicons-grid-view',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array(),
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
  ) );

  register_post_type('doc', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Документы', // основное название для типа записи
      'singular_name'      => 'Документ', // название для одной записи этого типа
      'add_new'            => 'Добавить Документ', // для добавления новой записи
      'add_new_item'       => 'Добавление документа', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование документа', // для редактирования типа записи
      'new_item'           => 'Новый документ', // текст новой записи
      'view_item'          => 'Смотреть документ', // для просмотра записи этого типа.
      'search_items'       => 'Искать документ', // для поиска по этим типам записи
      'not_found'          => 'Не найден документ', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найден документ в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Документы', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => true, // зависит от public
    'exclude_from_search' => true, // зависит от public
    'show_ui'             => true, // зависит от public
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => true, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => 8,
    'menu_icon'           => 'dashicons-media-document',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array(),
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
  ) );

  register_post_type('product', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Бренды', // основное название для типа записи
      'singular_name'      => 'Бренд', // название для одной записи этого типа
      'add_new'            => 'Добавить Бренд', // для добавления новой записи
      'add_new_item'       => 'Добавление бренда', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование бренда', // для редактирования типа записи
      'new_item'           => 'Новый бренд', // текст новой записи
      'view_item'          => 'Смотреть бренд', // для просмотра записи этого типа.
      'search_items'       => 'Искать бренд', // для поиска по этим типам записи
      'not_found'          => 'Не найден бренд', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найден бренд в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Бренды', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => true, // зависит от public
    'exclude_from_search' => true, // зависит от public
    'show_ui'             => true, // зависит от public
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => true, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => 3,
    'menu_icon'           => 'dashicons-excerpt-view',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array(),
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
  ) );

  register_post_type('subcategory', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Подкатегории', // основное название для типа записи
      'singular_name'      => 'Подкатегория', // название для одной записи этого типа
      'add_new'            => 'Добавить Подкатегорию', // для добавления новой записи
      'add_new_item'       => 'Добавление Подкатегории', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование подкатегории', // для редактирования типа записи
      'new_item'           => 'Новая подкатегория', // текст новой записи
      'view_item'          => 'Смотреть подкатегорию', // для просмотра записи этого типа.
      'search_items'       => 'Искать подкатегорию', // для поиска по этим типам записи
      'not_found'          => 'Не найдена подкатегория', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найдена подкатегория в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Подкатегории', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => true, // зависит от public
    'exclude_from_search' => true, // зависит от public
    'show_ui'             => true, // зависит от public
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => true, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => 2,
    'menu_icon'           => 'dashicons-list-view',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array(),
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
  ) );

  register_post_type('contact', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Контакти', // основное название для типа записи
      'singular_name'      => 'Контакт', // название для одной записи этого типа
      'add_new'            => 'Добавить контакт', // для добавления новой записи
      'add_new_item'       => 'Добавление контакта', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование контакта', // для редактирования типа записи
      'new_item'           => 'Новий контакт', // текст новой записи
      'view_item'          => 'Смотреть контакт', // для просмотра записи этого типа.
      'search_items'       => 'Искать контакт', // для поиска по этим типам записи
      'not_found'          => 'Не найден контакт', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найден контакт в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Контакти', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => true, // зависит от public
    'exclude_from_search' => true, // зависит от public
    'show_ui'             => true, // зависит от public
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => true, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => 4,
    'menu_icon'           => 'dashicons-translation',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array(),
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
  ) );

  register_post_type('social', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Все контакты', // основное название для типа записи
      'singular_name'      => 'Все контакты', // название для одной записи этого типа
      'add_new'            => 'Добавить контакт', // для добавления новой записи
      'add_new_item'       => 'Добавление контакта', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование контакта', // для редактирования типа записи
      'new_item'           => 'Новий контакт', // текст новой записи
      'view_item'          => 'Смотреть контакт', // для просмотра записи этого типа.
      'search_items'       => 'Искать контакт', // для поиска по этим типам записи
      'not_found'          => 'Не найден контакт', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найден контакт в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Все контакты', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => true, // зависит от public
    'exclude_from_search' => true, // зависит от public
    'show_ui'             => true, // зависит от public
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => true, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => 6,
    'menu_icon'           => 'dashicons-admin-site',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array(),
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
  ) );

  register_post_type('item', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Товары', // основное название для типа записи
      'singular_name'      => 'Товар', // название для одной записи этого типа
      'add_new'            => 'Добавить Товар', // для добавления новой записи
      'add_new_item'       => 'Добавление товара', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование товара', // для редактирования типа записи
      'new_item'           => 'Новый товар', // текст новой записи
      'view_item'          => 'Смотреть товар', // для просмотра записи этого типа.
      'search_items'       => 'Искать товар', // для поиска по этим типам записи
      'not_found'          => 'Не найден товар', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найден товар в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Товары', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => true, // зависит от public
    'exclude_from_search' => true, // зависит от public
    'show_ui'             => true, // зависит от public
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => true, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => 4,
    'menu_icon'           => 'dashicons-tide',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array(),
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
  ) );

  register_post_type('brand_main', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Бренды на главной', // основное название для типа записи
      'singular_name'      => 'Бренд на главной', // название для одной записи этого типа
      'add_new'            => 'Добавить Бренд', // для добавления новой записи
      'add_new_item'       => 'Добавление бренда', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование бренда', // для редактирования типа записи
      'new_item'           => 'Новый бренд', // текст новой записи
      'view_item'          => 'Смотреть бренд', // для просмотра записи этого типа.
      'search_items'       => 'Искать бренд', // для поиска по этим типам записи
      'not_found'          => 'Не найден бренд', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найден бренд в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Бренды на главной', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => true, // зависит от public
    'exclude_from_search' => true, // зависит от public
    'show_ui'             => true, // зависит от public
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => true, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => 7,
    'menu_icon'           => 'dashicons-format-gallery',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array(),
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
  ) );

  register_post_type('offers', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Акция', // основное название для типа записи
      'singular_name'      => 'Акция', // название для одной записи этого типа
      'add_new'            => 'Добавить акцию', // для добавления новой записи
      'add_new_item'       => 'Добавление акции', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование акции', // для редактирования типа записи
      'new_item'           => 'Новая акция', // текст новой записи
      'view_item'          => 'Смотреть акцию', // для просмотра записи этого типа.
      'search_items'       => 'Искать акцию', // для поиска по этим типам записи
      'not_found'          => 'Не найдена акция', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найдена акция в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Акция', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => true, // зависит от public
    'exclude_from_search' => true, // зависит от public
    'show_ui'             => true, // зависит от public
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => true, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => 9,
    'menu_icon'           => 'dashicons-tide',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array(),
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
  ) );

  register_post_type('slider', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Слайдер', // основное название для типа записи
      'singular_name'      => 'Слайд', // название для одной записи этого типа
      'add_new'            => 'Добавить слайд', // для добавления новой записи
      'add_new_item'       => 'Добавление слайда', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование слайда', // для редактирования типа записи
      'new_item'           => 'Новый слайд', // текст новой записи
      'view_item'          => 'Смотреть слайд', // для просмотра записи этого типа.
      'search_items'       => 'Искать слайд', // для поиска по этим типам записи
      'not_found'          => 'Не найден слайд', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найден слайд в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Слайдер', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => true, // зависит от public
    'exclude_from_search' => true, // зависит от public
    'show_ui'             => true, // зависит от public
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => true, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => 10,
    'menu_icon'           => 'dashicons-format-gallery',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array(),
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
  ) );

  register_post_type('school', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'слайдер школы', // основное название для типа записи
      'singular_name'      => 'слайд школы', // название для одной записи этого типа
      'add_new'            => 'Добавить слайд для страницы школы', // для добавления новой записи
      'add_new_item'       => 'Добавление слайда ', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование слайда ', // для редактирования типа записи
      'new_item'           => 'Новый слайд', // текст новой записи
      'view_item'          => 'Смотреть слайд страницы школа', // для просмотра записи этого типа.
      'search_items'       => 'Искать слайд', // для поиска по этим типам записи
      'not_found'          => 'Не найден слайд', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найден слайд на страницы школи', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'слайдер школы', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => true, // зависит от public
    'exclude_from_search' => true, // зависит от public
    'show_ui'             => true, // зависит от public
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => true, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => 12,
    'menu_icon'           => 'dashicons-tide',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array(),
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
  ) );

  register_post_type('equipment', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Экипировка', // основное название для типа записи
      'singular_name'      => 'Экипировка', // название для одной записи этого типа
      'add_new'            => 'Добавить экипировку', // для добавления новой записи
      'add_new_item'       => 'Добавление экипировки ', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование экипировки ', // для редактирования типа записи
      'new_item'           => 'Новая экипировка', // текст новой записи
      'view_item'          => 'Смотреть экипировку', // для просмотра записи этого типа.
      'search_items'       => 'Искать экипировку', // для поиска по этим типам записи
      'not_found'          => 'Не найдена экипировку', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найдена экипировка в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Экипировка', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => true, // зависит от public
    'exclude_from_search' => true, // зависит от public
    'show_ui'             => true, // зависит от public
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => true, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => 13,
    'menu_icon'           => 'dashicons-shield-alt',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array(),
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
  ) );

  register_post_type('equipment_product', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Экипировка подкатегория', // основное название для типа записи
      'singular_name'      => 'Экипировка подкатегория', // название для одной записи этого типа
      'add_new'            => 'Добавить подкатегорию экипировки', // для добавления новой записи
      'add_new_item'       => 'Добавление подкатегории экипировки', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование подкатегории экипировки', // для редактирования типа записи
      'new_item'           => 'Новая подкатегория экипировки', // текст новой записи
      'view_item'          => 'Смотреть подкатегорию экипировки', // для просмотра записи этого типа.
      'search_items'       => 'Искать подкатегорию экипировки', // для поиска по этим типам записи
      'not_found'          => 'Не найдена подкатегория экипировки', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найдена подкатегория экипировки в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Экипировка подкатегория', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => true, // зависит от public
    'exclude_from_search' => true, // зависит от public
    'show_ui'             => true, // зависит от public
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => true, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => 11,
    'menu_icon'           => 'dashicons-edit',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array(),
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
  ) );

}


function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );


