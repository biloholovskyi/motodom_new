<!doctype html>
<html lang="ru" style="margin-top: 0 !important;">
<head>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap-grid.css'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
  <?php wp_head(); ?>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>MOTODOM</title>
</head>
<body>

<div id="page-preloader" class="preloader">
  <img src="<?php echo get_template_directory_uri() . '/media/icon/logo/preloader.png'; ?>" alt="preloader" class="loader-hidden">
  <div class="loader loader-hidden" >

    <div class="loader-bar loader-hidden"></div>
  </div>
</div>


<header class="header">
  <nav class="navigation">
    <a class="logo-link" href="/">
      <img class="logo" src="<?php echo get_template_directory_uri() . '/media/icon/new-logo.svg'; ?>" alt="logo">
    </a>

    <ul id="nav" class="out">
      <li>
        <a class="click" href="#"><img class="nav-hover-close"
                                       src="<?php echo get_template_directory_uri() . '/media/icon/icon-motocylce.svg'; ?>"
                                       alt="icon motocylce" width="22" height="13">
          <img class="nav-hover"
               src="<?php echo get_template_directory_uri() . '/media/icon/icon-motocylce-hover.svg'; ?>"
               alt="icon motocylce" width="22" height="13">
          Каталог</a>
      </li>
      <li>
        <a href="/offers/"><img class="nav-hover-close"
                                src="<?php echo get_template_directory_uri() . '/media/icon/icon-offer.svg'; ?>"
                                alt="motodom" width="22" height="13">
          <img class="nav-hover" src="<?php echo get_template_directory_uri() . '/media/icon/icon-offer-hover.svg'; ?>"
               alt="icon motocylce" width="22" height="13">
          Акции</a>
      </li>
      <!-- <li>
          <a href="/equipment/"><img class="nav-hover-close" 
                           src="<?php echo get_template_directory_uri() . '/media/icon/icon-hat.svg'; ?>" 
                           alt="motodom" width="22" height="13">
          <img class="nav-hover" src="<?php echo get_template_directory_uri() . '/media/icon/icon-hat-hover.svg'; ?>" alt="icon motocylce" width="22" height="13">
          Экипировка</a>
        </li> -->
      <li>
        <div class="burger-wrap">
          <img class="nav-hover-close" src="<?php echo get_template_directory_uri() . '/media/icon/icon-burger.svg'; ?>"
               alt="motodom" width="22" height="13">
          <img class="nav-hover" src="<?php echo get_template_directory_uri() . '/media/icon/icon-burger-hover.svg'; ?>"
               alt="icon motocylce" width="22" height="13">

          <!-- <input type="checkbox" id="check-menu" > -->
          <label class="a" for="check-menu">Еще</label>
          <div class="main-menu">
            <?php
            wp_nav_menu([
              'theme_location' => 'header',
              'menu' => '',
              'container' => '',
              'container_class' => '',
              'container_id' => '',
              'menu_class' => 'submenu',
              'menu_id' => '',
              'echo' => true,
              'fallback_cb' => 'wp_page_menu',
              'before' => '',
              'after' => '',
              'link_before' => '',
              'link_after' => '',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth' => 0,
              'walker' => '',
            ]);
            ?>
          </div>
        </div>
      </li>
      <div class="line"></div>
    </ul>

  </nav>
  <div id="nav-trigger" class="nav-trigger open">
    <span class="line-burger"></span>
    <span class="line-burger"></span>
    <span class="line-burger"></span>
  </div>
  <div class="header-contacts">
    <div class="phone">
      <?php
      $args = array(
        'numberposts' => 1,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => 'contact',
        'suppress_filters' => true,
      );

      $posts = get_posts($args);

      foreach ($posts as $post) {
        setup_postdata($post);
        ?>
        <a href="tel:<?php the_field('contact_number'); ?>" class="text"><?php the_field('contact_number'); ?></a>
        <?php
      }
      wp_reset_postdata(); // сброс
      ?>
    </div>
    <div class="header-btn">
      <button class="showForm">Связаться с нами</button>
    </div>
  </div>

</header>

<!-- MODAL -->
<div id="modal-catalog" class="modal-container">
  <!-- <div class="overlay"> -->
  <div class="modal">
    <?php
    $args = array(
      'numberposts' => -1,
      'orderby' => 'date',
      'order' => 'DESC',
      'post_type' => 'catalog',
      'suppress_filters' => true,
    );

    $posts = get_posts($args);
    foreach ($posts as $post) {
      setup_postdata($post);
      $cat_ID = $post->ID;
      ?>
      <div class="modal-content">
        <a href="<?php the_permalink($cat_ID); ?>"><img
            src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>"
            alt="<?php the_title(); ?>"></a>
        <h2><a href="<?php the_permalink($cat_ID); ?>"><?php the_title(); ?></a></h2>
        <ul>
          <?php
          $args = array(
            'numberposts' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_type' => 'product',
            'suppress_filters' => true,
          );

          $posts = get_posts($args);

          foreach ($posts as $post) {
            setup_postdata($post);
            $product_ID = get_field('product_category');

            if ($cat_ID == $product_ID) {
              ?>
              <li><a href="<?php the_permalink(); ?>"><?php the_field('brand_name'); ?></a></li>
              <?php
            }
          }
          wp_reset_postdata(); // сброс
          ?>
          <li><a href="<?php the_permalink($cat_ID); ?>">Смотреть все</a></li>
        </ul>
      </div>
      <?php
    }
    wp_reset_postdata(); // сброс
    ?>
  </div>
  <!-- </div> -->
</div>

<!--end MODAL -->

<!-- <header class="header">
  <a class="header__logo" href="/">
    <img src="<?php echo get_template_directory_uri() . '/media/icon/logo.png'; ?>" alt="motodom">
  </a>
  <div class="header__address">
    <div class="address item">
      <div class="icon"></div>
      <div class="address__wrapper">
        <?php
$args = array(
  'numberposts' => -1,
  'orderby' => 'date',
  'order' => 'DESC',
  'post_type' => 'contact',
  'suppress_filters' => true,
);

$posts = get_posts($args);
$contact_count_head = 0;
foreach ($posts as $post) {
  setup_postdata($post);
  $contact_count_head++;
  ?>
          <div class="text <?php if ($contact_count_head == 1) {
    echo 'text--active';
  } ?>" data-tel="<?php the_field('contact_number'); ?>"><?php the_field('contact_address'); ?></div>
          <?php
}
wp_reset_postdata(); // сброс
?>
      </div>
      <div class="decor icon"></div>
    </div>
    <div class="phone item">
      <div class="icon"></div>
      <?php
$args = array(
  'numberposts' => 1,
  'orderby' => 'date',
  'order' => 'DESC',
  'post_type' => 'contact',
  'suppress_filters' => true,
);

$posts = get_posts($args);
$contact_count_head = 0;
foreach ($posts as $post) {
  setup_postdata($post);
  $contact_count_head++;
  $number = get_field('contact_number');
  $tel = preg_replace('/[^0-9]/', '', $number);
  ?>
        <a href="tel:<?php echo $number; ?>" class="text"><?php the_field('contact_number'); ?></a>
        <?php
}
wp_reset_postdata(); // сброс
?>
    </div>
  </div>
  <div class="header__menu-button">
    <span>Меню</span>
    <div class="hamburger">
      <div class="item"></div>
      <div class="item"></div>
      <div class="item"></div>
    </div>
  </div>
</header>
<div class="header-marg"></div> -->