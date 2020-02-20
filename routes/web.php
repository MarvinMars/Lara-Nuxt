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

if (Request::segment(1) !== 'admin' && Request::segment(1) !== 'storage') {
    Route::get('{uri}', 'FrontendController@index')->where('uri', '.*');
}
Route::get('/admin', 'Admin\DefaultController@index');
Route::post('/image', 'Admin\FileController@store');
Route::get('/login', 'Admin\DefaultController@login')->name('login');
Route::get('/register', 'Admin\DefaultController@register')->name('register');


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin', 'Admin\DefaultController@index');
    Route::get('/admin/admin-users', 'Admin\AdminUsersController@index');
    Route::get('/admin/admin-users/create', 'Admin\AdminUsersController@create');
    Route::post('/admin/admin-users', 'Admin\AdminUsersController@store');
    Route::get('/admin/admin-users/{adminUser}/edit',
        'Admin\AdminUsersController@edit')->name('admin/admin-users/edit');
    Route::post('/admin/admin-users/{adminUser}',
        'Admin\AdminUsersController@update')->name('admin/admin-users/update');
    Route::delete('/admin/admin-users/{adminUser}',
        'Admin\AdminUsersController@destroy')->name('admin/admin-users/destroy');
    Route::get('/admin/admin-users/{adminUser}/resend-activation',
        'Admin\AdminUsersController@resendActivationEmail')->name('admin/admin-users/resendActivationEmail');
});

/* Auto-generated profile routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/profile', 'Admin\ProfileController@editProfile');
    Route::post('/admin/profile', 'Admin\ProfileController@updateProfile');
    Route::get('/admin/password', 'Admin\ProfileController@editPassword');
    Route::post('/admin/password', 'Admin\ProfileController@updatePassword');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/posts', 'Admin\PostsController@index');
    Route::get('/admin/posts/create', 'Admin\PostsController@create');
    Route::post('/admin/posts', 'Admin\PostsController@store');
    Route::get('/admin/posts/{post}/edit', 'Admin\PostsController@edit')->name('admin/posts/edit');
    Route::post('/admin/posts/{post}', 'Admin\PostsController@update')->name('admin/posts/update');
    Route::delete('/admin/posts/{post}', 'Admin\PostsController@destroy')->name('admin/posts/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/blocks', 'Admin\BlocksController@index');
    Route::get('/admin/blocks/create', 'Admin\BlocksController@create');
    Route::post('/admin/blocks', 'Admin\BlocksController@store');
    Route::get('/admin/blocks/{block}/edit', 'Admin\BlocksController@edit')->name('admin/blocks/edit');
    Route::post('/admin/blocks/{block}', 'Admin\BlocksController@update')->name('admin/blocks/update');
    Route::delete('/admin/blocks/{block}', 'Admin\BlocksController@destroy')->name('admin/blocks/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/menus', 'Admin\MenusController@index');
    Route::get('/admin/menus/create', 'Admin\MenusController@create');
    Route::post('/admin/menus', 'Admin\MenusController@store');
    Route::get('/admin/menus/{menu}/edit', 'Admin\MenusController@edit')->name('admin/menus/edit');
    Route::post('/admin/menus/{menu}', 'Admin\MenusController@update')->name('admin/menus/update');
    Route::delete('/admin/menus/{menu}', 'Admin\MenusController@destroy')->name('admin/menus/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/heroes', 'Admin\HeroesController@index');
    Route::get('/admin/heroes/create', 'Admin\HeroesController@create');
    Route::post('/admin/heroes', 'Admin\HeroesController@store');
    Route::get('/admin/heroes/{hero}/edit', 'Admin\HeroesController@edit')->name('admin/heroes/edit');
    Route::post('/admin/heroes/{hero}', 'Admin\HeroesController@update')->name('admin/heroes/update');
    Route::delete('/admin/heroes/{hero}', 'Admin\HeroesController@destroy')->name('admin/heroes/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/slides', 'Admin\SlidesController@index');
    Route::get('/admin/slides/create', 'Admin\SlidesController@create');
    Route::post('/admin/slides', 'Admin\SlidesController@store');
    Route::get('/admin/slides/{slide}/edit', 'Admin\SlidesController@edit')->name('admin/slides/edit');
    Route::post('/admin/slides/{slide}', 'Admin\SlidesController@update')->name('admin/slides/update');
    Route::delete('/admin/slides/{slide}', 'Admin\SlidesController@destroy')->name('admin/slides/destroy');
});


///* Auto-generated admin routes */
//Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
//    Route::get('/admin/metas', 'Admin\MetasController@index');
//    Route::get('/admin/metas/create', 'Admin\MetasController@create');
//    Route::post('/admin/metas', 'Admin\MetasController@store');
//    Route::get('/admin/metas/{metum}/edit', 'Admin\MetasController@edit')->name('admin/metas/edit');
//    Route::post('/admin/metas/{metum}', 'Admin\MetasController@update')->name('admin/metas/update');
//    Route::delete('/admin/metas/{metum}', 'Admin\MetasController@destroy')->name('admin/metas/destroy');
//});

///* Auto-generated admin routes */
//Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
//    Route::get('/admin/blocks', 'Admin\BlocksController@index');
//    Route::get('/admin/blocks/create', 'Admin\BlocksController@create');
//    Route::post('/admin/blocks', 'Admin\BlocksController@store');
//    Route::get('/admin/blocks/{block}/edit', 'Admin\BlocksController@edit')->name('admin/blocks/edit');
//    Route::post('/admin/blocks/{block}', 'Admin\BlocksController@update')->name('admin/blocks/update');
//    Route::delete('/admin/blocks/{block}', 'Admin\BlocksController@destroy')->name('admin/blocks/destroy');
//});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/slides', 'Admin\SlidesController@index');
    Route::get('/admin/slides/create', 'Admin\SlidesController@create');
    Route::post('/admin/slides', 'Admin\SlidesController@store');
    Route::get('/admin/slides/{slide}/edit', 'Admin\SlidesController@edit')->name('admin/slides/edit');
    Route::post('/admin/slides/{slide}', 'Admin\SlidesController@update')->name('admin/slides/update');
    Route::delete('/admin/slides/{slide}', 'Admin\SlidesController@destroy')->name('admin/slides/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/categories', 'Admin\CategoriesController@index');
    Route::get('/admin/categories/create', 'Admin\CategoriesController@create');
    Route::post('/admin/categories', 'Admin\CategoriesController@store');
    Route::get('/admin/categories/{category}/edit', 'Admin\CategoriesController@edit')->name('admin/categories/edit');
    Route::post('/admin/categories/{category}', 'Admin\CategoriesController@update')->name('admin/categories/update');
    Route::delete('/admin/categories/{category}',
        'Admin\CategoriesController@destroy')->name('admin/categories/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/contacts', 'Admin\ContactsController@index');
    Route::get('/admin/contacts/create', 'Admin\ContactsController@create');
    Route::post('/admin/contacts', 'Admin\ContactsController@store');
    Route::get('/admin/contacts/{contact}/edit', 'Admin\ContactsController@edit')->name('admin/contacts/edit');
    Route::post('/admin/contacts/{contact}', 'Admin\ContactsController@update')->name('admin/contacts/update');
    Route::delete('/admin/contacts/{contact}', 'Admin\ContactsController@destroy')->name('admin/contacts/destroy');
});


Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::post('/upload/simple', 'Admin\UploadController@upload')->name('upload.simple');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/settings', 'Admin\SettingsController@index');
//    Route::get('/admin/settings/create',                        'Admin\SettingsController@create');
//    Route::post('/admin/settings',                              'Admin\SettingsController@store');
    Route::get('/admin/settings/{setting}/edit', 'Admin\SettingsController@edit')->name('admin/settings/edit');
    Route::post('/admin/settings/{setting}', 'Admin\SettingsController@update')->name('admin/settings/update');
//    Route::delete('/admin/settings/{setting}',                  'Admin\SettingsController@destroy')->name('admin/settings/destroy');
});
