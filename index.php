<?php

/*
|--------------------------------------------------------------------------
| Autoload
|--------------------------------------------------------------------------
|
| After running "composer install", we can use the autoloader file created.
|
*/
$ds=DIRECTORY_SEPARATOR;
include __DIR__."app".$ds."core".$ds."Handler.php";
include  __DIR__."app".$ds."core".$ds."Session.php";
include  __DIR__."app".$ds."core".$ds."App.php";
include __DIR__."app".$ds."core".$ds."Request.php";
include __DIR__."app".$ds."core".$ds."Environment.php";
include __DIR__."app".$ds."core".$ds."Response.php";
include __DIR__."app".$ds."core".$ds."LoginController.php";
include __DIR__."app".$ds."core".$ds."View.php";
include __DIR__."app".$ds."core".$ds."Redirector.php";
include __DIR__."app".$ds."utility".$ds."Utility.php";
include __DIR__."app".$ds."core".$ds."Components".$ds."AuthComponent.php";
include __DIR__."app".$ds."core".$ds."Component.php";
include __DIR__."app".$ds."core".$ds."Components".$ds."SecurityComponent.php";
include __DIR__."app".$ds."core".$ds."Config.php";
include __DIR__."app".$ds."core".$ds."Logger.php";
include __DIR__."app".$ds."core".$ds."Cookie.php";
include __DIR__."vendor".$ds."gregwar".$ds."captcha".$ds."CaptchaBuilder.php";
include __DIR__."vendor".$ds."gregwar".$ds."captcha".$ds."CaptchaBuilderInterface.php";
include __DIR__."vendor".$ds."gregwar".$ds."captcha".$ds."PhraseBuilderInterface.php";




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