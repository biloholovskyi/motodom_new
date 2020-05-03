<?php get_header(); ?>
<?php $eq_brand = get_field('Eq_subcategory'); ?>
<?php
$eq_category = get_field('eq_category', $eq_brand->ID);
$eq_category = get_post($eq_category);
?>


<section class="page-catalog page-catalog--inner page-catalog--last">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="page-catalog__bread">
          <a href="/">Главная</a> > <a href="<?php the_permalink($eq_category->ID); ?>"><?php echo $eq_category->post_title; ?></a> > <a href="<?php the_permalink($eq_brand->ID); ?>"><?php echo $eq_brand->post_title; ?></a> > <?php the_title(); ?>
        </div> 
        <div class="page-catalog__title"><?php the_title(); ?></div>
        <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="motodom" class="page-catalog--last__img page-catalog--last__img--mobile">
        <div class="page-catalog__small-desc"><?php the_field('small_desc'); ?></div>
        <div class="page-catalog--last__btn-wrapper">
          <div class="page-catalog--last__btn showForm">Забронировать бесплатно</div>
          <?php $eq_price = get_field('eq_price'); ?>
          <div class="page-catalog--last__price"><?php if($eq_price) {echo $eq_price.'  руб';} else {echo 'Цена по&nbsp;запросу';} ?></div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="motodom" class="page-catalog--last__img">
      </div>
      <div class="col-12">
        <div class="page-catalog--last__nav">
          <div class="item item--active">Описание</div>
          <a target="_blank" href="<?php the_field('eq_tech'); ?>" class="item">Технические характеристики</a>
          <a target="_blank" href="<?php the_field('eq_doc'); ?>" class="item">Документация</a>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="container">
  <div class="row">
    <div class="col-12 col-md-8 offset-md-2">
      <div class="main-desc">
        <div class="main-desc__title">Описание</div>
        <div class="main-desc__text"><?php the_field('eq_desc'); ?></div>
      </div>
    </div>
  </div>
</div>



<section class="page-catalog page-catalog--inner last-border">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-8 offset-lg-2">
        <div class="page-catalog--last__title-more">Также вас могут заинтересовать</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-2"></div> 
        <div id="owl-two" class="owl-carousel owl-theme owl-equipment">
      <?php
      $args = array(
        'numberposts' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => 'equipment_item',
        'suppress_filters' => true,
      );

      $posts = get_posts($args);
      $count = 0;
      $eq_curr_id = get_the_ID();

      foreach ($posts as $post) {
        setup_postdata($post);
        $eq_brand = get_field('Eq_subcategory');

        if ($eq_brand->ID == $eq_brand->ID and $eq_curr_id != $post->ID) { 
          $count++;
          ?>
          <div class="item">
            <div class="col-12 ">
                  <a href="<?php the_permalink(); ?>" class="page-catalog__item">
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="item">
                    <span class="name"><?php the_title(); ?></span>
                    <?php $eq_price = get_field('eq_price'); ?>
                    <span class="price"><?php if($eq_price) {echo 'От '.$eq_price.'  рублей';} else {echo 'Цена по&nbsp;запросу';} ?></span>
                  </a>
              </div>
          </div>
          <?php
        }
      }
      wp_reset_postdata(); // сброс
      ?>
        </div>
    </div>
  </div>
</section>

<section class="tabs">
<?php
$tabs_img1 = get_field( 'serv_photo' );
$tabs_img2 = get_field( 'educ_photo' );
?>
  <div class="tabs-container banner-container">
    <div id="tabs">
        <div class="tabContent tab_block banner-block">
          <img src="<?php echo $tabs_img1; ?>" alt="">
            <div class="tabs_text">
              <h1><?php the_field('serv_title'); ?></h1>
            <p><?php the_field('serv_text'); ?></p>
            <button><a href="<?php the_field('banner1_btn'); ?>">Подробнее</a></button>
            </div>
        </div>
        <div class="tabContent tab_block-1 banner-block">
        <img src="<?php echo $tabs_img2; ?>" alt="">
          <div class="tabs_text">
            <h1><?php the_field('educ_title'); ?></h1>
          <p><?php the_field('educ_text'); ?></p>
          <button>Подроб</button>
          </div>
        </div>
    </div>
</div>
<div class="tabs-container banner-container">
    <div id="tabs">
        <div class="tabContent tab_block-1 banner-block">
        <img src="<?php echo $tabs_img2; ?>" alt="">
          <div class="tabs_text">
            <h1><?php the_field('educ_title'); ?></h1>
          <p><?php the_field('educ_text'); ?></p>
          <button><a href="<?php the_field('banner2_btn'); ?>">Подробнее</a></button>
          </div>
        </div>
    </div>
</div>
</section>

<section class="nearby" style="background-color: #fff">
  <div class="nearby-wrap">
        <div class="nearby-content">
          <div class="nearby-text">
              <h2>Выберите ближайший Мотодом</h2>
              <button>Выбрать</button>
          </div>
        </div>
        <div class="nearby-content">
              <section class="form">
                <div class="container">
                  <div class="row">
                    <div class="col-12">
                      <div class="form__title">Остались вопросы? <br> Напишите нам </div>
                    </div>
                  </div>
                    <div class="row">
                    <div class="col-12">
                      <form id="contact-form">
                        <div class="input-wrapper input-wrapper--name">
                          <input type="text">
                        </div>
                        <div class="input-wrapper input-wrapper--email">
                          <input type="text">
                        </div>
                        <input type="submit" class="submit form-submit" value="Оставить заявку">
                      </form>
                      <p>Нажимая кнопку Подробнее” вы соглашаетесь с <span>Политикой обработки<br>персональных данных сайта</span></p>
                    </div>
                  </div>
                </div>
              </section>
        </div>
  </div>
</section>

<?php get_footer(); ?>

