<?php
/*
Template Name: Contact
*/
?>
<?php
get_header();
?>

<section class="contact-page">
  <script src="https://api-maps.yandex.ru/2.1/?apikey=<ваш API-ключ>&lang=ru_RU" type="text/javascript"></script>
  <div class="container" style="max-width: 1200px;">
    <div class="row">
      <div class="col-12 col-lg-6" style="padding-right: 0; overflow: visible;">
        <div class="contact-page__wrapper">
        <div class="contact-page__title">
            <h1>Наши магазины</h1>
          </div>
        </div>
        <div class="contact-page__list">
          <?php
          $args = array(
            'numberposts' => -1,
            'orderby'     => 'date',
            'order'       => 'DESC',
            'post_type'   => 'contact',
            'suppress_filters' => true,
          );

          $posts = get_posts( $args );
          $contact_count = 0;
          foreach($posts as $post){ setup_postdata($post);
            $contact_count++;
            ?>
              <div class="item <?php if($contact_count == 1) { echo 'item--active'; } ?>" id="<?php echo $post->ID; ?>">
                <div class="name"><?php the_title(); ?></div>
                <div class="address"><?php the_field('contact_address'); ?></div>
                <div class="number"><?php the_field('contact_number'); ?></div>
              </div>
            <?php
          }
          wp_reset_postdata(); // сброс
          ?>
        </div>
      </div>
    </div>
  </div>
  <?php
  $args = array(
    'numberposts' => -1,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'post_type'   => 'contact',
    'suppress_filters' => true,
  );

  $posts = get_posts( $args );
  $contact_count_map = 0;
  foreach($posts as $post){ setup_postdata($post);
    $contact_count_map++;
    ?>
    <div class="contact-page__map <?php if($contact_count_map == 1) { echo 'contact-page__map--active'; } ?>" id="map-<?php echo $post->ID; ?>"></div>
    <?php
  }
  wp_reset_postdata(); // сброс
  ?>
</section>
<style>
  [class*="ymaps-2"][class*="-ground-pane"] {
    filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale");
    /* Firefox 3.5+ */
    -webkit-filter: brightness(100%) grayscale(100%) invert(80%);
    /* Chrome 19+ & Safari 6+ */
  }
</style>
<section class="form">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="form__title">Остались вопросы? <br> Напишите нам </div>
      </div>
      <div class="col-12 col-md-6">
        <form id="contact-form">
          <div class="input-wrapper input-wrapper--name">
            <input type="text" id="input-name">
          </div>
          <div class="input-wrapper input-wrapper--email">
            <input type="text" id="input-tel">
          </div>
          <input type="submit" class="submit" value="Оставить заявку">
          <div class="form-text">Нажимая на кнопку, вы соглашаетесь с политикой обработки персональных данных</div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
<script>
  ymaps.ready(init);
  function init(){
    <?php
    $args = array(
      'numberposts' => -1,
      'orderby'     => 'date',
      'order'       => 'DESC',
      'post_type'   => 'contact',
      'suppress_filters' => true,
    );

    $posts = get_posts( $args );
    foreach($posts as $post){ setup_postdata($post);
    ?>
      var myMap<?php echo $post->ID; ?> = new ymaps.Map("map-<?php echo $post->ID; ?>", {
        center: [<?php echo get_field('contact_coordination'); ?>],
        zoom: 17
      });

      myMap<?php echo $post->ID; ?>.behaviors.disable(['drag', 'scrollZoom', 'dblClickZoom']);

      myMap<?php echo $post->ID; ?>.controls
        .remove('trafficControl')
        .remove('fullscreenControl')
        .remove('rulerControl')
        .remove('typeSelector')
        .remove('searchControl')
        .remove('zoomControl')
        .remove('geolocationControl');

      var myPin<?php echo $post->ID; ?> = new ymaps.Placemark([<?php echo get_field('contact_coordination'); ?>],
        {
          balloonContentHeader: 'MOTODOM',
          balloonContentBody: 'MOTODOM',
          balloonContentFooter: 'MOTODOM',
          hintContent: 'MOTODOM'
        },
        {
          iconLayout: 'default#image',
          iconImageHref: '../wp-content/themes/motodom/media/icon/pin.png',
          iconImageSize: [83.14, 64],
          iconImageOffset: [0, 0]
        });

      myMap<?php echo $post->ID; ?>.geoObjects.add(myPin<?php echo $post->ID; ?>);
    <?php
    }
    wp_reset_postdata(); // сброс
    ?>
  }

  $(document).ready(function () {
    sizeMap();
  });

  $(window).resize(function () {
    sizeMap();
  });

  function sizeMap () {
    let windowWidth = $(window).width();
    let containerWidth = $('.container').width();
    let wrapper = $('.contact-page__wrapper').width();
    let mapWidth = windowWidth - ((windowWidth - containerWidth) / 2 + wrapper);

    // $('.contact-page__map').css('width', mapWidth + 'px');
  }
</script>
