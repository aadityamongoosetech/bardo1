<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if(is_admin())
{
	get_header(); ?>

	<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

		<?php get_sidebar(); ?>

	<?php endif ?>

		<div id="primary" <?php astra_primary_class(); ?>>

			<?php astra_primary_content_top(); ?>

			<?php astra_content_loop(); ?>

			<?php astra_primary_content_bottom(); ?>

		</div><!-- #primary -->

	<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

		<?php get_sidebar(); ?>

	<?php endif ?>

	<?php get_footer(); ?>
<?php	} else { ?> 
	
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
    <div class="blog-page-sec">
        <div class="blog-sec">
            <h2>Latest Posts</h2>
            <div class="row">
                   <?php
                  $args = array(
                    "post_type" => "post",
                    "posts_per_page" => 4,
                    "post__not_in" => [get_The_ID()],
                    "order" => "DESC"
              );
              $query = new WP_Query($args);
              while ($query->have_posts()) : $query->the_post(); ?>
                <div class="col-sm-3">
                    <div class="blog-sec__inner">
                        <div class="blog-sec__img">
                            <img src="<?=get_the_post_thumbnail_url()?>">
                        </div>
                        <div class="blog-sec__content">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="blog-inner-content__user">
                                        <?=get_the_author()?>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <span><?=get_the_date('M j, Y')?></span>
                                </div>
                            </div>
                            <h3><?=get_the_title()?> </h3>
                            <p><?=agenda_one_line(get_the_ID())?> </p>
                            <div class="emial-marketing">
                                <a href="<?=get_the_permalink()?>">
                                    Email Marketing
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
              <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>



<!-- Footer-->
<?php get_footer(); ?>
<?php } ?>