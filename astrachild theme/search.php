<?php
get_header('inner'); ?>

<div class="inner-banner">
    <div class="container">
        <div class="bredcrum">
            <a class="home-icon" href="<?=site_url()?>">Home</a>
            <span>/</span> Search 
        </div>
        <div class="inner-title">
            <h1>Search</h1>
        </div>
    </div>
</div>
<div class="newscontent-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-9">
        <h3>Search Result for <?=$_GET['s']?></h3>
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
                    <h3 data-id="<?=get_the_ID()?>"><?= get_the_title() ?></h3>
                    <p><?= get_the_excerpt() ?></p>
                    <div class="latest-news-sec__inner-content__readmore">
                      <a href=""> <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/right-arrow.jpg"></a>
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
      asNavFor: '.vertical-center-4',
      dots: true,
      centerMode: false,

    });
   
    $(document).ready(function () {
        var $pagination = 1;
        var shouldExtend = true;
        var postArea = $('#Toonmeer');

           postArea.click(function(){
              console.log("btntest");
            if(shouldExtend == false)
            return true;

            $pagination++;
            $.ajax({ url: '<?= admin_url().'admin-ajax.php'?>' , method: 'POST', dataType: "JSON", data: { action: 'more_Search', 'query': '<?=$_GET['s']?>' ,pagination: $pagination } })
                .done(function (response) {
                if (response.status == 'success') {
                data = response.data;
                console.log("data");
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