<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-3 order-last order-lg-first">
        <a href="/">
          <img src="<?php echo get_template_directory_uri().'/media/icon/logo.png'; ?>" alt="motodom" class="footer__logo">
        </a>
        <div class="footer__social">
          <?php
          $args = array(
            'numberposts' => -1,
            'orderby'     => 'date',
            'order'       => 'DESC',
            'post_type'   => 'social',
            'suppress_filters' => true,
          );

          $posts = get_posts( $args );
          foreach($posts as $post){ setup_postdata($post);
            ?>
            <a href="<?php the_field('all_link_social'); ?>" target="_blank" class="item" style="background-image: url(<?php the_field('all_icon'); ?>);"></a>
            <?php
          }
          wp_reset_postdata(); // сброс
          ?>
        </div>
        <div class="footer__coop">Мотодом © 2019. <br> Все права защищены</div>
      </div>
      <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <?php
        wp_nav_menu( [
          'theme_location'  => 'footer',
          'menu'            => '',
          'container'       => '',
          'container_class' => '',
          'container_id'    => '',
          'menu_class'      => '',
          'menu_id'         => '',
          'echo'            => true,
          'fallback_cb'     => 'wp_page_menu',
          'before'          => '',
          'after'           => '',
          'link_before'     => '',
          'link_after'      => '',
          'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'depth'           => 0,
          'walker'          => '',
        ] );
        ?>
      </div>
      <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-mb">
        <ul>
          <?php
          $args = array(
            'numberposts' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_type' => 'catalog',
            'suppress_filters' => true,
          );
          $posts = get_posts( $args );
          foreach ($posts as $post) {
            setup_postdata($post);
            ?>
            <li><a href="<?php the_permalink(); ?>" class="footer__link footer__link--last"><?php the_title(); ?></a></li>
            <?php
          }
          wp_reset_postdata(); // сброс
          ?>
        </ul>
      </div>
      <div class="col-12 col-lg-3">
        <ul>
          <?php
          $args = array(
            'numberposts' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_type' => 'doc',
            'suppress_filters' => true,
          );
          $posts = get_posts( $args );
          foreach ($posts as $post) {
            setup_postdata($post);
              ?>
              <li><a href="<?php the_field('footer_political'); ?>" target="_blank" class="footer__link footer__link--last">Политика конфиденциальности</a></li>
              <li><a href="<?php echo get_field('footer_details'); ?>" target="_blank" class="footer__link footer__link--last">Реквизиты компании</a></li>
              <?php
          }
          wp_reset_postdata(); // сброс
          ?>
        </ul>
      </div>
    </div>
  </div>
</footer>

<div class="modal-form modal-form--form">
  <div class="container">
    <div class="row">
      <div class="col-12" style="position: relative">
        <div class="modal-form__logo"></div>
        <div class="modal-form__close"><span>закрыть</span><div class="modal-form__close__icon"></div></div>
      </div>
    </div>
  </div>
  <section class="form">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="form__title">Остались вопросы? <br> Напишите нам </div>
        </div>
        <div class="col-12 col-md-6">
          <form id="modal-form">
            <div class="input-wrapper input-wrapper--name">
              <input type="text" id="input-name-modal">
            </div>
            <div class="input-wrapper input-wrapper--email">
              <input type="text" id="input-tel-modal">
            </div>
            <input type="submit" class="submit" value="Оставить заявку">
            <div class="form-text">Нажимая на кнопку, вы соглашаетесь с политикой обработки персональных данных</div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="alert-modal">
  <div class="alert-modal__body">
    <p>Спасибо!</p>
    <p>Ваша заявка отправлена. Мы свяжемся с вами в ближайшее время</p>
  </div>
</div>

<div class="modal-form modal-form--nav">
  <div class="container">
    <div class="row">
      <div class="col-12" style="position: relative">
        <div class="modal-form__logo"></div>
        <div class="modal-form__close"><span>закрыть</span><div class="modal-form__close__icon"></div></div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-6 nav-modal__menu">
        <?php
        wp_nav_menu( [
          'theme_location'  => 'header',
          'menu'            => '',
          'container'       => '',
          'container_class' => '',
          'container_id'    => '',
          'menu_class'      => '',
          'menu_id'         => '',
          'echo'            => true,
          'fallback_cb'     => 'wp_page_menu',
          'before'          => '',
          'after'           => '',
          'link_before'     => '',
          'link_after'      => '',
          'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'depth'           => 0,
          'walker'          => '',
        ] );
        ?>
      </div>
      <div class="col-12 col-lg-6 nav-modal__catalog">
        <div class="nav-modal__title">Каталог</div>
        <ul>
          <ul>
            <?php
            $args = array(
              'numberposts' => -1,
              'orderby' => 'date',
              'order' => 'DESC',
              'post_type' => 'catalog',
              'suppress_filters' => true,
            );
            $posts = get_posts( $args );
            foreach ($posts as $post) {
              setup_postdata($post);
              ?>
              <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
              <?php
            }
            wp_reset_postdata(); // сброс
            ?>
        </ul>
              <div class="header-btn modal-KD">
                <button class="showForm">Связаться с нами</button>
              </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<?php wp_footer(); ?>

</body>
</html>