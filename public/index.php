<?php

error_reporting(-1);
ini_set('display_errors', '1');
set_time_limit(60);


if (isset($_GET['sandbox']) && !empty($_GET['sandbox'])) {
    $name = str_replace(['.', ','], '_', $_GET['sandbox']);
    include_once __DIR__ . "/../bootstrap/storage.php";
    include_once __DIR__ . "/../builds/build_{$name}/public/index.php";
} else {
    error_reporting(255);
    ini_set('display_errors', '1');
    ini_set('xdebug.max_nesting_level', 300);


    /**
     * Laravel - A PHP Framework For Web Artisans
     *
     * @package  Laravel
     * @author   Taylor Otwell <taylorotwell@gmail.com>
     */
    /*
      |--------------------------------------------------------------------------
      | Register The Auto Loader
      |--------------------------------------------------------------------------
      |
      | Composer provides a convenient, automatically generated class loader for
      | our application. We just need to utilize it! We'll simply require it
      | into the script here so that we don't have to worry about manual
      | loading any of our classes later on. It feels nice to relax.
      |
     */

    require __DIR__ . '/../bootstrap/autoload.php';

    /*
      |--------------------------------------------------------------------------
      | Turn On The Lights
      |--------------------------------------------------------------------------
      |
      | We need to illuminate PHP development, so let us turn on the lights.
      | This bootstraps the framework and gets it ready for use, then it
      | will load up this application so that we can run it and send
      | the responses back to the browser and delight our users.
      |
     */

    $app = require_once __DIR__ . '/../bootstrap/app.php';

    /*
      |--------------------------------------------------------------------------
      | Run The Application
      |--------------------------------------------------------------------------
      |
      | Once we have the application, we can handle the incoming request
      | through the kernel, and send the associated response back to
      | the client's browser allowing them to enjoy the creative
      | and wonderful application we have prepared for them.
      |
     */
    $kernel   = $app->make(Illuminate\Contracts\Http\Kernel::class);
    $response = $kernel->handle(
            $request  = Illuminate\Http\Request::capture()
    );


    $response->send();

    $kernel->terminate($request, $response);
}

