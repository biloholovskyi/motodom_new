<?php get_header(); ?>
<?php $id_category = get_field('product_category'); ?>
<?php $under_subcategory = get_field('brand_subcategory'); ?>
<section class="page-catalog page-catalog--inner">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="page-catalog__bread">
          <a href="/">Главная</a> > <a href="<?php echo get_the_permalink($id_category); ?>"><?php echo get_the_title($id_category); ?></a> > <?php the_field('brand_name'); ?>
        </div>
        <div class="page-catalog__title"><?php the_field('brand_name'); ?></div>
      </div>
    </div>
  </div>
  <div class="page-catalog__category">
    <div class="page-catalog__category__wrapper">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="list">
              <?php
              $args = array(
                'numberposts' => -1,
                'orderby' => 'date',
                'order' => 'DESC',
                'post_type' => 'subcategory',
                'suppress_filters' => true,
              );

              $posts = get_posts($args);
              $subcategory_count = 0;

              foreach ($posts as $post) {
                setup_postdata($post);
                $subcategory_count++;
                ?>
                <div id="<?php echo $post->ID; ?>" class="item"><?php the_title(); ?></div>
                <?php
              }
              wp_reset_postdata(); // сброс
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <?php
      $args = array(
        'numberposts' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => 'item',
        'suppress_filters' => true,
      );

      $posts = get_posts($args);
      $brand_ID = get_the_ID();

      foreach ($posts as $post) {
        setup_postdata($post);
        $item_brand = get_field('item_brand');
        $item_subcategory = get_field('item_subcategory');

        if ($brand_ID == $item_brand->ID) {
          ?>
          <div class="col-6 col-md-4 <?php echo 'sub-'.$item_subcategory->ID; if(!$under_subcategory) { echo ' hidden-col'; } ?>">
            <a href="<?php the_permalink(); ?>" class="page-catalog__item">
              <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="item">
              <span class="name"><?php the_title(); ?></span>
              <?php $price = get_field('item_price'); ?>
              <span class="price"><?php if($price) {echo 'От '.$price.'  рублей';} else {echo 'Цена по&nbsp;запросу';} ?></span>
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
<script>
  $(document).ready(function () {
    let sub = [];
    <?php
    $args = array(
      'numberposts' => -1,
      'orderby' => 'date',
      'order' => 'DESC',
      'post_type' => 'item',
      'suppress_filters' => true,
    );

    $posts = get_posts($args);
    $brand_ID_push = get_the_ID();

    foreach ($posts as $post) {
    setup_postdata($post);
    $item_brand_push = get_field('item_brand');
    $item_sub = get_field('item_subcategory');
    if($item_brand_push->ID == $brand_ID_push) {
    ?>
    sub.push('<?php echo $item_sub->ID; ?>');
    <?php
    }

    }
    wp_reset_postdata(); // сброс
    ?>

    for(let i = 0; i < sub.length; i++) {
      $('#' + sub[i]).addClass('item--show');
    }

    let active = $('.item--active');

    if(active.length < 1) {
      $('.item--show').eq(0).addClass('item--active');
    }
    $('.sub-' + $('.item--active').attr('id')).removeClass('hidden-col');
    console.log('.sub-' + $('.item--active').attr('id'));

    $('.page-catalog__category .list .item').on('click', switchSub);
  });

  function switchSub() {
    let items = $('.page-catalog__category .list .item');
    items.removeClass('item--active');
    $(this).addClass('item--active');

    let id = $(this).attr('id');
    $('.page-catalog__item').parent('div').addClass('hidden-col');
    $('.sub-' + id).removeClass('hidden-col');
  }
</script>
