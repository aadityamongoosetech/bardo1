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
    <div class="agenda-detail">
      <div class="row">
        <div class="col-sm-9">
          <div class="agenda-detail__back"><a href="<?= site_url('agenda') ?>">Terug naar het overzicht</a></div>
          <div class="row">
            <div class="col-sm-2">
              <div class="agenda-detail__dateshow">
                <?php echo date('j M', strtotime(get_post_meta(get_the_ID(), 'meta-agenda-date', true))); ?>
              </div>
            </div>
            <div class="col-sm-10">
              <div class="agenda-detail__content">
                <h2><span><?= get_the_title() ?></span></h2>
                <?php the_content() ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="agenda-detail__sidebar">
            <div class="agenda-detail__see">
              <h3>See Also</h3>
              <?php
              $args = array(
                "post_type" => "agenda",
                "posts_per_page" => 2,
                "post__not_in" => [get_The_ID()],
                "order" => "DESC"
              );
              $query = new WP_Query($args);
              while ($query->have_posts()) : $query->the_post(); 
                
              ?>
                <div class="agenda-detail__see--date">
                  <span>
                    <?php echo date('j M', strtotime(get_post_meta(get_the_ID(), 'meta-agenda-date', true))); ?>
                  </span>
                  <div>
                    <h5><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a></h5>
                    <p><?= agenda_one_line(get_the_ID()) ?></p>
                  </div>
                </div>

            </div>
          <?php endwhile; ?>
          <h3>Related Links</h3>
          <ul>
            <li><a href="">Scholingen voor professionals</a></li>
            <li><a href="">Publieksbijeenkomsten</a></li>
            <li><a href="">Met de dood aan tafel</a></li>
            <li><a href="">Agenda Leerhuis</a></li>
            <li><a href="">Bardo Leest</a></li>
            <li><a href="">Het Leerhuis huren</a></li>
            <li><a href="">Publicaties</a></li>
          </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
<!-- Bootstrap core JS-->