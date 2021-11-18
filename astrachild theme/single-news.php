<?php

get_header('inner');

?>
<div class="inner-banner">
    <div class="container">
        <div class="bredcrum">
            <a class="home-icon" href="<?=site_url()?>">Home</a>
            <span>/</span> <?=get_the_title()?>
        </div>
        <div class="inner-title">
            <h1><?= get_the_title() ?></h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="blog-detail">
        <div class="blog-detail__inner">
            <div class="blog-detail__img">
                <img src="<?= get_the_post_thumbnail_url() ?>">
            </div>
            <div class="blog-detail__content">
                <h3><?php echo get_the_title(); ?></h3>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
  
</div>