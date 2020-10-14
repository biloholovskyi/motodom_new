<?php
/*
Template Name: about_new
*/
?>
<?php get_header(); ?>
<section class="about-page">
  <img class="photo-bg" src="<?php echo get_template_directory_uri() . '/media/image/about-img.png'; ?>" alt="motodom">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="about-page-title">
          <h1><?php the_field('about-title'); ?></h1>
          <p><?php the_field('title-desc'); ?></p>
        </div>
      </div>
    </div>
  </div> 



  <?php
$block_1img = get_field( 'block_1-img' );
$block_2img = get_field( 'block_2-img' );

?>
  <div class="about-block">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-5 col-md-5">
          <div class="about-page-content order-lg-last order-firts">
            <img src="<?php echo $block_1img; ?>" alt="image">
          </div>
        </div>
        <div class="col-12 col-lg-7 col-md-7 order-lg-firts order-last">
          <div class="about-page-content">
            <div class="about-text">
              <h2><?php the_field('block_1-title'); ?></h2>
              <p><?php the_field('block_1-text'); ?></p>
            </div>
          </div>
        </div>
      </div>
     </div>
  </div>
   
<div class="about-block">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-7 col-md-6 order-md-first order-lg-firts order-last">
        <div class="about-page-content">
          <div class="about-text">
            <h2><?php the_field('block_2-title'); ?></h2>
            <p><?php the_field('block_2-text'); ?></p>
            <button>Заполните анкету</button>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-5 col-md-6 order-md-last order-lg-last order-firts">
        <div class="about-page-content">
          <img src="<?php echo $block_2img; ?>" alt="">
        </div>
      </div>
    </div>
  </div>
</div>     
</section>
<?php get_footer(); ?>