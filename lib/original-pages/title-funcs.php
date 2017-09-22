<?php //アクセス解析設定に必要な定数や関数

//タイトルセパレーター
define('OP_TITLE_SEPARATOR', 'title_separator');
if ( !function_exists( 'get_title_separator' ) ):
function get_title_separator(){
  return get_option(OP_TITLE_SEPARATOR, 'pipe');
}
endif;
//タイトルセパレーターのキャプションを取得する
if ( !function_exists( 'get_title_separator_caption' ) ):
function get_title_separator_caption(){
  switch (get_title_separator()) {
    case 'hyphen':
      $separator = __( ' - ', THEME_NAME );
      break;
    default:
      $separator = __( ' | ', THEME_NAME );
      break;
  }
  return $separator;
}
endif;

//フロントページのタイトル
define('OP_FRONT_PAGE_TITLE_FORMAT', 'front_page_title_format');
if ( !function_exists( 'get_front_page_title_format' ) ):
function get_front_page_title_format(){
  return get_option(OP_FRONT_PAGE_TITLE_FORMAT, 'sitename_tagline');
}
endif;
//フロントページタイトルのキャプションを取得する
if ( !function_exists( 'get_front_page_title_caption' ) ):
function get_front_page_title_caption(){
  switch (get_front_page_title_format()) {
    case 'sitename_tagline':
      $title = get_bloginfo('name').get_title_separator_caption().get_bloginfo('description');
      break;
    default:
      $title = get_bloginfo('name');
      break;
  }
  return $title;
}
endif;
//キャッチフレーズをフロントページタイトルに含める場合
if ( !function_exists( 'is_tagline_to_front_page_title' ) ):
function is_tagline_to_front_page_title(){
  return get_front_page_title_format() == 'sitename_tagline';
}
endif;

//フロントページのメタディスクリプション
define('OP_FRONT_PAGE_META_DESCRIPTION', 'front_page_meta_description');
if ( !function_exists( 'get_front_page_meta_description' ) ):
function get_front_page_meta_description(){
  return get_option(OP_FRONT_PAGE_META_DESCRIPTION);
}
endif;

//フロントページのメタディスクリプション
define('OP_FRONT_PAGE_META_KEYWORDS', 'front_page_meta_keywords');
if ( !function_exists( 'get_front_page_meta_keywords' ) ):
function get_front_page_meta_keywords(){
  return get_option(OP_FRONT_PAGE_META_KEYWORDS);
}
endif;

//投稿・固定ページのタイトル
define('OP_SINGULAR_PAGE_TITLE_FORMAT', 'singular_page_title_format');
if ( !function_exists( 'get_singular_page_title_format' ) ):
function get_singular_page_title_format(){
  return get_option(OP_SINGULAR_PAGE_TITLE_FORMAT, 'pagetitle_sitename');
}
endif;
//投稿・固定ページタイトルのキャプションを取得する
if ( !function_exists( 'get_singular_title_caption' ) ):
function get_singular_title_caption($post){
  switch (get_singular_page_title_format()) {
    case 'pagetitle_sitename':
      $title = $post->post_title.get_title_separator_caption().get_bloginfo('name');
      break;
    case 'sitename_pagetitle':
      $title = get_bloginfo('name').get_title_separator_caption().$post->post_title;
      break;
    default:
      $title = $post->post_title;
      break;
  }
  return $title;
}
endif;

//投稿・固定ページにメタディスクリプションを含める
define('OP_META_DESCRIPTION_TO_SINGULAR', 'meta_description_to_singular');
if ( !function_exists( 'is_meta_description_to_singular' ) ):
function is_meta_description_to_singular(){
  return get_option(OP_META_DESCRIPTION_TO_SINGULAR, 1);
}
endif;

//投稿・固定ページにメタキーワードを含める
define('OP_META_KEYWORDS_TO_SINGULAR', 'meta_keywords_to_singular');
if ( !function_exists( 'is_meta_keywords_to_singular' ) ):
function is_meta_keywords_to_singular(){
  return get_option(OP_META_KEYWORDS_TO_SINGULAR);
}
endif;

//カテゴリページのタイトル
define('OP_CATEGORY_PAGE_TITLE_FORMAT', 'category_page_title_format');
if ( !function_exists( 'get_category_page_title_format' ) ):
function get_category_page_title_format(){
  return get_option(OP_CATEGORY_PAGE_TITLE_FORMAT, 'category_sitename');
}
endif;
//カテゴリーページタイトルのキャプションを取得する
if ( !function_exists( 'get_category_title_caption' ) ):
function get_category_title_caption($category){
  switch (get_category_page_title_format()) {
    case 'category_sitename':
      $title = $category->name.get_title_separator_caption().get_bloginfo('name');
      break;
    case 'sitename_category':
      $title = get_bloginfo('name').get_title_separator_caption().$category->name;
      break;
    default:
      $title = $category->name;
      break;
  }
  return $title;
}
endif;


//カテゴリページにメタディスクリプションを含める
define('OP_META_DESCRIPTION_TO_CATEGORY', 'meta_description_to_category');
if ( !function_exists( 'is_meta_description_to_category' ) ):
function is_meta_description_to_category(){
  return get_option(OP_META_DESCRIPTION_TO_CATEGORY, 1);
}
endif;

//カテゴリページにメタキーワードを含める
define('OP_META_KEYWORDS_TO_CATEGORY', 'meta_keywords_to_category');
if ( !function_exists( 'is_meta_keywords_to_category' ) ):
function is_meta_keywords_to_category(){
  return get_option(OP_META_KEYWORDS_TO_CATEGORY);
}
endif;