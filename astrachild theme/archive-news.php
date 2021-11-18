<?php
get_header('inner'); 
?>
<div class="banner news-banner">
  <section class="regular slider">
    <div>
      <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/news-banner-img1.jpg">
      <div class="regulaer-slide-pos">
        <div class="container">
          <div class="row">
            <div class="col-sm-7">
              <div class="news-mainbanner-content">
                <p>Be printing and typesetting industry. Lorem Ipsum has been theindustry's standard
                  dummy text ever since the 1500s, when an</p>
                <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div>
      <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/news-banner-img1.jpg">
      <div class="regulaer-slide-pos">
        <div class="container">
          <div class="row">
            <div class="col-sm-7">
              <div class="news-mainbanner-content">
                <p>Be printing and typesetting industry. Lorem Ipsum has been theindustry's standard
                  dummy text ever since the 1500s, when an</p>
                <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div>
      <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/news-banner-img1.jpg">
      <div class="regulaer-slide-pos">
        <div class="container">
          <div class="row">
            <div class="col-sm-7">
              <div class="news-mainbanner-content">
                <p>Be printing and typesetting industry. Lorem Ipsum has been theindustry's standard
                  dummy text ever since the 1500s, when an</p>
                <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div>
      <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/news-banner-img1.jpg">
      <div class="regulaer-slide-pos">
        <div class="container">
          <div class="row">
            <div class="col-sm-7">
              <div class="news-mainbanner-content">
                <p>Be printing and typesetting industry. Lorem Ipsum has been theindustry's standard
                  dummy text ever since the 1500s, when an</p>
                <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="news-section">
    <div class="container relative">
      <div class="news-sidebar">
        <h2>Trending News</h2>
        <div class="newsright-slider">
          <section class="vertical-center-4 slider">
            <?php
            $args = array(
              'post_type' => 'news',
              'post_per_page' => 4,
              'order' => 'DESC',
              'meta_query' => array(
                array(
                  'key' => 'meta-news-trending',
                  'value' => 'yes'
                )
              )
            );
              
            $featured_newses = new WP_Query($args);
            while ($featured_newses->have_posts()) :
              $featured_newses->the_post();
       
            ?>
              <div>
                <div class="new-sep">
                  <div class="row">
                    <div class="col-sm-3">
                      <img src="<?= get_the_post_thumbnail_url() ?>">
                    </div>
                    <div class="col-sm-9">
                      <h3><?= get_the_title() ?></h3>
                      <p><?= agenda_one_line(get_the_ID()) ?></p>
                   
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </section>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="news-bred-crum">
  <div class="container">
    <div class="bredcrum">
      <a class="home-icon" href="<?= site_url() ?>">Home</a>
      <span>/</span> News
    </div>
  </div>
</div>
<div class="newscontent-sec">
  <div class="container">

    <div class="recent-news">
      <div class="row">
        <div class="col-sm-6">
          <p>Be printing and typesetting industry. Lorem Ipsum has beensetting</p>
        </div>
        <div class="col-sm-6">
          <p>Be printing and typesetting industry. Lorem Ipsum has beensetting</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-9">
        <h3>Latest News</h3>
        <div class="latest-news-sec">
          <?php
       
          while (have_posts()) :
            the_post();
          ?>
            <div class="latest-news-sec__inner">
              <div class="row">
                <div class="col-sm-3">
                  <a href=""> <img src="<?= get_the_post_thumbnail_url() ?>"></a>
                </div>
                <div class="col-sm-9">
                  <div class="latest-news-sec__inner-content">
                    <div class="latest-news-sec__inner-content__img">
                      <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/icon-tr.png">
                    </div>
                    <h3><?= get_the_title() ?></h3>
                    <p><?= get_the_excerpt() ?></p>
                    <div class="latest-news-sec__inner-content__readmore">
                      <a href="<?=get_the_permalink();?>"> <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/right-arrow.jpg"></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
        <div class="text-center">
          <a  href="JavaScript:void(0)" id="Toonmeer" class="primary_btn">
            Toon meer
          </a>
        </div>
      </div>
      <div class="col-sm-3">
        <h3>Featured News</h3>
        <div class="featured-news-sec">
          <ul>
            <?php
            $args = array(
              "post_type" => "news",
              'meta_query' => array(
                array(
                  'key' => 'meta-news-featured',
                  'value' => 'yes'
                )
              ),
              'posts_on_page' => 5
            );
            $query = new WP_Query($args);
            while ($query->have_posts()) :
              $query->the_post();
               
            ?>
              <li>
                <a href="<?= get_the_permalink() ?>">
                  <?= get_the_title() ?>
                </a>
              </li>
            <?php endwhile; ?>
          </ul>
        </div>
        <div class="facebook-post">
          <h3>Facebook Post</h3>
          <div class="facebook-post__inner"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  (function($) {
    $(".regular").slick({
      arrows: false,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      /*asNavFor: '.vertical-center-4',*/
      dots: true,
      //  centerMode: true,

    });
   
    $(document).ready(function () {
        var $pagination = 1;
        var shouldExtend = true;
        var postArea = $('#Toonmeer');

           postArea.click(function(){
            if(shouldExtend == false)
            return true;

            $pagination++;
            $.ajax({ url: '<?= admin_url().'admin-ajax.php'?>' , method: 'POST', dataType: "JSON", data: { action: 'more_news', pagination: $pagination } })
                .done(function (response) {
                if (response.status == 'success') {
                data = response.data;
                if(data!='')
                {
                    $('.latest-news-sec').append(data);
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

<?php get_footer(); ?>