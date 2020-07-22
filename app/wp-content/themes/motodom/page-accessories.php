<?php
/*
Template Name: Accessories
*/
get_header();
?>
  <section class="page-catalog page-catalog--page accessories-page">
  <div class="container">
    <div class="row">
    <div class="col-12">
      <div class="page-catalog__title">Аксессуары</div>
    </div>
                    <?php
	                    $acc = CFS()->get('accs');
	                    if (!empty($acc)) {
	                      foreach ($acc as $one_acc) {
		                      ?>
                           <div class="col-12 col-md-4">
                            <div class="item">
                              <img src="<?php echo $one_acc['logo_brend']; ?>" alt="img">
                              <?php
                              foreach ($one_acc['list'] as $doc) {
                                ?>
                                <a href="<?php echo $doc['file']; ?>" target="_blank" class="item__list"><?php echo $doc['name']; ?></a>
                                <?php
                                }
                              ?>
                            </div>
                          </div>
		                      <?php
	                      }
	                    }
	                  ?>

    </div>
  </div>
</section>
<?php
get_footer();