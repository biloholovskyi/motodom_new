<?php
/*
Template Name: school
*/
?>
<?php get_header(); ?>
<?php $schoolimg = get_field ('school-title-img'); ?>
<section class="school-page">
  <div class="img-block">
    <img class="photo-bg" src="<?php echo $schoolimg; ?>" alt="motodom">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="school-page-title">
          <h1><?php the_field('school-title'); ?></h1>
          <p><?php the_field('school-title-text'); ?></p>
        </div>
      </div>
    </div>
  </div>
  <?php $schoolimg1 = get_field ('school-block-img'); ?>
  <div class="school-block">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-5 col-md-6">
          <div class="about-page-content order-lg-last order-firts">
            <img src="<?php echo $schoolimg1; ?>" alt="img">
          </div>
        </div>
        <div class="col-12 col-lg-7 col-md-6 order-lg-firts order-last">
          <div class="school-page-content">
            <div class="school-text">
              <h2><?php the_field('school-block-title'); ?></h2>
              <p><?php the_field('school-block-text'); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php $schoolimg2 = get_field ('school-about-img1'); ?>
  <?php 
            $school = get_field ('school-about-1');
            $school2 = get_field ('school-about-2');
            $school3 = get_field ('school-about-3');
           
               
        ?>
  <div class="school-about">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="school-about-title">
            <h2>Для кого мы<br>создали школу</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-lg-4 school-col">
          <div class="about-school-content">
            <img src="<?php echo $school['school-about-img1']; ?>" alt="img">
            <h3><?php echo $school['school-about-title-1']; ?></h3>
            <p><?php echo $school['school-about-text-1']; ?></p>
          </div>
        </div>
        <div class="col-12 col-lg-4 school-col">
          <div class="about-school-content item">
            <img class="school-svg" src="<?php echo $school2['school-about-img2']; ?>" alt="img">
            <h3><?php echo $school2['school-about-title-2']; ?></h3>
            <p><?php echo $school2['school-about-text-2']; ?></p>
          </div>
        </div>
        <div class="col-12 col-lg-4 school-col">
          <div class="about-school-content">
            <img class="school-svg_1" src="<?php echo $school3['school-about-img3']; ?>" alt="img">
            <h3><?php echo $school3['school-about-title-3']; ?></h3>
            <p><?php echo $school3['school-about-text-3']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="school-slider">
    <div class="slider">
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
          'post_type' => 'school',
          'suppress_filters' => true,
        );
        $posts = get_posts($args);
        $slider_count = 0;
        foreach ($posts as $post) {
          setup_postdata($post);
          $slider_count++;
          if($slider_count == 1) {
            ?>
      <div class="item item--active" data-count="1">

        <div class="slider-img">

          <img src="<?php the_field( 'school-img' ); ?>" alt="">
        </div>
        <div class="slider-text">
          <h3><?php the_field( 'position' ); ?></h3>
          <h2><?php the_field( 'name_school' ); ?></h2>
          <p><?php the_field( 'shool_text' ); ?></p>
        </div>
      </div>
      <?php
          } else {
            ?>
      <div class="item">
        <div class="slider-img">

          <img src="<?php the_field( 'school-img' ); ?>" alt="">
        </div>
        <div class="slider-text">
          <h3><?php the_field( 'position' ); ?></h3>
          <h2><?php the_field( 'name_school' ); ?></h2>
          <p><?php the_field( 'shool_text' ); ?></p>
        </div>
      </div>
      <?php
          }
        }
        wp_reset_postdata(); // сброс
        ?>
    </div>
  </div>


  <section class="form">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="form__title" style="text-align: center">Остались вопросы? <br> Напишите нам </div>
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
            <input type="submit" class="submit" value="Оставить заявку">
          </form>
        </div>
      </div>
    </div>
  </section>
  <?php get_footer(); ?>