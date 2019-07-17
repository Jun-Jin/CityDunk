<?php get_header(); ?>
    <!-- メインセクション -->
    <section class="container pt-5 pb-5 ajust">

        <div class="row">
            <div class="col-12 text-center">
                <span class="h1">
                    <?php the_search_query(); ?> の検索結果
                </span>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="row">
            <article class="col-12 col-md-9">
                <?php if(have_posts()): while(have_posts()): the_post(); ?>
                <div class="card p-3 mb-3">
                    <a href="<?php the_permalink(); ?>"><h1 class="card-title mt-3 title"><?php the_title(); ?></h1></a>
                    <hr />
                    <p>
                        <span class="mr-2"><i class="far fa-calendar-alt"></i><?php the_time('Y/m/d'); ?></span>
                        <i class="fas fa-tags"></i><?php the_category( ' / ' ); ?>
                    </p>
                    <div class="row">
                        <div class="col-4">
                            <a href="<?php the_permalink(); ?>"><img class="img-thumbnail" src="<?php the_post_thumbnail_url('midium'); ?>"></a>
                        </div>
                        <div class="col-8">
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
            <div class="col-12 col-md-3">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>