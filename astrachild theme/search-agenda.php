<?php
/*Template Name: agendatestpage*/
get_header('inner');
?>

<div class="inner-banner">
  <div class="container">
    <div class="bredcrum">
      <a class="home-icon" href="">Home</a>
      <span>/</span> Agenda
    </div>
    <div class="inner-title">
      <h1>AGENDA</h1>
    </div>
  </div>
</div>

<div class="inner-content">
  <div class="container">
    <div class="agenda-tool">
      <div class="agenda-tool__searcharea">
        <a href="<?= site_url('agenda') ?>" class="agenda-tool__back-arrow">
          Terug naar het overzicht
        </a>
        <span></span>
        <form action="<?= site_url('agenda') ?>" method="get">
          <input type="text" name="s" value="<?= isset($_REQUEST['s']) ? $_REQUEST['s'] : '' ?>">
        </form>
      </div>
      <div class="agenda-tool__divider"></div>
      <div class="agenda-tool__viewtool">
        <ul>
          <li>
            <a href=""><img src="<?= get_stylesheet_directory_uri() ?>/assets/images/list-icon.png"></a>
          </li>
          <li>
            <a href=""><img src="<?= get_stylesheet_directory_uri() ?>/assets/images/grid-icon.png"></a>
          </li>
        </ul>
      </div>
    </div>
    <div class="agenda-content">
      <div class="row">

        <div class="col-sm-3">
          <h2>Agenda</h2>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna </p>
        </div>
        <div class="col-sm-9">
          <?php
          $i = 1;
          while (have_posts()) :
            the_post();
            //  echo"<pre>";
            // print_r($query);


          ?>
            <div class="agenda-content__list">
              <div class="agenda-content__list--date agenda-content__list--clr<?= $i ?>">
                <?php echo date('j M', strtotime(get_post_meta(get_the_ID(), 'meta-agenda-date', true))); ?>
              </div>
              <div class="agenda-content__list--content">
                <div class="latest-news-sec__inner-content__img">
                  <img src="<?= get_the_post_thumbnail_url() ?>">
                </div>
                <h3><?= get_the_title(); ?></h3>
                <p><?= get_the_excerpt(); ?> </p>
              </div>
              <div class="agenda-content__list--icon">
                <a href="<?= get_the_permalink() ?>"> <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/right-arrow.jpg"></a>
              </div>

            </div>
            <?php $i = ($i == 1) ? 2 : 1; ?>
          <?php endwhile; ?>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer-->
<?php get_footer(); ?>
<!-- Bootstrap core JS-->