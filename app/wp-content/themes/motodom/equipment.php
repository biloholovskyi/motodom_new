<?php
/*
Template Name: Equipment
*/
?>
<?php
get_header();
?>

<section class="page-catalog page-catalog--page">
  <div class="container">
    <div class="row">
    <div class="col-12">
      <div class="page-catalog__title">Экипировка</div>
    </div>
      <?php
      $args = array(
        'numberposts' => -1,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'post_type'   => 'equipment',
        'suppress_filters' => true,
      );

      $posts = get_posts( $args );
      foreach($posts as $post){ setup_postdata($post);  
        ?>
        <div class="col-6 col-md-4">
          <a href="<?php the_permalink(); ?>" class="page-catalog__item">
            <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" alt="item">
            <span class="name"><?php the_title(); ?></span>
          </a>
        </div>
        <?php
      }
      wp_reset_postdata(); // сброс
      ?>
    </div>
  </div>
</section>


<?php
get_footer();
?>