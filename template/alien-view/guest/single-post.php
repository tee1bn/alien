
    <?php

    $page_title = "";
    $page_description = "";
    include 'includes/header.php';?>


        <!-- Breadcrumb area Start -->

        <div class="breadcrumb-area bg--white-6 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">Blog</h1>
                        <ul class="breadcrumb justify-content-center">
                            <li><a href="<?=domain;?>">Home</a></li>
                            <li><a href="<?=domain;?>/blog">Blog</a></li>
                            <li class="current"><span>Single Post </span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb area End -->

        <!-- Main Content Wrapper Start -->
        <div id="content" ng-controller="ShopController"  class="main-content-wrapper">
            <div class="page-content-inner blog-page-sidebar">
                <div class="container">
                    <div class="row ptb--70 ptb-md--50 ptb-sm--30">
                        <div class="col-lg-9 order-lg-2 mb-md--35" id="main-content">
                            <div class="single-post">
                                <!-- Single Blog Start Here -->
                                <article class="single-post-details">
                                    <div class="entry-header">
                                        <h2 class="entry-title"><?=$post->title;?></h2>
                                        <div class="entry-meta">
                                            <div class="entry-meta-top">
                                                <a href="blog.html" class="posted-on"><?=$post->format_created_at();?></a>
                                                <span class="meta-separator">-</span>
                                                <a href="blog.html" class="posted-by">By <?=$post->author();?></a>
                                                <span class="meta-separator">/</span>
                                                <a href="<?=domain;?>/<?=$post->category->url_link();?>" style="text-transform: capitalize;">
                                                    <?=$post->category->category;?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="entry-thumbnail">
                                        <img src="<?=asset;?>/assets/img/blog/post-1-1.jpg" alt="Post Thumbnail">
                                    </div>
                                    <div class="entry-content"><?=$post->content;?>
                                    </div>
                                    <div class="entry-footer-meta">
                                        <!-- <div class="tag-list">
                                            <span>
                                                <i class="fa fa-tags"></i>
                                            </span>
                                            <span>
                                                <a href="blog.html">Business</a>,
                                                <a href="blog.html">Creative</a>,
                                                <a href="blog.html">Start-up</a>
                                            </span>
                                        </div>
                                        <div class="author">
                                            <span>
                                                Author: <a href="blog.html">John Snow</a>
                                            </span>
                                        </div> -->
                                    </div>
                                </article>
                                <!-- Single Blog End Here -->

                                <!-- Social Sharing Icons Start Here -->
                                <div class="post-share sticky-social">
                                    <ul class="social social-big social-round social-sharing bg-gray-2 vertical">
                                        <li class="social__item">
                                            <a href="facebook.com" class="social__link facebook">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="social__item">
                                            <a href="twitter.com" class="social__link twitter">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="social__item">
                                            <a href="plus.google.com" class="social__link pinterest">
                                                <i class="fa fa-pinterest-p"></i>
                                            </a>
                                        </li>
                                        <li class="social__item">
                                            <a href="plus.google.com" class="social__link google-plus">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Social Sharing Icons End Here -->

                                <!-- Post Navigation Start Here -->
                                <nav class="post-navigation">
                                    <div class="nav-links">
                                        <div class="nav-prev nav-links__inner">
                                            <a href="single-post.html" class="nav-links__link">Prev Post</a>
                                            <span class="nav-links__text">Prev Post</span>
                                            <div class="nav-links__thumb">
                                                <img src="<?=asset;?>/assets/img/blog/m2-s3-1-100x100.jpg" alt="Prev Post">
                                            </div>
                                            <div class="nav-links__content">
                                                <h4 class="nav-links__title">Summer Beach 2019</h4>
                                                <span class="nav-links__meta">August 29, 2018 - by John Snow</span>
                                            </div>
                                        </div>
                                        <div class="nav-next nav-links__inner">
                                            <a href="single-post.html" class="nav-links__link">Next Post</a>
                                            <span class="nav-links__text">Next Post</span>
                                            <div class="nav-links__thumb">
                                                <img src="<?=asset;?>/assets/img/blog/post-2-1-100x100.jpg" alt="Next Post">
                                            </div>
                                            <div class="nav-links__content">
                                                <h4 class="nav-links__title">Summer Night Party</h4>
                                                <span class="nav-links__meta">August 29, 2018 - by John Snow</span>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                                <!-- Post Navigation Start Here -->
                                
                                DISQUS COES HERE

                            </div>
                        </div>

                    <?php    include 'includes/blog-sidebar.php';?>


                    </div>
                </div>
                <div class="container-fluid p-0">
                    <div class="row no-gutters">
                        <div class="col-12">
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row pt--65 pb--55 pt-md--45 pb-md--35 pt-sm--35 pb-sm--25">
                        <div class="col-12">
                            <h4 class="mb--35 text-center">Other Post</h4>
                            <div class="airi-element-carousel related-post"
                                data-slick-options='{
                                    "spaceBetween": 30,
                                    "slidesToShow": 3,
                                    "slidesToScroll": 3
                                }'
                                data-slick-responsive='[
                                    {"breakpoint":991, "settings": {"slidesToShow": 2} },
                                    {"breakpoint":479, "settings": {"slidesToShow": 1} }
                                ]'
                            >
                            <?php foreach ($post->other_posts() as $other_post ):?>
                                <div class="item">
                                    <article class="blog blog-style-2">
                                        <div class="blog-media">
                                            <div class="image">
                                                <a href="single-post.html">
                                                    <img src="<?=asset;?>/assets/img/blog/blog-f-1-500x478.jpg" alt="Blog Thumb">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="blog-info">
                                            <div class="blog-entry-meta">
                                                <a  class="posted-on"><?=$other_post->format_created_at();?></a>
                                                <span class="meta-separator">-</span>
                                                <a href="blog.html" class="posted-by"> By <?=$other_post->author();?></a>
                                            </div>
                                            <h3 class="blog-title blog-title--2">
                                                <a href="<?=domain;?>/<?=$other_post->url();?>"><?=$other_post->title;?> </a>
                                            </h3>
                                            <p class="blog__excerpt"><?=$other_post->intro();?></p>
                                        </div>
                                    </article>
                                </div>
                            <?php endforeach;?>





                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Wrapper Start -->


    <?php
    include 'includes/footer.php';?>