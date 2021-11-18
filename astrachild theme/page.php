<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 " id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="<?=site_url();?>"><img src="<?=get_stylesheet_directory_uri() ?>/assets/images/logo.png"></a>
                <div class="collapse navbar-collapse hidmenu innermenu" id="navbarResponsive">
                  <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <?php $navbar_items = wpse_nav_menu_2_tree(2);
                           foreach($navbar_items as $nav_item): ?>
                            <li class="nav-item"><a class="nav-link" href="<?=$nav_item->url?>"><?=$nav_item->title?></a>
                                <?php if(property_exists($nav_item,'wpse_children')): $secondLevel = []; ?>
                                <div class="dropdown-nav">
                                        <div class="dropinner">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="menu-accordion">
                                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                            <li id ="show">
                                                            <?php $firstLevelChild = $nav_item->wpse_children; 
                                                            //   echo "<pre>";
                                                            //   print_r($firstLevelChild);die();

                                                            $i = 0;
                                                            foreach($firstLevelChild as $key=>$fcItem): ?>
                                                            <li style="position: relative" class="displayChild displayChild-<?=$key?>" data-id="<?=$i?>"  <?php echo ($key==0);?>><a href="<?php echo  $fcItem->url;?>"><?php echo $fcItem->title; ?></a><?php echo property_exists($fcItem,'wpse_children')?'<span></span>':''?></li>
                                                            <?php if(property_exists($nav_item,'wpse_children')): 
                                                                    array_push($secondLevel,$fcItem->wpse_children);
                                                                endif;
                                                                ?> 
                                                            <?php $i++; endforeach; ?>
                                                            
                                                            </ul>    
                                                        </div>
                                                    </div>
                                                 
                                                    <div class="col-sm-9">
                                                        <div class="tab-content" id="myTabContent">
                                                            <div class="menu-row tab-pane fade show active"  role="tabpanel" aria-labelledby="menutab1">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                  

                                                                    <ul>
                                                                    <?php   
                                                                        foreach($secondLevel as $keyIO => $fcItemSObject): ?>
                                                                           <?php $flag = false; ?>
                                                                           <?php foreach($fcItemSObject as $fcItemS): ?>
                                                                           
                                                                            <li id="menutab1" class="levelSecond levelSecond-<?=$keyIO?>" style="display: <?php echo ($keyIO==0 || $flag==false)?'block':'none';?>"><a href="<?php echo $fcItemS->url; ?>"><div style="width: 90%; line-height:25px"><?php echo $fcItemS->title; ?></div><?php echo property_exists($fcItemS,'wpse_children')?'<span></span>':''; ?></a>
                                                                                <?php  if(property_exists($fcItemS,'wpse_children')): 
                                                                                    $fcItemT = $fcItemS->wpse_children;?>
                                                                                    <ul class="hide">   
                                                                                        <?php foreach($fcItemT as $fcItemTItem): ?>
                                                                                            <li><a href="<?php echo $fcItemTItem->url; ?>"><?php echo $fcItemTItem->title; ?></a></li>
                                                                                        <?php endforeach; ?>    
                                                                                    </ul>
                                                                                <?php  endif; ?>
                                                                            </li>
                                                                        <?php endforeach; ?>
                                                                        <?php if(is_array($fcItemSObject) && count($fcItemSObject) > 0 ): ?>
                                                                        <?php $flag = true; ?>
                                                                        <?php endif; ?>
                                                                       
                                                                    <?php endforeach; ?>
                                                                </ul>

                                                                </div>
                                                                <div class="col-sm-4 leftbr">
                                                                    <h4>Contact opnemen?</h4>
                                                                    <p>info@hospicebardo.nl</p>
                                                                    <p>020 – 333 47 00</p>
                                                                    <p>020 – 333 47 00</p>
                                                                    <a href="" class="primary_btn1"> Bel ons</a>
                                                                     
                                                                    
                                                                    <div class="menu-social-icon">
                                                                        <a href=""><img src="<?=get_stylesheet_directory_uri() ?>/assets/images/social-icon-1.jpg"></a>
                                                                        <a href=""><img src="<?=get_stylesheet_directory_uri() ?>/assets/images/social-icon-2.jpg"></a>
                                                                        <a href=""><img src="<?=get_stylesheet_directory_uri() ?>/assets/images/social-icon-3.jpg"></a>
                                                                        <a href=""><img src="<?=get_stylesheet_directory_uri() ?>/assets/images/social-icon-4.jpg"></a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 leftbr">
                                                                    <h4>Address</h4>
                                                                    <p>Stichting Bardo<br> Burgemeester Jansoniushof 11<br> 2131 BM Hoofddorp</p>
                                                                    <a href="" class="primary_btn1">
                                                                        Route plannen
                                                                    </a>
                                                                    <div class="menu-logo">
                                                                        <img src="<?=get_stylesheet_directory_uri() ?>/assets/images/logo.png">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            </div>
                                                            </div>                    
                                                </div>
                                            </div>
                                        </div>
                                </div>            
                            </li>
                                                               
                        <?php endif; ?>        
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="top_rightbar innerrightbar">
                    <ul>
                        <li>
                            <a href="" class="top_btn"><i class="fas fa-user"></i> Inloggen</a>
                        </li>
                        <li>
                            <a href="">Contact</a>
                        </li>
                        <li>
                            <div class="search_icon">
                                <img class="icon searchIcone" src="<?= get_stylesheet_directory_uri() ?>/assets/images/search.png" width="16">
                                                            
                            </div>
                         
                        </li>
                        <li>
                            <div class="toggle_menu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </li>
                    </ul>
                </div>
                <form action="/" method="get">
                   <div class="textclass1">                        
                        <input class="textclass hide" name="s" value="<?= isset($_REQUEST['s']) ? $_REQUEST['s'] : '' ?>" />  
                        </form>                      
                    </div>
            </div>
        </nav>



    <?php if (astra_page_layout() == 'left-sidebar') : ?>

    <?php get_sidebar(); ?>

<?php endif ?>

<div id="primary" <?php astra_primary_class(); ?>>

    <?php astra_primary_content_top(); ?>

    <?php astra_content_page_loop(); ?>

    <?php astra_primary_content_bottom(); ?>

</div><!-- #primary -->

<?php if (astra_page_layout() == 'right-sidebar') : ?>

    <?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
<script>
$(document).ready(function () {
$('.searchIcone').click(function()      
{
    $('.innerrightbar').addClass('hide');
    $('.textclass').removeClass('hide');
    $(".textclass").focus();
});
$('.textclass').blur(function(){
    $('.innerrightbar').removeClass('hide');
    $('.textclass').addClass('hide');     
    })        
    
 $(".levelSecond").hover(function () {
                  $(this).find("a:eq(0)").addClass("down-arrow-menu");
                  $(this).find("ul").show()
               }, 				
               function () {
                  $(this).find("a:eq(0)").removeClass("down-arrow-menu");                     
                  $(this).find("ul").hide()
               })
 $(".displayChild").click(function(e){
    e.preventDefault();
    var _that = $(this);
    var key = _that.attr('data-id');
    $('.levelSecond').css('display','none');
    
    $(`.levelSecond-${key}`).css('display','block');
 });              
  })(jQuery);
</script>

 