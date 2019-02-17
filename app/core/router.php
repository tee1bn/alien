


<?php 


	$router =[

	''=>'home',
	'home'=>'home',


	#api routers
	'products_api' 		=>'ProductsApiController',
	'categories_api' 	=>'CategoriesApiController',
	'cms_api' 			=>'CmsApiController',

	#users
	'user' 			=>'UserController',





	#pages routers
	'shop' 		=>'shopController',
	'contact' 	=>'ContactController',
	'about' 	=>'AboutController',
	'gallery' 	=>'Galleryontroller',
	'blog'  	=> 'BlogController',
	'forgot-password'  	=> 'forgotPasswordController',





#routers for admin
'admin-products' => 'AdminProductsController',
'admin-categories' => 'AdminCategoriesController',
'admin-orders' => 'AdminOrdersController',
'admin-dashboard' => 'AdminDashboardController',
'admin-users' => 'AdminUsersController',
'admin-newsletter' => 'AdminNewslettersController',
'admin-broadcast' => 'AdminBroadcastController',
'admin-support' => 'AdminSupportController',
'admin-settings' => 'AdminSettingsController',
'admin-testimonials' => 'AdminTestimonialsController',
'admin-adverts' => 'AdminAdvertsController',
'admin-messages' => 'AdminMessagesController',
'admin-cms' => 'AdminCMSController',
'admin-level-settings' => 'AdminLevelSetttingsController',


'admin' => 'AdminController',



'admin-administrators' => 'AdminAdministratorsController',












#routers for users
'register' 			=> 'RegisterController',
'login' 			=> 'LoginController',






];

