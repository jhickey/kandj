<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('/', function()
{
	$data = "home";
	$page = 'home.home';
	return View::make('home.index')->with('data', $data)->with('page',  $page);

});
Route::get('about', function()
{
	$data = "about";
	$page = 'home.aboutus';
	return View::make('home.index')->with('data', $data)->with('page',  $page);
});
Route::get('info', function()
{
	$data = "wedding";
	$page = 'home.wedding';
	return View::make('home.index')->with('data', $data)->with('page',  $page);
});
Route::get('rsvp', function()
{
	$data = "rsvp";
	$page = 'home.rsvp';
	return View::make('home.index')->with('data', $data)->with('page',  $page);
});
Route::get('travel', function()
{
	$data = "travel";
	$page = 'home.travel';
	return View::make('home.index')->with('data', $data)->with('page',  $page);
});
Route::get('registry', function()
{
	$data = "registry";
	$page = 'home.registry';
	return View::make('home.index')->with('data', $data)->with('page',  $page);
});

Route::get('login', array('as' => 'login', 'uses' => 'login@index'));

Route::post('login', array('as' => 'login', 'uses' => 'login@index'));

Route::get('guest', array('before' => 'sentry','as' => 'guest', 'uses' => 'guest@index'));
Route::post('guest', array('as' => 'guest', 'uses' => 'guest@index'));

Route::get('admin', function(){
	return View::make('admin.index');
});

Route::post('user', array('as' => 'user', 'uses' => 'user@index'));

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});

Route::filter('sentry', function()
{
	if (!Sentry::check()) return Response::json(array('success' => false));
});