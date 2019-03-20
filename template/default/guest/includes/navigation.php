<?php

    $auth_navigation = [
                            [   
                                'link' => domain."/login", 
                                'nav' => "Login",
                                'hide' => ($this->auth())
                            ],

                            [   
                                'link' => domain."/user/my-account", 
                                'nav' => "My Account"
                            ],

                            [   
                                'link' => domain."/shop/cart", 
                                'nav' => "Shopping Cart"
                            ],

                            [   
                                'link' => domain."/shop/checkout", 
                                'nav' => "Check Out"
                            ],


                            [   
                                'link' => domain."/login/logout", 
                                'nav' => "Logout",
                                'hide' => (!$this->auth())
                            ],

                        ];

    $main_navigation_left = [
                         

                            [   
                                'link' => domain."/shop", 
                                'nav' => "Shop",
                                'active' => "shop"
                            ],

                            [   
                                'link' => domain."/about", 
                                'nav' => "About Us",
                                'active' => "about"
                            ],

                            [   
                                'link' => domain."/blog", 
                                'nav' => "Blog",
                                'active' => "blog",
                            ],

                        ];

    $main_navigation_right = [
                          

                            [   
                                'link' => domain."/gallery", 
                                'nav' => "Gallery",
                                'active' => "gallery"
                            ],

                            [   
                                'link' => domain."/contact", 
                                'nav' => "Contact Us",
                                'active' => "contact"
                            ],

                        ];

