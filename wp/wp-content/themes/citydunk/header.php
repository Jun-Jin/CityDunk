<!DOCTYPE html>
<html lang="ja">
<head>
    <?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) header('X-UA-Compatible: IE=edge,chrome=1');?>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); bloginfo('name');?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/base.css" type="text/css" charset="utf-8" media="screen" >
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/common.css" type="text/css" charset="utf-8" media="screen" >
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
    <!-- カスタムフォント読み込み -->
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c|Noto+Sans+JP&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/animate.css" type="text/css" charset="utf-8" media="screen" >
    <?php wp_head(); ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-150280904-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-150280904-1');
    </script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-light wp-3 bg-tran fixed-top pb-3 pt-3 shadow">
            <div class="container">
                <a class="navbar-brand" href="<?php echo home_url() ?>">
                    <?php bloginfo('name'); ?>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="ナビゲーションの切替">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-row-reverse" id="navbarNavDropdown">
                    <ul class="navbar-nav h1 ">
                        <li class="nav-item">
                            <strong><a class="nav-link" href="<?php echo get_page_link( 25 );?>">新着記事</a></strong>
                        </li>
                        <li class="nav-item">
                            <strong><a class="nav-link" href="<?php echo get_category_link( 4 ); ?>">キャラクター</a></strong>
                        </li>
                        <li class="nav-item">
                            <strong><a class="nav-link" href="<?php echo get_category_link( 5 ); ?>">スキル</a></strong>
                        </li>
                        <li class="nav-item">
                            <strong><a class="nav-link" href="<?php echo get_category_link( 3 ); ?>">アイテム</a></strong>
                        </li>
                        <li class="nav-item">
                            <strong><a class="nav-link" href="<?php echo get_category_link( 12 ); ?>">育成</a></strong>
                        </li>
                        <li class="nav-item">
                            <strong><a class="nav-link" href="<?php echo get_category_link( 11 ); ?>">攻略Tips</a></strong>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

