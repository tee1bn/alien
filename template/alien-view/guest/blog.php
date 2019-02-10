
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
                            <li class="current"><span>Blog Sidebar</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb area End -->

        <!-- Main Content Wrapper Start -->
        <div id="content" class="main-content-wrapper">
            <div class="page-content-inner blog-page-sidebar">
                <div class="container">
                    <div class="row ptb--80 pt-md--60 pb-md--55 pt-sm--50 pb-sm--45">
                        <div class="col-lg-9 order-lg-2 mb-md--40" id="main-content">
                            <div class="row">
                                             
                                <?php if($posts->isNotEmpty()):?>
                                    <?php foreach ($posts as $post): ?>
                                        <div class="col-12 mb--40 mb-md--30 mb-sm--25">
                                            <article class="post">
                                                <div class="post-media">
                                                    <div class="image">
                                                        <img src="<?=domain;?>/<?=$post->image_path;?>" alt="Blog">
                                                        <a href="single-post.html" class="link-overlay">Blog</a>
                                                    </div>
                                                </div>
                                                <div class="post-info post-info--2">
                                                    <div class="post-entry-meta">
                                                        <a href="blog.html">Trends</a>
                                                    </div>
                                                    <h3 class="post-title">
                                                        <a href="<?=domain;?>/<?=$post->url();?>"><?=$post->title;?></a>
                                                    </h3>
                                                    <div class="post-meta">
                                                        <a class="posted-on" tabindex="0"><?=$post->format_created_at();?></a>
                                                        <span class="meta-separator">-</span>
                                                        <a  class="posted-by" tabindex="0">By <?=$post->author();?></a>
                                                    </div>
                                                    <div class="post-content">
                                                        <p><?=$post->intro();?></p>
                                                    </div>
                                                    <a href="<?=domain;?>/<?=$post->url();?>" class="read-more-btn">Read More</a>
                                                </div>
                                            </article>
                                        </div>
                                    <?php endforeach ;?>
                               <?php else :?>

                                    <div class="post">
                                        <center>No posts founds</center>
                                    </div>

                                <?php endif ;?>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <nav class="pagination-wrap">
                                        <ul class="pagination">
                                            

                                               <?=$this->pagination_links($data['for_pages'], $this->per_page);?> 

                                    
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>


                    <?php    include 'includes/blog-sidebar.php';?>
                      
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Wrapper Start -->


   
    <?php    include 'includes/footer.php';?>