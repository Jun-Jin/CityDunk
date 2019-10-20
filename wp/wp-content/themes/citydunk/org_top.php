<?php
/* 
Template Name: TopPageカスタムテンプレート
*/ 
?>

<?php get_header(); ?>

<section class="container-fluid top-bg">
    <div class="container justify-content-center" style="padding-top:4.5rem;">
        <div class="row justify-content-center view-wrap">
            <div class="col-12 view">
                <img class="img-fluid p-5" src="<?php bloginfo('template_directory'); ?>/img/logo.png">    
            </div>
        </div>
    </div>
</section>

<section class="main-wrap">
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 bg-white p-5 text-center radius">
                    <h2 class="h2"><?php bloginfo('description'); ?></h2>
                    <hr>
                    <div class="m-5 pb-5">
                        <p class="h4 mb-3">「CityDunk(シティダンク)」有志による非公式攻略サイト</p>
                    </div>
                    <div class="row m-5 pb-5">
                        <div class="col-12">
                            <h2 class="top-h2">最新攻略記事</h2>
                        </div>
                        <div class="row p-3 mb-3 text-left">
                            <div class="card-group">
                                <?php query_posts('&posts_per_page=3'); ?>
                                <?php if(have_posts()): while(have_posts()): the_post(); ?>
                                    <div class="card">
                                    <span class="ribbon7">
                                        <i class="fas fa-tags"></i>
                                        <?php the_category( ' / ' ); ?>
                                    </span>

                                        <?php if (has_post_thumbnail()) : ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <div class="eye-catch img-thumbnail">
                                                    <?php the_post_thumbnail(); ?>
                                                </div>
                                            </a>
                                        <?php else : ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <div class="eye-catch img-thumbnail">
                                                    <img class="text-center" src="<?php bloginfo('template_url'); ?>/img/noimage.gif"/>
                                                </div>
                                            </a>
                                        <?php endif ; ?>
                                        <div class="card-body">
                                            <a href="<?php the_permalink(); ?>">
                                                <h5 class="card-title">
                                                    <?php the_title(); ?>
                                                </h5>
                                            </a>
                                            <p class="card-text">
                                                <i class="far fa-calendar-alt"></i>
                                                <?php the_time('Y/m/d'); ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endwhile; endif;?>
                            </div>
                        </div>
                        <div class="col-12 mb-5 text-right">
                            <a href="<?php echo get_page_link( 25 );?>"><button type="button" class="btn btn-light">Read More</button></a>
                        </div>
                    </div>

                    <div class="row m-5" id="system">
                        <div class="col-12 col-md-6 mb-5 text-left">
                            <h2 class="top-h2">キャラクター一覧</h2>
                            <p class="mb-5">
                            キャラクターの評価や特色が気になる方はこちら！
                            </p>
                            <a href="<?php echo get_category_link( 6 ); ?>"><button type="button" class="btn btn-danger mb-2">C センター</button></a>
                            <a href="<?php echo get_category_link( 7 ); ?>"><button type="button" class="btn btn-danger mb-2">PF パワーフォワード</button></a>
                            <a href="<?php echo get_category_link( 2 ); ?>"><button type="button" class="btn btn-danger mb-2">CF コントロールフォワード</button></a>
                            <a href="<?php echo get_category_link( 8 ); ?>"><button type="button" class="btn btn-danger mb-2">SF スモールフォワード</button></a>
                            <a href="<?php echo get_category_link( 10 ); ?>"><button type="button" class="btn btn-danger mb-2">SG シューティングガード</button></a>
                            <a href="<?php echo get_category_link( 9 ); ?>"><button type="button" class="btn btn-danger mb-2">PG ポイントガード</button></a>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="img-wrap-right">
                                <img src="<?php bloginfo('template_directory'); ?>/img/cl.png">
                            </div>
                        </div>
                    </div>
<!--
                    <div class="row m-5" id="business">
                        <div class="col-12 col-md-6 mb-5 text-left order-md-2">
                            <h2 class="top-h2">スキル一覧</h2>
                            <p class="mb-5">
                            ポジション別のスキルの特色、使い方を検証
                            </p>
                            <?php
                                $arg = array('posts_per_page' => 5,'orderby' => 'date','order' => 'DESC','category_name' => 'スキル');
                                $posts = get_posts( $arg );
                                if( $posts ):
                            ?>
                            <?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            <?php endforeach; ?>
                            <?php endif; wp_reset_postdata();?>
                        </div>
                        <div class="col-12 col-md-6 order-md-1">
                            <div class="img-wrap-left">
                                <img class="img-left" src="<?php bloginfo('template_directory'); ?>/img/sl.png">
                            </div>
                        </div>
                    </div>
-->
                    <div class="row m-5" id="business">
                        <div class="col-12 col-md-6 mb-5 text-left order-md-2">
                            <h2 class="top-h2">育成</h2>
                            <p class="mb-5">
                            効率よくキャラを育てるには！
                            </p>
                            <?php
                                $arg = array('posts_per_page' => 5,'orderby' => 'date','order' => 'DESC','category_name' => '育成');
                                $posts = get_posts( $arg );
                                if( $posts ):
                            ?>
                            <?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?><br>
                                </a>
                            <?php endforeach; ?>
                            <?php endif; wp_reset_postdata();?>
                        </div>
                        <div class="col-12 col-md-6 order-md-1">
                            <div class="img-wrap-left">
                                <img class="img-left" src="<?php bloginfo('template_directory'); ?>/img/sl.png">
                            </div>
                        </div>
                    </div>

                    <div class="row m-5" id="system">
                        <div class="col-12 col-md-6 mb-5 text-left">
                            <h2 class="top-h2">アイテム一覧</h2>
                            <p class="mb-5">
                            限定アイテムやオススメスキンなどを紹介！
                            </p>
                            <?php
                                $arg = array('posts_per_page' => 5,'orderby' => 'date','order' => 'DESC','category_name' => 'アイテム');
                                $posts = get_posts( $arg );
                                if( $posts ):
                            ?>
                            <?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            <?php endforeach; ?>
                            <?php endif; wp_reset_postdata();?>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="img-wrap-right">
                                <img src="<?php bloginfo('template_directory'); ?>/img/il.png">
                            </div>
                        </div>
                    </div>

                    <div class="row m-5" id="site">
                        <div class="col-12 mb-5 text-center">
                            <h2 class="top-h2">オススメ攻略Tips!!</h2>
                            <p>
                            重要なTipsをまとめています。
                            </p>
                            <div class="row p-3 mb-3 text-left">
                                <div class="card-group">
                                    <?php query_posts('&posts_per_page=3'); ?>
                                    <?php
                                        $arg = array('posts_per_page' => 5,'orderby' => 'date','order' => 'DESC','category_name' => '攻略Tips');
                                        $posts = get_posts( $arg );
                                        if( $posts ):
                                    ?>
                                    <?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
                                        <div class="card">
                                            <span class="ribbon7"><i class="fas fa-tags"></i><?php the_category( ' / ' ); ?></span>
                                            <?php if (has_post_thumbnail()) : ?>
                                                <a href="<?php the_permalink(); ?>">
                                                    <div class="eye-catch img-thumbnail"><?php the_post_thumbnail(); ?>
                                                    </div></a>
                                            <?php else : ?>
                                                <a href="<?php the_permalink(); ?>"><div class="eye-catch img-thumbnail"><img class="text-center" src="<?php bloginfo('template_url'); ?>/img/noimage.gif"/></a></div>
                                            <?php endif ; ?>
                                            <div class="card-body">
                                                <a href="<?php the_permalink(); ?>"><h5 class="card-title"><?php the_title(); ?></h5></a>
                                                <p class="card-text"><i class="far fa-calendar-alt"></i><?php the_time('Y/m/d'); ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <?php endif; wp_reset_postdata();?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 justify-content-center mt-5 pt-5 bg-foot ">
                <?php get_footer() ?>
            </div>
        </div>
    </div>
</section>
