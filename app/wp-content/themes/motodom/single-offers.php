
<?php get_header(); ?>
<section class="single-offer">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                    <div class="single-content">
                        <h1><?php the_field('offers-title'); ?></h1>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-12">
                    <div class="single-content">
                        <h3><?php the_field('offers-date'); ?></h3>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                    <div class="single-content">
                        <p><?php the_field('offers-text'); ?></p>
                    </div>
                </div>
              </div>
          </div>
          <div class="offer-img-wrap">
                <?php $img_offer = get_field ('offers-img'); ?>

                <img src="<?php echo $img_offer; ?>" alt="">
          </div>
      </section>
<?php get_footer(); ?>