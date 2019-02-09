
<?php 


$router =[

''=>'home',
'home'=>'home',
'newsfeed'=>'home',





#websocket controller
'websocket' =>'WebSocketContrdoller',




#api routers
'products_api' =>'ProductsApiController',
'categories_api' =>'CategoriesApiController',
'cms_api' =>'CmsApiController',





#pages routers
'shop' =>'shopController',
'contact' =>'ContactController',
'about' =>'AboutController',
'gallery' =>'Galleryontroller',





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


'admin-profile' => 'AdminProfileController',
'admin-administrators' => 'AdminAdministratorsController',












#routers for users
'register' 			=> 'RegisterController',
'login' 			=> 'LoginController',






];

