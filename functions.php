<?php

function mytheme_soppurts() {
  //コアブロックの追加分のCSSを読み込む
  add_theme_support('wp-block-styles');

  //テーマのCSS（style.css）をエディターに読み込む
  add_editor_style('style.css');
}
add_action('after_setup_theme', 'mytheme_soppurts');

function mytheme_enqueue(){
  //テーマのCSS(style.css)をフロントに読み込む
  wp_enqueue_style('mytheme_style', get_stylesheet_uri(), array(), filemtime(get_theme_file_path('style.css')));
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue');

//ブロックスタイルを追加
function mytheme_register_block_styles(){
  //見出し・飾り枠付き
  register_block_style(
    'core/heading',
    array(
      'name' => 'decoration-line',
      'label' => '丸付飾り枠'
    )
  );
  //カテゴリー一覧
  register_block_style(
    'core/categories',
    array(
      'name' => 'no-listmark',
      'label' => 'リストマーク無し'
    )
  );
  //投稿日・時計アイコン
  register_block_style(
    'core/post-date',
    array(
      'name' => 'clock-icon',
      'label' => '時計アイコン'
    )
  );
  //テンプレートパーツ、上マージン削除
  register_block_style(
    'core/template-part',
    array(
      'name' => 'rm-margin-top',
      'label' => '上マージン削除'
    )
  );
  register_block_style(
    'core/paragraph',
    array(
      'name' => 'scroll-down',
      'label' => 'スクロールダウン'
    )
  );
  register_block_style(
    'core/columns',
    array(
      'name' => 'reverse',
      'label' => 'モバイル逆順'
    )
  );
}
add_action('init', 'mytheme_register_block_styles');

//ブロックパターンのカテゴリー
function mytheme_block_pattern(){
  //My Page Baseカテゴリーを追加
  register_block_pattern_category(
    'mypagebase',
    array('label' => 'My Page Base')
  );

  remove_theme_support('core-block-patterns');
}
add_action('init', 'mytheme_block_pattern');