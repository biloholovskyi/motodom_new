<?php
/*
Template Name: Home
*/
?>
<?php
get_header();
?>

<section class="home">
    <div class="slider">
      <div class="slider__nav">
        <div class="prev"></div>
        <div class="slider__count">
          <div class="cur">01</div>
          /
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
          if($slider_count == 1) {
            ?>
            <div class="item item--active">
           <img src="<?php the_field( 'photo_slider' ); ?>" alt="">
        <div class="slaider-content">
            <div class="name"><h1><?php the_field( 'slider-title' ); ?></h1></div>
            <div class="desc"><p><?php the_field( 'slider-text' ); ?></p>
              <button>Подробнее</button>
            </div>
        </div>
      </div>
            <?php
          } else {
            ?>
            <div class="item">
           <img src="<?php the_field( 'photo_slider' ); ?>" alt="">
        <div class="slaider-content">
            <div class="name"><h1><?php the_field( 'slider-title' ); ?></h1></div>
            <div class="desc"><p><?php the_field( 'slider-text' ); ?></p>
              <button>Подробнее</button>
            </div>
        </div>
      </div>
            <?php
          }
        }
        wp_reset_postdata(); // сброс
        ?>
     
    </div>
  </section>

<section class="catalog">
  <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="catalog-title">
            <h2>Каталог</h2>
            <button>Вся мототехника</button>
          </div>
        </div>
      </div>
      <div class="row">
        <?php
        $args = array(
          'numberposts' => -1,
          'orderby'     => 'date',
          'order'       => 'DESC',
          'post_type'   => 'catalog',
          'suppress_filters' => true,
        );

        $posts = get_posts( $args );
        $catalog_counter = 0;
        foreach($posts as $post){ setup_postdata($post);
          $catalog_counter++;
          $cat_home_ID = $post->ID;
          $catalog_class = '';
          $category_status = get_field('category_status');
          if($category_status == 'other') {
            $catalog_class = 'col-12 col-lg-4 col-md-6 catalog-grid';
          } else {
            $catalog_class = 'col-12 col-lg-8 catalog-grid';
          }
          ?>
          <div class="<?php echo $catalog_class; ?>">
            <div class="catalog-content item-1">
              <img src="<?php the_field('catagery_poster'); ?>" alt="<?php the_title(); ?>">
              <h3><?php the_title(); ?></h3>
              <div class="item-hover">
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

                    if($cat_home_ID == $product_home_ID) {
                      $list_counter_fix++;
                      if($list_counter_fix < 4) {
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
$tabs_img1 = get_field( 'serv_photo' );
$tabs_img2 = get_field( 'educ_photo' );
$tabs_img3 = get_field( 'equip_photo' );
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
            <button>Подробнее</button>
            </div>
        </div>
        <div class="tabContent tab_block-1">
        <img src="<?php echo $tabs_img2; ?>" alt="">
          <div class="tabs_text">
            <h1><?php the_field('educ_title'); ?></h1>
          <p><?php the_field('educ_text'); ?></p>
          <button>Подробнее</button>
          </div>
        </div>
        <div class="tabContent tab_block-2">
        <img src="<?php echo $tabs_img3; ?>" alt="">
          <div class="tabs_text">
            <h1><?php the_field('equip_title'); ?></h1>
          <p><?php the_field('equip_text'); ?></p>
          <button>Подробнее</button>
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
<script>
  $(document).ready(function () {
    let count = $('.main-block__logo .item').length;
    $('.main-block__count .all').html(' / 0' + count + ' ');

    setInterval( () => {
      const mainBlock = $('.main-block');

      // проверка отработала ли анимация
      if(mainBlock.attr('data-sliding') === 'false') {
        // для остановки переключение до завершения анимации
        mainBlock.attr('data-sliding', 'true');

        // все логотипы
        const all = $('.main-block__logo .item');
        const nextLogo = $('.main-block__logo .item--active').next('.item');
        // логотип по которому кликнули
        const current = nextLogo.length > 0 ? nextLogo : all.eq(0);

        // данные салйда
        const title = current.children('img').attr('alt');
        const desc = current.attr('data-desc');
        const index = current.attr('data-index');

        // меняем активный класс на логотипе
        all.removeClass('item--active');
        current.addClass('item--active');

        // меняем данные и счетчик
        $('.main-block__name').html(title);
        $('.main-block__desc').html(desc);
        $('.main-block__count .current').html('0' + index);

        // слайдер
        // слайд просто для того что бы у блока была высота
        // он всегда с opacity: 0;
        const first = $('.main-block__img--first');

        // текущий слайд
        const second = $('.main-block__img--second');
        const indexSecond = $(`#${second.attr('id')}`);

        // стартовая позиция слайда
        const startNextPosition = {
          'transform' : 'translate(200%, 200%) rotate(30deg)'
        };

        // получаем нужную картинку и присваиваем ей класс следующего слайда
        const next = $(`#img-${index}`);
        next.css(startNextPosition);
        next.addClass('main-block__img--next');

        // объекты анимация
        // анимация переключения текущего слайда
        const outAnim = {
          'transform' : 'translate(-200%, 200%) rotate(-30deg)',
          'opacity' : 0
        };

        // анимация появления нового слайда
        const inAnim = {
          'transform' : 'translate(0, 0) rotate(0)',
          'opacity' : '1'
        };

        const zero = {
          'transition' : 'all 0s'
        };

        second.css(outAnim);
        setTimeout(() => {
          next.css(inAnim);
        }, 100);

        // после отработки стартовой анимации
        setTimeout(() => {
          // удаляем стили текущему слайду и делаем его обычным слайдом
          second.css({
            ...zero,
            'transform' : 'translate(0, 0) rotate(0)'
          });
          second.removeClass('main-block__img--second');

          // меняем калссы следующего на текущий
          next.addClass('main-block__img--second').removeClass('main-block__img--next');
        }, 1100);

        // возвращаем все в исходное положение
        setTimeout(() => {
          // удаляем стили текущему слайду и делаем его обычным слайдом
          indexSecond.removeAttr('style');

          // удаляем стили новому слайду
          next.removeAttr('style');
        }, 1200);

        setTimeout(() => {
          mainBlock.attr('data-sliding', 'false');
        }, 1250);
      }
    }, 5000);
  })


// TABS SCRIPT

var tab;
var tabContent;

window.onload=function () {
    tabContent = document.getElementsByClassName('tabContent');
    tab = document.getElementsByClassName('tab');
    hideTabsContent(1);
}

function hideTabsContent(a) {
    for (var i=a; i<tabContent.length; i++){
        tabContent[i].classList.remove('show');
        tabContent[i].classList.add('hide');
        tab[i].classList.remove('whiteborder');
    }
}

document.getElementById('tabs').onclick=function (event) {
    var target=event.target;
    if (target.className =='tab') {
        for(var i=0; i<tab.length; i++){
            if(target == tab[i]){
                showTabsContent(i);
                break;
            }
        }
    }
}

function showTabsContent(b) {
    if(tabContent[b].classList.contains('hide')) {
        hideTabsContent(0);
        tab[b].classList.add('whiteborder');
        tabContent[b].classList.remove('hide');
        tabContent[b].classList.add('show');
    }
    
}


</script>