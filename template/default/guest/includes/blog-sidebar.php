  <div class="col-lg-3 order-lg-1" id="primary-sidebar">
                            <div class="sidebar-inner">
                                <div class="widget blog-widget widget-categories mb--40 mb-md--30 mb-sm--20">
                                    <h3 class="widget-title">Categories</h3>

                                    <ul class="menu list-unstyled">
                                        <?php foreach (Category::all()->sortBy('category') as $category) :

                                            if (($this->post->category->id == $category->id) || 
                                                ($this->category->id == $category->id)) {
                                             $active = 'active';
                                            }else{
                                                $active ='';
                                            }
                                            ?>
                                             <li class="<?=$active;?>">
                                                <a href="<?=domain;?>/<?=$category->url_link();?>">
                                                    <?=ucfirst($category->category);?>
                                                </a>
                                            </li>
                                        <?php endforeach ;?>
                                    </ul>
                                </div>                                       
                                </a>
                                </li>

                                <div class="widget blog-widget widget-recent-posts mb--40 mb-md--30 mb-sm--20">
                                    <h3 class="widget-title">Recent Post</h3>
                                    <div class="recent-post">
                                       <?php foreach (Post::recent_posts(3) as $recent_post ):?>
                                        <div class="recent-post__item">
                                            <div class="recent-post__thumb">
                                                <a href="<?=domain;?>/<?=$recent_post->url();?>">
                                                    <img src="<?=domain;?>/<?=$recent_post->mainimagesmall;?>" alt="<?=$recent_post->url_title();?>">
                                                </a>
                                            </div>
                                            <div class="recent-post__content">
                                                <h3 class="recent-post__title text-truncate">
                                                    <a href="<?=domain;?>/<?=$recent_post->url();?>"><?=$recent_post->title;?></a>
                                                </h3>
                                                <span class="recent-post__meta"><?=$recent_post->format_created_at();?></span>
                                            </div>
                                        </div>
                                       <?php endforeach;?>
                                    </div>
                                </div>

                             <!--    <div class="widget blog-widget widget-archive mb--40 mb-md--30 mb-sm--20">
                                    <h3 class="widget-title">Archives</h3>
                                    <ul class="menu">
                                        <li><a href="blog.html">September 2018</a></li>
                                        <li><a href="blog.html">August 2018</a></li>
                                    </ul>
                                </div> -->
                             
                               <!--  <div class="widget blog-widget widget-tag">
                                    <h3 class="widget-title">Tags</h3>
                                    <div class="tagcloud">
                                        <a href="blog.html">Business</a>
                                        <a href="blog.html">Creative</a>
                                        <a href="blog.html">Strat-up</a>
                                    </div>
                                </div> -->
                            </div>
    </div>