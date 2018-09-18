<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Route::get('/', 'MainController@index')->name('index');

Route::resources(
    [
        '/categories' => 'CategoriesController',
        '/products' => 'ProductsController',
        '/users' => 'UserController',
    ]
);
Route::post('/products/{product}/upload', 'ProductsController@uploadImage')->name('product.upload');

Route::get('/products/{product}/activate', 'ProductsController@activate')->name('product.activate');
Route::delete('/products/{product}/complete', 'ProductsController@destroyComplete')->name('products.destroyComplete');

Route::post('/categories/properties', 'CategoriesController@getProperties')->name('categories.properties');

//MEDIA
Route::get('/media/{mediaId}/main', 'MediaController@setMain')->name('media.setMain');
Route::get('/media/{mediaId}/delete', 'MediaController@delete')->name('media.delete');

//FAVORITES
Route::get('/favorite', 'FavoriteController@index')->name('favorite.index');
Route::get('favorite/{productId}/create', 'FavoriteController@create')->name('favorite.create');
Route::get('favorite/{productId}/delete', 'FavoriteController@delete')->name('favorite.delete');

//COMPARISON
Route::get('/comparison', 'ComparisonController@index')->name('comparison.index');
Route::get('/comparison/{category}', 'ComparisonController@category')->name('comparison.category');
Route::get('comparison/{productId}/create', 'ComparisonController@create')->name('comparison.create');
Route::get('comparison/{productId}/delete', 'ComparisonController@delete')->name('comparison.delete');

//ADMIN
Route::get('/admin/users', 'UserController@index')->name('admin.users');
Route::delete('/admin/users/{userId}/favorite/{productId}', 'FavoriteController@adminDestroy')->name('admin.favorites.remove');
Route::get('/admin/products', 'ProductsController@index')->name('admin.products');
Route::get('/admin/products/{productId}/edit', 'ProductsController@edit')->name('admin.products.edit');

Route::get('/admin/categories', 'CategoriesController@adminCategories')->name('admin.categories');
Route::get('/admin/{category}/show', 'CategoriesController@adminShow')->name('admin.categories.show');
// Route::get('/admin/products/{productId}/delete', 'ProductsController@delete')->name('admin.products.delete');


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register')->name('register');

//Dashbord
Route::get('dashboard', 'UserController@dashboard')->name('dashboard');

//Search
Route::post('search', 'SearchController@index')->name('search');
