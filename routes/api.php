<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/



$this->group(['prefix' => 'messages','namespace' => 'Message'], function ($router) {
    $router->post('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    $router->post('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    $router->post('/thread', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    $router->post('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    $router->put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);


    $router->post('/upload/{id}', 'MessagesController@upload')->name('message.upload');
});



/*
|--------------------------------------------------------------------------
| Yandex Kassa Payments
|--------------------------------------------------------------------------
|
*/
$this->group(['namespace' => 'Payments', 'prefix' => 'payments'], function ($router) {
    $router->resource('order', 'AvisoController');
});

/*
|--------------------------------------------------------------------------
| Profile display for all users
|--------------------------------------------------------------------------
|
*/
$this->group(['middleware' => 'auth', 'prefix' => 'profile', 'namespace' => 'Profile'], function ($router) {


    $router->post('/{user?}', 'ProfileController@show')->where('user', '[0-9]+')->name('profile');
    $router->get('/tags/{tag?}', 'TagController@show')->name('profile.tags');

    $router->post('/fave', 'FavoriteController@index')->name('profile.fave');
    $router->put('/fave/{user}', 'FavoriteController@update')->name('profile.fave.add');
    $router->post('/rating/{user}', 'RatingController@store')->name('profile.rating');

    $router->post('/edit', 'ProfileController@index')->name('profile.edit');
    $router->put('/edit', 'ProfileController@update')->name('profile.update');
    $router->post('/password', 'ProfileController@password')->name('profile.password');
    $router->put('/password', 'ProfileController@changePassword')->name('profile.password.update');
    $router->post('/reviews/{user}', ['as' => 'profile.reviews.show', 'uses' => 'ReviewsController@show']);
    $router->post('/reviews/store/{user}', ['as' => 'profile.reviews.store', 'uses' => 'ReviewsController@store']);
    $router->post('/statistics', 'ProfileController@statistics')->name('profile.statistics');
});



/*
|--------------------------------------------------------------------------
| Tender
|--------------------------------------------------------------------------
|
*/
$this->group(['middleware' => 'auth', 'prefix' => 'tender', 'namespace' => 'Tender'], function ($router) {

    $router->post('/', 'TenderController@index')->name('tender.list');
    $router->post('/comment/{id}', 'TenderController@comment')->name('tender.comment');

    $router->post('/upload', 'FileUploadController@upload')->name('upload');
    $router->post('/create', 'TenderController@store')->name('tender.store');
    $router->get('/tags/{tag?}', 'TagController@show')->name('tender.tags');
    $router->post('/{tender}', 'TenderController@show')->name('tender.show');
    $router->post('/destroy/{tender}', 'TenderController@destroy')->name('tender.destroy');
});


$this->post('/companies', 'Profile\ProfileController@companies')->name('companies');
$this->post('/recommended','Profile\ProfileController@recommended')->name('recommended');
$this->post('/need','Profile\ProfileController@need')->name('needs');
$this->post('/offers','Profile\ProfileController@offers')->name('offers');

$this->post('/demand','Profile\ProfileController@supplyAndDemand')->name('supplyAndDemand');

/*
|--------------------------------------------------------------------------
| Other
|--------------------------------------------------------------------------
|
*/
$this->group(['middleware' => 'auth', 'prefix' => 'other', 'namespace' => 'Other'], function ($router) {
    $router->post('/city/{city?}', 'CityController@show')->name('city');
});

