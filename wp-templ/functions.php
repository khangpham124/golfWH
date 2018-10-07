<?php

add_theme_support('post-thumbnails');

//login logo
function custom_login_logo() {
        echo '<style type="text/css">h1 a { background: url('.get_bloginfo('template_directory').'/images/logo.png) 50% 50% no-repeat !important; }</style>';
}

add_action('login_head', 'custom_login_logo');


//timthumb

define('THEME_DIR', get_template_directory_uri());
/* Timthumb CropCropimg */
function thumbCrop($img='', $w=false, $h=false, $zc=1){
    if($h)
        $h = "&amp;h=$h";
    else
        $h = "";
        
    if($w)
        $w = "&amp;w=$w";
    else
        $w = "";
    $img = str_replace(get_bloginfo('url'), '', $img);
    $image_url = THEME_DIR . "/timthumb/timthumb.php?src=" . $img . $h . $w ;
    return $image_url;

}
$image_cache = THEME_DIR . "/php/cache/";
// chmod($image_cache, 0777);

// 管理画面サイドバーメニュー非表示
function remove_menus () {
    if (!current_user_can('level_9')) { //level9以下のユーザーの場合メニューをunsetする
    global $menu;
    var_dump($menu);
    unset($menu[2]);//ダッシュボード
    unset($menu[4]);//メニューの線1
    unset($menu[5]);//投稿
    unset($menu[15]);//リンク
    unset($menu[20]);//ページ
    unset($menu[25]);//コメント
    unset($menu[59]);//メニューの線2
    unset($menu[60]);//テーマ
    unset($menu[65]);//プラグイン
    unset($menu[70]);//プロフィール
    unset($menu[75]);//ツール
    unset($menu[80]);//設定
    unset($menu[90]);//メニューの線3
    }
}
add_action('admin_menu', 'remove_menus');

function custom_admin_footer() {
    echo 'Golf Warehouse - design by TeddyCoder';
}
add_filter('admin_footer_text', 'custom_admin_footer');

/* term drop down function */
function todo_restrict_manage_posts() {
    global $typenow;
    $args=array( 'public' => true, '_builtin' => false );
    $post_types = get_post_types($args);
    if ( in_array($typenow, $post_types) ) {
    $filters = get_object_taxonomies($typenow);
        foreach ($filters as $tax_slug) {
            $tax_obj = get_taxonomy($tax_slug);
            wp_dropdown_categories(array(
                'show_option_all' => __('Category'),
                'taxonomy' => $tax_slug,
                'name' => $tax_obj->name,
                'orderby' => 'term_order',
                'selected' => $_GET[$tax_obj->query_var],
                'hierarchical' => $tax_obj->hierarchical,
                'show_count' => false,
                'hide_empty' => true
            ));
        }
    }
}
function todo_convert_restrict($query) {
    global $pagenow;
    global $typenow;
    if ($pagenow=='edit.php') {
        $filters = get_object_taxonomies($typenow);
        foreach ($filters as $tax_slug) {
            $var = &$query->query_vars[$tax_slug];
            if ( isset($var) ) {
                $term = get_term_by('id',$var,$tax_slug);
                $var = $term->slug;
            }
        }
    }
    return $query;
}
add_action( 'restrict_manage_posts', 'todo_restrict_manage_posts' );
add_filter('parse_query','todo_convert_restrict');
/* term drop down function end*/

//for archives
global $my_archives_post_type;
add_filter( 'getarchives_where', 'my_getarchives_where', 10, 2 );
function my_getarchives_where( $where, $r ) {
  global $my_archives_post_type;
  if ( isset($r['post_type']) ) {
    $my_archives_post_type = $r['post_type'];
    $where = str_replace( '\'post\'', '\'' . $r['post_type'] . '\'', $where );
  } else {
    $my_archives_post_type = '';
  }
  return $where;
}
add_filter( 'get_archives_link', 'my_get_archives_link' );
function my_get_archives_link( $link_html ) {
  global $my_archives_post_type;
  if ( '' != $my_archives_post_type )
    $add_link .= '?post_type=' . $my_archives_post_type;
	$link_html = preg_replace("/href=\'(.+)\'\s/","href='$1".$add_link."'",$link_html);

  return $link_html;
}

// paging
$option_posts_per_page = get_option( 'posts_per_page' );
add_action( 'init', 'my_modify_posts_per_page', 0);
function my_modify_posts_per_page() {
    add_filter( 'option_posts_per_page', 'my_option_posts_per_page' );
}


// Custom post

//sample
add_action('init', 'my_custom_apparel');
function my_custom_apparel()
{
  $labels = array(
    'name' => _x('Apparel', 'post type general name'),
    'singular_name' => _x('Apparel', 'post type singular name'),
    'add_new' => _x('add Apparel', 'news'),
    'add_new_item' => __('add Apparel'),
    'edit_item' => __('edit Apparel'),
    'new_item' => __('new item'),
    'view_item' => __('view item'),
    'search_staff' => __('sample記事を探す'),
    'not_found' =>  __('not found'),
    'not_found_in_trash' => __('not found'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail'),
    'has_archive' => true
  );
  register_post_type('apparel',$args);
}

add_action ('init','create_apparelcat_taxonomy','0');
function create_apparelcat_taxonomy () {
	$taxonomylabels = array(
	'name' => _x('apparelcat','post type general name'),
	'singular_name' => _x('apparelcat','post type singular name'),
	'search_items' => __('apparelcat'),
	'all_items' => __('apparelcat'),
	'parent_item' => __( 'Parent Cat' ),
	'parent_item_colon' => __( 'Parent Cat:' ),
	'edit_item' => __('Edit Item'),
	'add_new_item' => __('Add new item'),
	'menu_name' => __( 'Gender Category' ),
	);
	$args = array(
	'labels' => $taxonomylabels,
	'hierarchical' => true,
	'has_archive' => true,
	'show_ui' => true,
	 'query_var' => true,
	 'rewrite' => array( 'slug' => 'apparelcat' )
	);
	register_taxonomy('apparelcat','apparel',$args);
}

add_action ('init','create_typecat_taxonomy','0');
function create_typecat_taxonomy () {
	$taxonomylabels = array(
	'name' => _x('typecat','post type general name'),
	'singular_name' => _x('typecat','post type singular name'),
	'search_items' => __('typecat'),
	'all_items' => __('typecat'),
	'parent_item' => __( 'Parent Cat' ),
	'parent_item_colon' => __( 'Parent Cat:' ),
	'edit_item' => __('Edit item'),
	'add_new_item' => __('Add new item'),
	'menu_name' => __( 'Type category' ),
	);
	$args = array(
	'labels' => $taxonomylabels,
	'hierarchical' => true,
	'has_archive' => true,
	'show_ui' => true,
	 'query_var' => true,
	 'rewrite' => array( 'slug' => 'typecat' )
	);
	register_taxonomy('typecat','apparel',$args);
}

add_action('init', 'my_custom_brand');
function my_custom_brand()
{
  $labels = array(
    'name' => _x('Brand', 'post type general name'),
    'singular_name' => _x('Brand', 'post type singular name'),
    'add_new' => _x('add Brand', 'news'),
    'add_new_item' => __('add Brand'),
    'edit_item' => __('edit Brand'),
    'new_item' => __('new item'),
    'view_item' => __('view item'),
    'search_staff' => __('sample記事を探す'),
    'not_found' =>  __('not found'),
    'not_found_in_trash' => __('not found'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail'),
    'has_archive' => true
  );
  register_post_type('brand',$args);
}

add_action('init', 'my_custom_event');
function my_custom_event()
{
  $labels = array(
    'name' => _x('Event', 'post type general name'),
    'singular_name' => _x('Event', 'post type singular name'),
    'add_new' => _x('add Event', 'news'),
    'add_new_item' => __('add Event'),
    'edit_item' => __('edit Event'),
    'new_item' => __('new item'),
    'view_item' => __('view item'),
    'search_staff' => __('sample記事を探す'),
    'not_found' =>  __('not found'),
    'not_found_in_trash' => __('not found'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail'),
    'has_archive' => true
  );
  register_post_type('event',$args);
}

add_action('init', 'my_custom_getorder');
function my_custom_getorder()
{
  $labels = array(
    'name' => _x('Order Online', 'post type general name'),
    'singular_name' => _x('Order Online', 'post type singular name'),
    'add_new' => _x('add Order Online', 'news'),
    'add_new_item' => __('add Order Online'),
    'edit_item' => __('edit Order Online'),
    'new_item' => __('new item'),
    'view_item' => __('view item'),
    'search_staff' => __('sample記事を探す'),
    'not_found' =>  __('not found'),
    'not_found_in_trash' => __('not found'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title'),
    'has_archive' => true
  );
  register_post_type('getorder',$args);
}


add_action('init', 'my_custom_clubs');
function my_custom_clubs()
{
  $labels = array(
    'name' => _x('Golf Clubs', 'post type general name'),
    'singular_name' => _x('golf clubs', 'post type singular name'),
    'add_new' => _x('add golf clubs', 'news'),
    'add_new_item' => __('add golf clubs'),
    'edit_item' => __('edit golf clubs'),
    'new_item' => __('new item'),
    'view_item' => __('view item'),
    'search_staff' => __('sample記事を探す'),
    'not_found' =>  __('not found'),
    'not_found_in_trash' => __('not found'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail'),
    'has_archive' => true
  );
  register_post_type('clubs',$args);
}

// make taxonomy
add_action ('init','create_clubscat_taxonomy','0');
function create_clubscat_taxonomy () {
	$taxonomylabels = array(
	'name' => _x('clubscat','post type general name'),
	'singular_name' => _x('clubscat','post type singular name'),
	'search_items' => __('clubscat'),
	'all_items' => __('clubscat'),
	'parent_item' => __( 'Parent Cat' ),
	'parent_item_colon' => __( 'Parent Cat:' ),
	'edit_item' => __('Edit item'),
	'add_new_item' => __('Add new item'),
	'menu_name' => __( 'categories' ),
	);
	$args = array(
	'labels' => $taxonomylabels,
	'hierarchical' => true,
	'has_archive' => true,
	'show_ui' => true,
	 'query_var' => true,
	 'rewrite' => array( 'slug' => 'clubscat' )
	);
	register_taxonomy('clubscat','clubs',$args);
}

add_action('init', 'my_custom_accessories');
function my_custom_accessories()
{
  $labels = array(
    'name' => _x('Accessories', 'post type general name'),
    'singular_name' => _x('Accessories', 'post type singular name'),
    'add_new' => _x('add Accessories', 'news'),
    'add_new_item' => __('add Accessories'),
    'edit_item' => __('edit Accessories'),
    'new_item' => __('new item'),
    'view_item' => __('view item'),
    'search_staff' => __('sample記事を探す'),
    'not_found' =>  __('not found'),
    'not_found_in_trash' => __('not found'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail'),
    'has_archive' => true
  );
  register_post_type('accessories',$args);
}


add_action ('init','create_accessoriescat_taxonomy','0');
function create_accessoriescat_taxonomy () {
	$taxonomylabels = array(
	'name' => _x('accessoriescat','post type general name'),
	'singular_name' => _x('accessoriescat','post type singular name'),
	'search_items' => __('accessoriescat'),
	'all_items' => __('accessoriescat'),
	'parent_item' => __( 'Parent Cat' ),
	'parent_item_colon' => __( 'Parent Cat:' ),
	'edit_item' => __('Edit item'),
	'add_new_item' => __('Add new item'),
	'menu_name' => __( 'categories' ),
	);
	$args = array(
	'labels' => $taxonomylabels,
	'hierarchical' => true,
	'has_archive' => true,
	'show_ui' => true,
	 'query_var' => true,
	 'rewrite' => array( 'slug' => 'accessoriescat' )
	);
	register_taxonomy('accessoriescat','accessories',$args);
}

add_action('init', 'my_custom_bag');
function my_custom_bag()
{
  $labels = array(
    'name' => _x('Bag', 'post type general name'),
    'singular_name' => _x('Bag', 'post type singular name'),
    'add_new' => _x('add Bag', 'news'),
    'add_new_item' => __('add Bag'),
    'edit_item' => __('edit Bag'),
    'new_item' => __('new item'),
    'view_item' => __('view item'),
    'search_staff' => __('sample記事を探す'),
    'not_found' =>  __('not found'),
    'not_found_in_trash' => __('not found'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail'),
    'has_archive' => true
  );
  register_post_type('bag',$args);
}


add_action ('init','create_bagcat_taxonomy','0');
function create_bagcat_taxonomy () {
	$taxonomylabels = array(
	'name' => _x('bagcat','post type general name'),
	'singular_name' => _x('bagcat','post type singular name'),
	'search_items' => __('bagcat'),
	'all_items' => __('bagcat'),
	'parent_item' => __( 'Parent Cat' ),
	'parent_item_colon' => __( 'Parent Cat:' ),
	'edit_item' => __('Edit item'),
	'add_new_item' => __('Add new item'),
	'menu_name' => __( 'categories' ),
	);
	$args = array(
	'labels' => $taxonomylabels,
	'hierarchical' => true,
	'has_archive' => true,
	'show_ui' => true,
	 'query_var' => true,
	 'rewrite' => array( 'slug' => 'bagcat' )
	);
	register_taxonomy('bagcat','bag',$args);
}

add_action('init', 'my_custom_shoes');
function my_custom_shoes()
{
  $labels = array(
    'name' => _x('Shoes', 'post type general name'),
    'singular_name' => _x('Shoes', 'post type singular name'),
    'add_new' => _x('add Shoes', 'news'),
    'add_new_item' => __('add Shoes'),
    'edit_item' => __('edit Shoes'),
    'new_item' => __('new item'),
    'view_item' => __('view item'),
    'search_staff' => __('sample記事を探す'),
    'not_found' =>  __('not found'),
    'not_found_in_trash' => __('not found'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail'),
    'has_archive' => true
  );
  register_post_type('shoes',$args);
}


add_action ('init','create_shoescat_taxonomy','0');
function create_shoescat_taxonomy () {
	$taxonomylabels = array(
	'name' => _x('shoescat','post type general name'),
	'singular_name' => _x('shoescat','post type singular name'),
	'search_items' => __('shoescat'),
	'all_items' => __('shoescat'),
	'parent_item' => __( 'Parent Cat' ),
	'parent_item_colon' => __( 'Parent Cat:' ),
	'edit_item' => __('Edit item'),
	'add_new_item' => __('Add new item'),
	'menu_name' => __( 'categories' ),
	);
	$args = array(
	'labels' => $taxonomylabels,
	'hierarchical' => true,
	'has_archive' => true,
	'show_ui' => true,
	 'query_var' => true,
	 'rewrite' => array( 'slug' => 'shoescat' )
	);
	register_taxonomy('shoescat','shoes',$args);
}


add_action ('init','create_clubsgendercat_taxonomy','0');
function create_clubsgendercat_taxonomy () {
	$taxonomylabels = array(
	'name' => _x('clubsgendercat','post type general name'),
	'singular_name' => _x('clubsgendercat','post type singular name'),
	'search_items' => __('clubsgendercat'),
	'all_items' => __('clubsgendercat'),
	'parent_item' => __( 'Parent Cat' ),
	'parent_item_colon' => __( 'Parent Cat:' ),
	'edit_item' => __('Edit item'),
	'add_new_item' => __('Add new item'),
	'menu_name' => __( 'Gender Category' ),
	);
	$args = array(
	'labels' => $taxonomylabels,
	'hierarchical' => true,
	'has_archive' => true,
	'show_ui' => true,
	 'query_var' => true,
	 'rewrite' => array( 'slug' => 'clubsgendercat' )
	);
	register_taxonomy('clubsgendercat','clubs',$args);
}

add_action( 'admin_menu', 'add_orders_menu_bubble' );
function add_orders_menu_bubble() {
  global $menu;
  $orderStatus = get_posts(array(
    'post_type' => 'getorder',
    'posts_per_page' => -1,
    'meta_query' => array(
      array(
        'key' => 'cf_order_status',
        'value' => 'in progress',
        'compare' => '=',
      )
    ),
  ));
  if ( count($orderStatus) ) {
    foreach ( $menu as $key => $value ) {
      if ( $menu[$key][2] == 'edit.php?post_type=getorder' ) {
        $menu[$key][0] .= ' <span class="update-plugins count-1"><span class="plugin-count">' . count($orderStatus) . '</span></span>';
        return;
      }
    }
  }
}