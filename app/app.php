<?php
/**
 * Created by PhpStorm.
 * User: Rico
 * Date: 12/03/2015
 * Time: 21:57
 */

$loader = require __DIR__.'/../vendor/autoload.php';
$loader->add('API', __DIR__.'/../src/');

// This is the default config.
$config = array(
    'debug' => true
);

// Initialize Application
$app = new Silex\Application($config);

// Apply custom config if available
if (file_exists(__DIR__ . '/config.php')) {
    include __DIR__ . '/config.php';
}

$app->register(new Silex\Provider\ServiceControllerServiceProvider());

/**
 * Register controllers as services
 * @link http://silex.sensiolabs.org/doc/providers/service_controller.html
 **/
$app['api.campus.defaultController'] = $app->share(
    function () use ($app) {
        include_once("../src/API/Campus/Controller/DefaultController.php");
        return new \API\Campus\Controller\DefaultController($app);
    }
);

// Map routes to controllers
include __DIR__ . '/routing.php';

return $app;