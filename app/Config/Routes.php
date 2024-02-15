<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('search', 'Home::search');
$routes->get('post/(:num)', 'Home::individualPost/$1');
$routes->get('home/authorPosts/(:segment)', 'Home::authorPosts/$1');
$routes->get('home/postsByCategory/(:segment)', 'Home::postsByCategory/$1');
$routes->get('register', 'Register::index');
$routes->post('createUser', 'Register::createUser');
$routes->get('login', 'Login::index');
$routes->post('login/log', 'Login::log');
$routes->get('logout', 'Login::logout');
$routes->get('forgot', 'ForgotPassword::index');
$routes->post('forgot_password', 'ForgotPassword::sendResetLink');
$routes->get('reset-password', 'ResetPassword::index');
$routes->post('reset', 'ResetPassword::reset');
$routes->post('like/post/(:num)', 'Posts::likePost/$1');
$routes->get("page/(:any)", "Pages::showSlug/$1");

$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {

    $routes->get('admin', 'Admin::index');
    $routes->get('categories', 'Categories::index');
    $routes->post('categories/save_category', 'Categories::saveCategory');
    $routes->get('categories/edit/(:num)', 'Categories::edit/$1');
    $routes->post('categories/update', 'Categories::update');
    $routes->get('categories/delete/(:num)', 'Categories::delete/$1');

    $routes->get('posts', 'Posts::index');
    $routes->post('add_post', 'Posts::addPost');
    $routes->get('add_post', 'Posts::addPost');
    $routes->get('Posts/editPost/(:num)', 'Posts::editPost/$1');
    $routes->post('posts/update', 'Posts::updatePost/$1');
    $routes->get('posts/delete/(:num)', 'Posts::delete/$1');
    $routes->get('view_post/(:num)', 'Posts::viewPost/$1');
    $routes->get('not_found', 'Home::notFound');
    $routes->post('bulkOption', 'Posts::handleBulkAction');

    $routes->get('comments', 'Comments::index');
    $routes->post('post/(:num)', 'Home::individualPost/$1');
    $routes->post('comment/leaveComment/(:segment)', 'Comments::leaveComment/$1');
    $routes->post('bulkoption', 'Comments::handleBulkOptions');
    $routes->get('comments/delete/(:num)', 'Comments::delete/$1');
    $routes->get('viewComments/(:num)', 'Comments::viewComments/$1');

    $routes->get('users', 'Users::index');
    $routes->post('userBulk', 'Users::userBulk');
    $routes->get('users/editUser/(:num)', 'Users::editUser/$1');
    $routes->get('users/delete/(:num)', 'Users::deleteUser/$1');
    $routes->post('users/update', 'Users::updateUser/$1');
    $routes->get('add_users', 'Users::addUserForm');
    $routes->post('add_user', 'Users::addUser');
    $routes->get('profile', 'Users::profile');
    $routes->post('profile', 'Users::updateProfile');
    $routes->get('courosel', 'Content::index');
    $routes->get('add', 'Content::addCourosel');
    $routes->post('add', 'Content::addCourosel');
    $routes->get('Courosel/edit/(:num)',"Content::editCourosel/$1");
    $routes->post('Courosel/update', 'Content::updateCourosel/$1');
    $routes->get('Courosel/delete/(:num)', 'Content::delete/$1');
    $routes->get('Courosel/copy/(:num)', 'Content::copy/$1');
    $routes->get('sectionB', 'Section::index');
    $routes->get('addSection', 'Section::addSection');
    $routes->post('addSection', 'Section::addSection');
    $routes->get('Section/delete/(:num)', 'Section::delete/$1');
    $routes->get('Section/copy/(:num)', 'Section::copy/$1');
    $routes->get('Section/edit/(:num)', 'Section::editSection/$1');
    $routes->post('editSection', 'Section::updateSection/$1');
    $routes->get('feature', 'Feature::index');
    $routes->get('addFeature', 'Feature::addFeature');
    $routes->post('addFeature', 'Feature::addFeature');
    $routes->get('Feature/copy/(:num)', 'Feature::copy/$1');
    $routes->get('Feature/delete/(:num)', 'Feature::delete/$1');
    $routes->get('Feature/edit/(:num)',"Feature::editFeature/$1");
    $routes->post('updateFeature', 'Feature::updateFeature/$1');

    $routes->get('featureH', 'Feature::featureH');
    $routes->get('addFeatureH', 'Feature::addFeatureH');
    $routes->post('addFeatureH', 'Feature::addFeatureH');
    $routes->get('FeatureH/copy/(:num)', 'Feature::copyH/$1');
    $routes->get('FeatureH/delete/(:num)', 'Feature::deleteH/$1');
    $routes->get('FeatureH/edit/(:num)',"Feature::editFeatureH/$1");
    $routes->post('updateFeatureH', 'Feature::updateFeatureH/$1');

    $routes->get('pages', 'Pages::index');
    $routes->get('addPage', 'Pages::add');
    $routes->post('addPage', 'Pages::add');

    
    $routes->get('Pages/edit/(:num)',"Pages::editPage/$1");
    $routes->post('updatePage', 'Pages::updatePage/$1');
    $routes->get('Pages/delete/(:num)', 'Pages::delete/$1');
});




