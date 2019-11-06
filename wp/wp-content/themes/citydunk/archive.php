<?php get_header(); ?>



<section class="container-fluid child-bg">
    <div class="container justify-content-center" style="padding-top:4.5rem;">
        <div class="row justify-content-center view-wrap">
        </div>
    </div>
</section>

<section class="main-wrap">
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center bg-white radius">
				<div class="col-12 pt-5 text-center ">
					<?php dynamic_sidebar('topbar'); ?>
				</div>
				<div class="col-12 p-5 text-center ">
                    <h2 class="h2">
                    <?php
                        $current_cat = get_queried_object();
                        $cat_name = $current_cat->name;
                        echo $cat_name;
                    ?>
                    </h2>
                    <hr>
                </div>
                <article class="col-12 col-md-8 text-center ">
                    <?php if(have_posts()): while(have_posts()): the_post(); ?>
                    <div class="card p-3 mb-3 text-left">
                        <div class="row">
                            <div class="col-12 col-md-4 ">
                                <span class="ribbon7"><i class="fas fa-tags"></i><?php the_category( ' / ' ); ?></span>
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>"><div class="eye-catch img-thumbnail"><?php the_post_thumbnail(); ?></div>
                                <?php else : ?>
                                    <div class="eye-catch img-thumbnail" style="position:relative;">
                                        <img class="text-center" src="<?php bloginfo('template_url'); ?>/img/noimage2.png"/>
                                        <h2 class="image-in-text"><?php the_title(); ?></h2>
                                    </div>
                                <?php endif ; ?>
                            </div>
                            <div class="col-12 col-md-8">
                                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                                <p class="mr-2 text-right"><i class="far fa-calendar-alt"></i><?php the_time('Y/m/d'); ?></p>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php if ( function_exists( 'pagination' ) ) :
                        pagination( $wp_query->max_num_pages, get_query_var( 'paged' ) );
                        endif;
                    else : echo 'まだ記事がありません。';
                    endif; ?>
                </article>
                <aside class="col-12 col-md-4 text-left">
                    <?php get_sidebar(); ?>
                </aside>
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
