<?php get_header(); ?>
<section class="page-catalog page-catalog--page">
  <div class="container">
    <div class="row">
      <div class="col-12">
      <div class="page-catalog__bread">
          <a href="/">Главная</a><a href="<?php the_permalink($brand->ID); ?>"><?php echo $brand->post_title; ?></a> > <?php the_title(); ?>
        </div> 
        <div class="page-catalog__title"><?php the_title(); ?></div>
      </div>
    </div>
    <div class="row">
      <?php
      $args = array(
        'numberposts' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => 'product',
        'suppress_filters' => true,
      );

      $posts = get_posts($args);
      $category_ID = get_the_ID();

      foreach ($posts as $post) {
        setup_postdata($post);
        $product_ID = get_field('product_category');

        if($category_ID == $product_ID) {
          ?>
          <div class="col-6 col-md-4">
            <a href="<?php the_permalink(); ?>" class="page-catalog__item">
              <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="item">
              <span class="name"><?php the_field('brand_name'); ?></span>
            </a>
          </div>
          <?php
        }
      }
      wp_reset_postdata(); // сброс
      ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
