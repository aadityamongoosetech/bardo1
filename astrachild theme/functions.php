<?php
/* child style*/

function childtheme_enqueue_styles()
{
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css' . false, filemtime(get_stylesheet_directory() . '/style.css'), 'all');
  wp_enqueue_style('child-custom-style', get_stylesheet_directory_uri() . '/assets/css/custom.css' . false, filemtime(get_stylesheet_directory() . '/style.css'), '1.32');
  wp_enqueue_script('jquery-astra', get_stylesheet_directory_uri() . '/assets/js/jquery.min.js', [], 1.0);
  wp_enqueue_script('bootsrap-astra', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', ['jquery-astra'], 4.0);
  wp_enqueue_script('slick', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', ['jquery-astra'], 2.0);
  wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/assets/js/custom.js', ['jquery-astra']);
  wp_localize_script( 'apss-frontend-mainjs', 'frontend_ajax_object', array( 'ajax_url' => admin_url() . 'admin-ajax.php' ) );
  wp_enqueue_style('child-reponsive-style', get_stylesheet_directory_uri() . '/assets/css/reponsive.css'.false  ,filemtime(get_stylesheet_directory() . '/style.css'), '1.15');
   wp_enqueue_style('child-slick-style', get_stylesheet_directory_uri() . '/assets/css/slick.css'.false  ,filemtime(get_stylesheet_directory() . '/style.css'), '1.9');
}
add_action('wp_enqueue_scripts', 'childtheme_enqueue_styles', 99);
function astra_custom_meta()
{
  

  add_meta_box('astra_meta', __('Featured News', 'astra-textdomain'), 'astra_meta_callback', 'News');
  add_meta_box('astra_trending_meta', __('Trending News', 'astra-textdomain'), 'astra_meta_trending_callback', 'news');
  add_meta_box('astra_date_meta', __('Agenda Date', 'astra-textdomain'), 'astra_meta_date_callback', 'agenda');
}
function astra_meta_callback($post)
{
  $featured = get_post_meta($post->ID);

?>
  <p>
  <div class="sm-row-content">
    <label for="meta-checkbox">
      <input type="checkbox" name="meta-news-featured" id="meta-news-featured" value="yes" <?php if (isset($featured['meta-news-featured'])) echo checked($featured['meta-news-featured'][0], 'yes'); ?> />
      <?php _e('Featured this post', 'astra-textdomain') ?>
    </label>
  </div>
  </p>

<?php
}


?>
  

<?php
add_action('add_meta_boxes', 'astra_custom_meta');

function astra_meta_save($post_id)
{
  if (get_post_type($post_id) !== 'news')
    return;

  // Checks save status
  $is_autosave = wp_is_post_autosave($post_id);
  $is_revision = wp_is_post_revision($post_id);
  $is_valid_nonce = (isset($_POST['astra_nonce']) && wp_verify_nonce($_POST['astra_nonce'], basename(__FILE__))) ? 'true' : 'false';

  // Exits script depending on save status
  if ($is_autosave || $is_revision || !$is_valid_nonce) {
    return;
  }



  // Checks for input and saves
  if (isset($_POST['meta-news-featured'])) {
    update_post_meta($post_id, 'meta-news-featured', 'yes');
  } else {
    update_post_meta($post_id, 'meta-news-featured', '');
  }
}
add_action('save_post', 'astra_meta_save');

function astra_meta_trending_callback($post)
{
  
  $featured = get_post_meta($post->ID);

?>
  <p>
  <div class="sm-row-content">
    <label for="meta-checkbox">
      <input type="checkbox" name="meta-news-trending" id="meta-news-trending" value="yes" <?php if (isset($featured['meta-news-trending'])) echo checked($featured['meta-news-trending'][0], 'yes'); ?> />
      <?php _e('Trending this News', 'astra-textdomain') ?>
       
    </label>
  </div>
  </p>
<?php
}
add_action('add_meta_boxes', 'astra_custom_meta');

function astra_meta_trending_save($post_id)
{

  if (get_post_type($post_id) !== 'news')
    return;
  // Checks save status
  $is_autosave = wp_is_post_autosave($post_id);
  $is_revision = wp_is_post_revision($post_id);
  $is_valid_nonce = (isset($_POST['astra_trending_nonce']) && wp_verify_nonce($_POST['astra_trending_nonce'], basename(__FILE__))) ? 'true' : 'false';

  // Exits script depending on save status
  if ($is_autosave || $is_revision || !$is_valid_nonce) {
    return;
  }


  // Checks for input and saves
  if (isset($_POST['meta-news-trending'])) {
    update_post_meta($post_id, 'meta-news-trending', 'yes');
  } else {
    update_post_meta($post_id, 'meta-news-trending', '');
  }
}
add_action('save_post', 'astra_meta_trending_save');

/*Agenda Date Handling*/
function astra_meta_date_callback($post)
{
  $featured = get_post_meta($post->ID);
?>
  <p>
  <div class="sm-row-content">
    <label for="meta-checkbox">
      <input type="date" name="meta-agenda-date" id="meta-agenda-date" value="<?php if (isset($featured['meta-agenda-date'])) echo $featured['meta-agenda-date'][0]; ?>" />
    </label>
  </div>
  </p>
<?php
}
function astra_meta_date_save($post_id)
{
  if (get_post_type($post_id) !== 'agenda')
    return;
  // Checks save status
  $is_autosave = wp_is_post_autosave($post_id);
  $is_revision = wp_is_post_revision($post_id);
  $is_valid_nonce = (isset($_POST['astra_date_nonce']) && wp_verify_nonce($_POST['meta-agenda-date'], basename(__FILE__))) ? 'true' : 'false';

  // Exits script depending on save status
  if ($is_autosave || $is_revision || !$is_valid_nonce) {
    return;
  }

  // Checks for input and saves
  if (isset($_POST['meta-agenda-date'])) {
    update_post_meta($post_id, 'meta-agenda-date', $_POST['meta-agenda-date']);
  } else {
    update_post_meta($post_id, 'meta-agenda-date', '');
  }
}
add_action('save_post', 'astra_meta_date_save');
/* One line agenda content*/
function agenda_one_line($post_id)
{
  $excerpt = get_the_excerpt($post_id);
  $excerptArray = explode(' ', $excerpt);
  $excerptArray = array_slice($excerptArray, 0, 10);
  return implode(" ", $excerptArray);
}
/*Customer Search Result Template for Agenda Post Type*/
function search_agenda($template)
{
  global $wp_query;
  $post_type = get_query_var('post_type');
  if ($wp_query->is_search && $post_type == 'agenda') {
    return locate_template('search-agenda.php');  //  redirect to archive-search.php
  }
  return $template;
}
add_filter('template_include', 'search_agenda');

/*ShortCode for Home Page*/
function recent_2_agenda(){
  $string  = '<div class="row">';
  $args = array(
                "post_type" => "agenda",
                "posts_per_page" => 2,
                "order" => "DESC"
              );
              $query = new WP_Query($args);
  $i=1;
  while ($query->have_posts()) : $query->the_post(); 
    $string .= '<div class="col-md-6">';
      $string .= '<div class="agenda-content__list">
                <div class="agenda-content__list--date agenda-content__list--clr'.$i .'">
                    '.date('j M', strtotime(get_post_meta(get_the_ID(), 'meta-agenda-date', true))).'
                  </div>
                  <div class="agenda-content__list--content">
                    <div class="latest-news-sec__inner-content__img">
                      <img src="'.get_the_post_thumbnail_url() .'">
                    </div>
                    <h3>'. get_the_title() .'</h3>
                    <p>'. get_the_excerpt().'</p>
                  </div>
                  <div class="agenda-content__list--icon">
                    <a href="'.get_the_permalink().'"> <img src="'. get_stylesheet_directory_uri().'/assets/images/right-arrow.jpg"></a>
                  </div>
              </div>';
    $string .= '</div>';
    $i = ($i == 1) ? 2 : 1; 
  endwhile;
  $string .= '</div>';
  return $string;
}
add_shortcode('get-agenda-latest','recent_2_agenda');

function more_post() {
      $pagination = $_POST['pagination'];
      $offset = 8*($pagination-1); 
      global $post;
                $latest_posts = new WP_Query(array(
                    'posts_per_page' => 8, // Displays the latest 10 posts, change 10 to what you require
                    'post_type' => 'post', // Pulls posts from 'post' post type only
                    'offset'=>$offset,
                   
                  ));
        ob_start();
                while ($latest_posts->have_posts()) :
                $latest_posts->the_post(); 
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
                <?php endwhile; 
                echo json_encode(['status'=>'success','data'=>ob_get_clean()]);
                die();
  }

add_action('wp_ajax_more_post', 'more_post');
add_action('wp_ajax_nopriv_more_post', 'more_post');
function more_news() {
      $pagination = $_POST['pagination'];
      $offset = get_option( 'posts_per_page' )*($pagination-1); 
      global $post;
                $latest_posts = new WP_Query(array(
                    'posts_per_page' => get_option( 'posts_per_page' ), // Displays the latest 10 posts, change 10 to what you require
                    'post_type' => 'news', // Pulls posts from 'post' post type only
                    'offset'=>$offset,
                  ));
        ob_start();
                while ($latest_posts->have_posts()) :
                $latest_posts->the_post(); 
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
                      <a href=""> <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/right-arrow.jpg"></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                <?php endwhile; 
                echo json_encode(['status'=>'success','data'=>ob_get_clean()]);
                die();
  }

add_action('wp_ajax_more_news', 'more_news');
add_action('wp_ajax_nopriv_more_news', 'more_news');
function more_Search()
{
     $pagination = $_POST['pagination'];
     $query = $_POST['query'];
      $offset = 10*($pagination-1); 
      global $post;
                $latest_posts = new WP_Query(array(
                    'posts_per_page' => 10, // Displays the latest 10 posts, change 10 to what you require
                    'post_type' => array('news','agenda','post'), // Pulls posts from 'post' post type only
                    'offset'=>$offset,
                     's'=>$query,
                  ));
        ob_start();
                while ($latest_posts->have_posts()) :
                $latest_posts->the_post(); 
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
                <?php endwhile; 
                echo json_encode(['status'=>'success','data'=>ob_get_clean()]);
                die();
}
add_action('wp_ajax_more_Search', 'more_Search');
add_action('wp_ajax_nopriv_more_Search', 'more_Search');

function buildTree( array &$elements, $parentId = 0 )
{
    $branch = array();
    foreach ( $elements as &$element )
    {
        if ( $element->menu_item_parent == $parentId )
        {
            $children = buildTree( $elements, $element->ID );
            if ( $children )
                $element->wpse_children = $children;

            $branch[$element->ID] = $element;
            unset( $element );
        }
    }
    return $branch;
}
function wpse_nav_menu_2_tree( $menu_id )
{
    $items = wp_get_nav_menu_items( $menu_id );
    return  $items ? buildTree( $items, 0 ) : null;
}