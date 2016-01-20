<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/condition-de-vente', ['as' => 'url_vers_cgv', function () {
    return view('cgv');
}]);


Route::get('/test', [
    'uses' => 'MainController@essai'
]);

Route::get('/test-tableau',
    [
        "uses"=>"MainController@tableau",
        'as'=> "route_test_tab",
    ]);

Route::get('/notre-equipe',
    [
        "uses"=>"MainController@team",
        'as'=> "route_team",
    ]);

Route::get('/test-age/{age}', [
    'uses' => 'MainController@info',
    'as' => 'route_age'
]);

Route::get('/produits/{prod}', [
    'uses' => 'ProductController@show_prod',
    'as' => 'route_prod'
]);








/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    /* ANY = GET et POST*/

        Route::any('/contact',
            [
            "uses"=>"MainController@contact",
            'as'=> "route_contact"
            ]);


        Route::get('/', [
            "uses" => "MainController@home",
            "as" => "home",
            ]);

        Route::any('/feedback',[
            "uses" => "MainController@feed",
            "as" => "go_back",
            ]);


    Route::group(['prefix' => '/admin'], function() {

        Route::any('/', [
            "uses" => "AdminController@admin",
            "as" => "route_admin",

        ]);

        Route::get('/categories', [
            "uses" => "AdminController@cat",
            "as" => "route_cat",
        ]);

        Route::any('/categories/ajouter', [
            "uses" => "AdminController@cat_add",
            "as" => "route_cat_add"
        ]);

        Route::any('/categories/supprimer/{cat}', [
            "uses" => "AdminController@cat_supp",
            "as" => "route_cat_supp" ,
        ]);
    });

});
