<?php

/*
|--------------------------------------------------------------------------
| Autoload
|--------------------------------------------------------------------------
|
| After running "composer install", we can use the autoloader file created.
|
*/

include __DIR__."app/core\\Handler.php";
include  __DIR__."app/core\Session.php";
include  __DIR__."app/core\\App.php";
include __DIR__."app/core\\Request.php";
include __DIR__."app/core\\Environment.php";
include __DIR__."app/core\\Response.php";
include __DIR__."app/core\\LoginController.php";
include __DIR__."app/core\\View.php";
include __DIR__."app/core\\Redirector.php";
include __DIR__."app/utility\\Utility.php";
include __DIR__."app/core/Components\\AuthComponent.php";
include __DIR__."app/core\\Component.php";
include __DIR__."app/core\\Cookie.php";
include __DIR__."vendor/gregwar/captcha\\CaptchaBuilder.php";

/*
|--------------------------------------------------------------------------
| Define Application Configuration Constants
|--------------------------------------------------------------------------
|
| PUBLIC_ROOT: 	the root URL for the application (see below).
| BASE_DIR: 	path to the directory that has all of your "app", "public", "vendor", ... directories.
| IMAGES:		path to upload images, don't use it for displaying images, use Config::get('root') . "/img/" instead.
| APP:			path to app directory.
|
*/

// Config::set('base', str_replace("\\", "/", dirname(__DIR__)));
// Config::set('images', str_replace("\\", "/", __DIR__) . "/img/");
// Config::set('app', Config::get('base') . "/app/");

define('BASE_DIR', str_replace("\\", "/", __DIR__)."/");
define('IMAGES',   str_replace("\\", "/", __DIR__) . "/public/img/");
define('APP',  BASE_DIR . "app/");

/*
|--------------------------------------------------------------------------
| Register Error & Exception handlers
|--------------------------------------------------------------------------
|
| Here we will register the methods that will fire whenever there is an error
| or an exception has been thrown.
|
*/

Handler::register();

/*
|--------------------------------------------------------------------------
| Start Session
|--------------------------------------------------------------------------
|
*/

Session::init();

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will create the application instance which will take care of routing 
| the incoming request to the corresponding controller and action method if valid
|
*/

$app = new App();

// Config::set('root', $app->request->root());
define('PUBLIC_ROOT', $app->request->root()."/");

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
| 
| Once we have the application instance, we can handle the incoming request
| and send a response back to the client's browser.
|
*/

$app->run();