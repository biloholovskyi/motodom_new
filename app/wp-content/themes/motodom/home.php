<?php
/*
Template Name: Home
*/
?>
<?php
get_header();
?>

<div class="fix_home__wrapper">
  <section class="home fix_home">
    <img src="<?php echo get_template_directory_uri() . '/media/image/fix.svg' ?>" alt="icon" class="fix_bottom">
    <div class="slider">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="fix_slider__wrapper">
              <div class="slider__nav">
                <div class="prev"></div>
                <div class="slider__count">
                  <div class="cur">01</div>
                  <div class="fix_delimiter">/</div>
                  <div class="all">08</div>
                </div>
                <div class="next"></div>
              </div>
              <?php
              $args = array(
                'numberposts' => -1,
                'orderby' => 'date',
                'order' => 'DESC',
                'post_type' => 'slider',
                'suppress_filters' => true,
              );
              $posts = get_posts($args);
              $slider_count = 0;
              foreach ($posts as $post) {
                setup_postdata($post);
                $slider_count++;
                $slider_btn = get_field('slider_link');
                if ($slider_count == 1) {
                  ?>
                  <div class="item item--active"  data-img="<?php the_field('photo_slider'); ?>">
                    <div class="slaider-content">
                      <div class="name"><h1><?php the_field('slider-title'); ?></h1></div>
                      <div class="desc">
                        <p><?php the_field('slider-text'); ?></p>
                        <?php
                        if (strlen(get_field('slider_link'))) {
                          ?>
                          <a href="<?php the_field('slider_link'); ?>" class="fix_slider_link">Подробнее</a>
                          <?php
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                  <?php
                } else {
                  ?>
                  <div class="item" data-img="<?php the_field('photo_slider'); ?>">
                    <div class="slaider-content">
                      <div class="name"><h1><?php the_field('slider-title'); ?></h1></div>
                      <div class="desc">
                        <p><?php the_field('slider-text'); ?></p>
                        <?php
                        if (strlen(get_field('slider_link'))) {
                          ?>
                          <a href="<?php the_field('slider_link'); ?>" class="fix_slider_link">Подробнее</a>
                          <?php
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                  <?php
                }
              }
              wp_reset_postdata(); // сброс
              ?>
              <div class="slider_mobile_nav_fix">
                <div class="dot dot-active"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="catalog">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="catalog-title">
            <h2>Каталог</h2>
            <button onclick="location.href='<?php echo get_home_url(); ?>/catalog/'; ">Вся мототехника</button>
          </div>
        </div>
      </div>
      <div class="row">
        <?php
        $args = array(
          'numberposts' => -1,
          'orderby' => 'date',
          'order' => 'ASC',
          'post_type' => 'catalog',
          'suppress_filters' => true,
        );

        $posts = get_posts($args);
        $catalog_counter = 0;
        foreach ($posts as $post) {
          setup_postdata($post);
          $catalog_counter++;
          $cat_home_ID = $post->ID;
          $catalog_class = '';
          $category_status = get_field('category_status');
          if ($category_status == 'other') {
            $catalog_class = 'col-12 col-lg-4 col-md-6 catalog-grid';
          } else {
            $catalog_class = 'col-12 col-lg-8 catalog-grid';
          }
          ?>
          <div class="<?php echo $catalog_class; ?>">
            <div class="catalog-content item-1">
              <img src="<?php the_field('catagery_poster'); ?>" alt="<?php the_title(); ?>">
              <a href="<?php the_permalink($cat_home_ID); ?>"><h3><?php the_title(); ?></h3></a>

              <div onclick="location.href='<?php the_permalink($cat_home_ID); ?>'" class="item-hover">
                <ul class="list-hover">
                  <?php
                  $args = array(
                    'numberposts' => -1,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'post_type' => 'product',
                    'suppress_filters' => true,
                  );

                  $posts = get_posts($args);
                  $list_counter_fix = 0;
                  foreach ($posts as $post) {
                    setup_postdata($post);
                    $product_home_ID = get_field('product_category');

                    if ($cat_home_ID == $product_home_ID) {
                      $list_counter_fix++;
                      if ($list_counter_fix < 4) {
                        ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_field('brand_name'); ?></a></li>
                        <?php
                      }
                    }
                  }
                  wp_reset_postdata(); // сброс
                  ?>
                  <li><a href="<?php the_permalink($cat_home_ID); ?>">Смотреть все</a></li>
                </ul>
              </div>

            </div>
          </div>
          <?php
        }
        wp_reset_postdata(); // сброс
        ?>

      </div>
    </div>
  </section>

  <section class="tabs">
    <?php
    $tabs_img1 = get_field('serv_photo');
    $tabs_img2 = get_field('educ_photo');
    $tabs_img3 = get_field('equip_photo');
    ?>
    <div class="tabs-container">
      <div id="tabs">
        <div class="tab whiteborder">Сервис</div>
        <div class="line-1"></div>
        <div class="tab">Обучение</div>
        <div class="line-2"></div>
        <div class="tab">Экипировка</div>
        <div class="tabContent tab_block">
          <img src="<?php echo $tabs_img1; ?>" alt="">
          <div class="tabs_text">
            <h1><?php the_field('serv_title'); ?></h1>
            <p><?php the_field('serv_text'); ?></p>
            <!-- <button>Подробнее</button> -->
          </div>
        </div>
        <div class="tabContent tab_block-1">
          <img src="<?php echo $tabs_img2; ?>" alt="">
          <div class="tabs_text">
            <h1><?php the_field('educ_title'); ?></h1>
            <p><?php the_field('educ_text'); ?></p>
            <!-- <button>Подробнее</button> -->
          </div>
        </div>
        <div class="tabContent tab_block-2">
          <img src="<?php echo $tabs_img3; ?>" alt="">
          <div class="tabs_text">
            <h1><?php the_field('equip_title'); ?></h1>
            <p><?php the_field('equip_text'); ?></p>
            <!-- <button>Подробнее</button> -->
          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="nearby">
    <div class="nearby-wrap">
      <div class="nearby-content">
        <div class="nearby-text">
          <h2>Выберите ближайший Мотодом</h2>
          <button onclick="location.href='<?php echo get_home_url(); ?>/contact/'; ">Выбрать</button>
        </div>
      </div>
      <div class="nearby-content">
        <section class="form">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="form__title">Остались вопросы? <br> Напишите нам</div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <form id="contact-form">
                  <div class="input-wrapper input-wrapper--name">
                    <input type="text" required>
                  </div>
                  <div class="input-wrapper input-wrapper--email">
                    <input type="text" required>
                  </div>
                  <input type="submit" class="submit form-submit" value="Оставить заявку">
                </form>
                <p>Нажимая кнопку “оставить заявку” вы соглашаетесь с
                  <span><a href="<?php the_field('politics_data'); ?>" target="_blank">Политикой обработки<br>персональных данных</a></span></p>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>
</div>

<?php get_footer(); ?>
<script>

  // TABS SCRIPT

  var tab;
  var tabContent;

  window.onload = function () {
    tabContent = document.getElementsByClassName('tabContent');
    tab = document.getElementsByClassName('tab');
    hideTabsContent(1);
    fixHomeSlider();
    createDots();
    document.querySelectorAll('.slider_mobile_nav_fix .dot').forEach(item => {
      item.addEventListener('click', (e) => clickDots(e));
    })
  };

  function hideTabsContent(a) {
    for (var i = a; i < tabContent.length; i++) {
      tabContent[i].classList.remove('show');
      tabContent[i].classList.add('hide');
      tab[i].classList.remove('whiteborder');
    }
  }

  document.getElementById('tabs').onclick = function (event) {
    var target = event.target;
    if (target.className == 'tab') {
      for (var i = 0; i < tab.length; i++) {
        if (target == tab[i]) {
          showTabsContent(i);
          break;
        }
      }
    }
  };

  function showTabsContent(b) {
    if (tabContent[b].classList.contains('hide')) {
      hideTabsContent(0);
      tab[b].classList.add('whiteborder');
      tabContent[b].classList.remove('hide');
      tabContent[b].classList.add('show');
    }
  }

  window.onresize = () => {
    fixHomeSlider();
  };

  const fixHomeSlider = () => {
    if (window.innerWidth > 575) {
      const imgH = document.querySelector('.fix_bottom').offsetHeight;
      const margin = imgH - 88;
      document.querySelector('.fix_home').style.height = `calc(100vh + ${imgH}px)`;
      document.querySelector('.fix_slider__wrapper').style.marginTop = '-' + margin + 'px';
    }
  };

  const createDots = () => {
    // очистить врапер
    $('.slider_mobile_nav_fix').html('');
    let counter = 0;
    // вывести доты
    document.querySelectorAll('.fix_slider__wrapper .item').forEach(slid => {
      counter++;
      if (counter === 1) {
        $('.slider_mobile_nav_fix').append('<div class="dot dot-active" data-img="' + slid.getAttribute('data-img') + '"></div>');
      } else {
        $('.slider_mobile_nav_fix').append('<div class="dot" data-img="' + slid.getAttribute('data-img') + '"></div>');
      }
    });
  };

  const clickDots = (e) => {
    document.querySelector('.dot-active').classList.remove('dot-active');
    e.target.classList.add('dot-active');
    $('.fix_home').css('background-image', 'url(' + e.target.getAttribute('data-img') + ')');
  }
</script>