<?php get_header(); ?>
<?php $id_eq_category = get_field('eq_category'); ?>
<?php $under_eq_subcategory = get_field('no_category'); ?>
<section class="page-catalog page-catalog--inner">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="page-catalog__bread">
          <a href="/">Главная</a> > <a href="<?php echo get_the_permalink($id_eq_category); ?>"><?php echo get_the_title($id_eq_category); ?></a> > <?php the_field('equip_subcategory_name'); ?>
        </div>
        <div class="page-catalog__title"><?php the_title(); ?></div>
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
                'post_type' => 'equipment_brand',
                'suppress_filters' => true,
              );

              $posts = get_posts($args);
              $eq_subcategory_count = 0;

              foreach ($posts as $post) {
                setup_postdata($post);
                $eq_subcategory_count++;
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
        'post_type' => 'equipment_item',
        'suppress_filters' => true,
      );

      $posts = get_posts($args);
      $eq_brand_ID = get_the_ID();

      foreach ($posts as $post) {
        setup_postdata($post);
        $eq_item_brand = get_field('Eq_subcategory');
        $eq_item_subcategory = get_field('eq_brand');

        if ($eq_brand_ID == $eq_item_brand->ID) {
          ?>
          <div class="col-6 col-md-4 <?php echo 'sub-'.$eq_item_subcategory->ID; if(!$under_eq_subcategory) { echo ' hidden-col'; } ?>">
            <a href="<?php the_permalink(); ?>" class="page-catalog__item">
              <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="item">
              <span class="name"><?php the_title(); ?></span>
              <?php $eq_price = get_field('eq_price'); ?>
              <span class="price"><?php if($eq_price) {echo 'От '.$eq_price.'  рублей';} else {echo 'Цена по&nbsp;запросу';} ?></span>
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
      'post_type' => 'equipment_item',
      'suppress_filters' => true,
    );

    $posts = get_posts($args);
    $eq_brand_ID_push = get_the_ID();

    foreach ($posts as $post) {
    setup_postdata($post);
    $eq_item_brand_push = get_field('Eq_subcategory');
    $eq_item_sub = get_field('eq_brand');
    if($eq_item_brand_push->ID == $eq_brand_ID_push) {
    ?>
    sub.push('<?php echo $eq_item_sub->ID; ?>');
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
