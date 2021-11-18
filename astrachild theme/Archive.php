<?php


get_header('inner');
$topPostid = 0;
$args = array(
                'post_type' => 'POST',
                'posts_per_page' => 1,
                'order_by' => 'DESC'
            );
$query =  new wp_Query($args);

?>
<!-- Navigation-->
<div class="inner-banner">
    <div class="container">
        <div class="bredcrum">
            <a class="home-icon" href="<?=site_url()?>">Home</a>
            <span>/</span> Blog
        </div>
        <div class="inner-title">
            <h1>Blog</h1>
        </div>
    </div>
</div>


<div class="inner-content">
    <div class="container">
        <div class="inner-sec__row">
            <div class="row">
                <div class="col-sm-9">
                    <?php while($query->have_posts()): $query->the_post(); $topPostid = get_the_ID()?>
                    <div class="blog-inner-content">
                        <div class="blog-inner-content__img">
                            <img src="<?=get_the_post_thumbnail_url()?>">
                        </div>
                        <div class="inner-content__box">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="blog-inner-content__user">
                                        <?php the_author(); ?>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <span><?php the_date('M j, Y') ?></span>
                                </div>
                            </div>
                            <div class="cnt_icon">
                                <h3><?php the_title(); ?></h3>
                                <p> <?php the_content();?> </p>
                                <div class="emial-marketing">
                                    <a href="">
                                        Email Marketing
                                    </a>
                                </div>
                                <a href="<?=get_the_permalink()?>" class="primary_btn">
                                    Lees meer
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>    
                </div>
                <div class="col-sm-3">
                    <div class="inner-content__img">
                        <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/blog-video-img.jpg">
                    </div>
                </div>
            </div>
        </div>

        <div class="never-belive">
            <div class="never-belive__inner">
                <div class="never-belive__content">
                    Never believe that a few caring people can't
                    change the world. ...
                </div>
                <div class="never-belive__call">
                    <a href="" class="primary_btn">
                        Contact US
                    </a>
                </div>
            </div>
        </div>

        <div class="blog-page-sec">
            <div class="blog-sec">
                <h2>Latest Posts</h2>
                <div class="row" >
                    <?php

                    $args = array(
                        'post_type' => 'POST',
                        'post__not_in' => [$topPostid],
                        'posts_per_page' => 8
                    );
                    $query1 =  new wp_Query($args);
                    while ($query1->have_posts()) : $query1->the_post();
                   
                    ?>
                        <div class="col-sm-3">
                            <div class="blog-sec__inner">
                                <div class="blog-sec__img">
                                    <img src="<?= get_the_post_thumbnail_url() ?>">
                                </div>
                                <div class="blog-sec__content">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="blog-inner-content__user">
                                                <?= get_the_author(); ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 text-right">
                                            <span><?= get_the_time('F d, Y') ?></span>
                                        </div>
                                    </div>
                                    <h3><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a></h3>
                                    <p><?= agenda_one_line(get_the_ID()) ?></p>
                                    <div class="emial-marketing">
                                        <a href="<?= get_the_permalink() ?>">
                                            Email Marketing
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>

                </div>
                <div class="text-center">
                    <a href="JavaScript:void(0)" class="primary_btn large_btn" id="Toonmeer">
                        Toon meer
                    </a>
                </div>
            </div>
        </div>

        <div class="explore-topic-sec">
            <div class="text-center">
                <h2>Explore More Topics</h2>
            </div>
            <?php
            ?>
            <ul>
                <li class="explore-topic-sec__clr1">
                    <a href="">Customer Experience</a>
                </li>
                <li class="explore-topic-sec__clr2">
                    <a href="">Customer Experience</a>
                </li>
                <li class="explore-topic-sec__clr3">
                    <a href="">Customer Experience</a>
                </li>
                <li class="explore-topic-sec__clr4">
                    <a href="">Customer Experience</a>
                </li>
                <li class="explore-topic-sec__clr5">
                    <a href="">Customer Experience</a>
                </li>
                <li class="explore-topic-sec__clr6">
                    <a href="">Customer Experience</a>
                </li>
                <li class="explore-topic-sec__clr7">
                    <a href="">Customer Experience</a>
                </li>
            </ul>
        </div>

    </div>

</div>

<!-- Footer-->

<script>
  (function($){
    $(document).ready(function () {
        var $pagination = 1;
        var shouldExtend = true;
        var postArea = $('#Toonmeer');

           postArea.click(function(){
            if(shouldExtend == false)
            return true;

            $pagination++;
            $.ajax({ url: '<?= admin_url().'admin-ajax.php'?>' , method: 'POST', dataType: "JSON", data: { action: 'more_post', pagination: $pagination } })
                .done(function (response) {
                if (response.status == 'success') {
                data = response.data;
                if(data!='')
                {
                    $('.blog-sec').find('.row').eq(0).append(data);
                    shouldExtend = true;
                    $blogSec = $('#Toonmeer').position().top;
                }
                else{
                    shouldExtend = false
                }
                }
            })
          });
    });
})(jQuery);
</script>
top_rightbar innerrightbar
<?php get_footer(); ?>
