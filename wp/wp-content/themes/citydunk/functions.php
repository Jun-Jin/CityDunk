<?php
// カスタムメニュー
register_nav_menu( 'navigation','ナビゲーション' );

// 抜粋分の表示文字数を指定
function my_excerpt_length($length) {
    return 50;
    }
    add_filter('excerpt_length', 'my_excerpt_length');

// アイキャッチ画像の有効化
function twpp_setup_theme() {
    add_theme_support( 'post-thumbnails' );
    }
    add_action( 'after_setup_theme', 'twpp_setup_theme' );

// ウィジェット機能の有効化

// ウィジェット
register_sidebar( array(
    'name' => 'sidebar',
    'id' => 'sidebar',
    'before_widget' => '<div class="sidebar mb-5">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="rounded">',
    'after_title' => '</h2>',
) );
register_sidebar( array(
    'name' => 'footer_left',
    'id' => 'footer_left',
    'before_widget' => '<div class="sidebar mb-3">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="rounded">',
    'after_title' => '</h2>',
) );
register_sidebar( array(
    'name' => 'footer_center',
    'id' => 'footer_center',
    'before_widget' => '<div class="sidebar mb-3">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="rounded">',
    'after_title' => '</h2>',
) );
register_sidebar( array(
    'name' => 'footer_right',
    'id' => 'footer_right',
    'before_widget' => '<div class="sidebar mb-3">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="rounded">',
    'after_title' => '</h2>',
) );
// パンくずリスト
function breadcrumb(){
    global $post;
    $str ='';
    if(!is_home()&&!is_admin()){
        $str.= '<div id="breadcrumb" class="cf"><div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" style="display:table-cell;">';
        $str.= '<a href="'. home_url() .'" itemprop="url"><span itemprop="title">トップ</span></a> &gt;&#160;</div>';
        if(is_category()) {
            $cat = get_queried_object();
            if($cat -> parent != 0){
                $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
                foreach($ancestors as $ancestor){
$str.='<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" style="display:table-cell;"><a href="'. get_category_link($ancestor) .'" itemprop="url"><span itemprop="title">'. get_cat_name($ancestor) .'</span></a> &gt;&#160;</div>';
                }
            }
$str.='<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" style="display:table-cell;"><a href="'. get_category_link($cat -> term_id). '" itemprop="url"><span itemprop="title">'. $cat-> cat_name . '</span></a> &gt;&#160;</div>';
        } elseif(is_page()){
            if($post -> post_parent != 0 ){
                $ancestors = array_reverse(get_post_ancestors( $post->ID ));
                foreach($ancestors as $ancestor){
                    $str.='<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" style="display:table-cell;"><a href="'. get_permalink($ancestor).'" itemprop="url"><span itemprop="title">'. get_the_title($ancestor) .'</span></a> &gt;&#160;</div>';
                }
            }
        } elseif(is_single()){
            $categories = get_the_category($post->ID);
            $cat = $categories[0];
            if($cat -> parent != 0){
                $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
                foreach($ancestors as $ancestor){
                    $str.='<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" style="display:table-cell;"><a href="'. get_category_link($ancestor).'" itemprop="url"><span itemprop="title">'. get_cat_name($ancestor). '</span></a>→</div>';
                }
            }
            $str.='<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb" style="display:table-cell;"><a href="'. get_category_link($cat -> term_id). '" itemprop="url"><span itemprop="title">'. $cat-> cat_name . '</span></a> &gt;&#160;</div>';
        } else{
            $str.='<div>'. wp_title('', false) .'</div>';
        }
        $str.='</div>';
    }
    echo $str;
}

/**
* ページネーション出力関数
* $paged : 現在のページ
* $pages : 全ページ数
* $range : 左右に何ページ表示するか
* $show_only : 1ページしかない時に表示するかどうか
*/
function pagination( $pages, $paged, $range = 2, $show_only = false ) {

    $pages = ( int ) $pages;    //float型で渡ってくるので明示的に int型 へ
    $paged = $paged ?: 1;       //get_query_var('paged')をそのまま投げても大丈夫なように

    //表示テキスト
    $text_first   = "« 最初へ";
    $text_before  = "‹ 前へ";
    $text_next    = "次へ ›";
    $text_last    = "最後へ »";

    if ( $show_only && $pages === 1 ) {
        // １ページのみで表示設定が true の時
        echo '<div class="pagination"><span class="current pager">1</span></div>';
        return;
    }

    if ( $pages === 1 ) return;    // １ページのみで表示設定もない場合

    if ( 1 !== $pages ) {
        //２ページ以上の時
        echo '<div class="pagination"><span class="page_num">Page ', $paged ,' of ', $pages ,'</span>';
        if ( $paged > $range + 1 ) {
            // 「最初へ」 の表示
            echo '<a href="', get_pagenum_link(1) ,'" class="first">', $text_first ,'</a>';
        }
        if ( $paged > 1 ) {
            // 「前へ」 の表示
            echo '<a href="', get_pagenum_link( $paged - 1 ) ,'" class="prev">', $text_before ,'</a>';
        }
        for ( $i = 1; $i <= $pages; $i++ ) {

            if ( $i <= $paged + $range && $i >= $paged - $range ) {
                // $paged +- $range 以内であればページ番号を出力
                if ( $paged === $i ) {
                    echo '<span class="current pager">', $i ,'</span>';
                } else {
                    echo '<a href="', get_pagenum_link( $i ) ,'" class="pager">', $i ,'</a>';
                }
            }

        }
        if ( $paged < $pages ) {
            // 「次へ」 の表示
            echo '<a href="', get_pagenum_link( $paged + 1 ) ,'" class="next">', $text_next ,'</a>';
        }
        if ( $paged + $range < $pages ) {
            // 「最後へ」 の表示
            echo '<a href="', get_pagenum_link( $pages ) ,'" class="last">', $text_last ,'</a>';
        }
        echo '</div>';
    }
}