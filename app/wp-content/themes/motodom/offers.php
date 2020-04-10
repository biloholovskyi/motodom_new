<?php
/*
Template Name: offers
*/
?>
<?php get_header(); ?>
<section class="offers">
          <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="offers-title">
                        <h1>Акции</h1>
                    </div>
                </div>
            </div>
          </div>
        <div class="container">
            <div class="row">
            <?php $img_offers = get_field ('offers-img'); ?>
            <?php
		  $args = array(
			  'numberposts'      => -1, // если -1 то выводит все
			  'orderby'          => 'date',
			  'order'            => 'DESC',
			  'post_type'        => 'offers', // тип поста
			  'suppress_filters' => true,
		  );
          
		  $posts         = get_posts( $args );
		 
		  foreach ($posts as $post) {
			  setup_postdata( $post );
              ?>
              <?php $status_offers = get_field('status_offers'); ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="offers-item <?php if($status_offers == 'unactive'){echo 'offers-close';}?>">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php the_field('offers-img'); ?>" alt="<?php the_title(); ?>">
                            <h3><?php the_field('offers-date'); ?></h3>
                            <p><?php the_field('offers-title'); ?></p>
                        </a>
                    </div>
                </div>
                <?php
		     }
                wp_reset_postdata(); // сброс
                ?>
            </div>
        </div>
       <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="offers-btn">
<!--                    <button>Показать еще</button>-->
                </div>  
            </div>
        </div>
       </div>
      </section>
<?php get_footer(); ?>