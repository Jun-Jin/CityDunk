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
            <div class="row justify-content-center bg-white radius">
                <div class="col-12 p-5 text-center ">
                    <h2 class="h2"><?php the_title(); ?></h2>
                    <hr>
                </div>
                <article class="col-12 col-md-8 text-center ">
                    <?php if(have_posts()): while(have_posts()): the_post(); ?>
                    <div class="card p-3 mb-3 text-left">
                        <p class="mr-2 text-right"><i class="far fa-calendar-alt"></i><?php the_time('Y/m/d'); ?></p>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="eye-catch"><?php the_post_thumbnail(); ?></div>
                        <?php else : ?>
                            <div class="eye-catch"><img class="text-center" src="<?php bloginfo('template_url'); ?>/img/noimage.gif"/></div>
                        <?php endif ; ?>
                        <p><?php the_content(); ?></p>
                    </div>
                    <?php endwhile; ?>
                    <div class="row mt-5 mb-5">
                        <div class="col-6 p-2">
                            <p class="mb-0 mt-0"><?php previous_post_link('%link', '前の記事 : %title');?></p>
                        </div>
                        <div class="col-6 p-2">
                            <p class="mb-0 mt-0"><?php next_post_link('%link', '次の記事 : %title');?></p>
                        </div>
                    </div>
                    <?php endif; ?>
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