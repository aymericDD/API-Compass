<?php
/**
 * Created by PhpStorm.
 * User: Rico
 * Date: 12/03/2015
 * Time: 22:09
 */

use \Doctrine\Common\Cache\ApcCache;
use \Doctrine\Common\Cache\ArrayCache;

//============================================\\
//========== Configuration Database ==========\\
//============================================\\

// Register Doctrine DBAL
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    // Doctrine DBAL settings goes here
    'dbs.options' => array (
        'mysql_read' => array(
            'driver'    => 'pdo_mysql',
            'host'      => 'localhost',
            'dbname'    => 'api_campus',
            'user'      => 'root',
            'password'  => 'root',
            'charset'   => 'utf8',
        ),
        'mysql_write' => array(
            'driver'    => 'pdo_mysql',
            'host'      => 'localhost',
            'dbname'    => 'api_campus',
            'user'      => 'root',
            'password'  => 'root',
            'charset'   => 'utf8',
        ),
    ),
));

// Register Doctrine ORM
$app->register(new Nutwerk\Provider\DoctrineORMServiceProvider(), array(
    'db.orm.proxies_dir'           => __DIR__ . '/cache/doctrine/proxy',
    'db.orm.proxies_namespace'     => 'DoctrineProxy',
    'db.orm.cache'                 =>
        !$app['debug'] && extension_loaded('apc') ? new ApcCache() : new ArrayCache(),
    'db.orm.auto_generate_proxies' => true,
    'db.orm.entities'              => array(array(
        'type'      => 'annotation',       // entity definition
        'path'      => __DIR__ . '/src',   // path to your entity classes
        'namespace' => 'API\Campus\Entity', // your classes namespace
    )),
));

//========================================\\
//========== Configuration Twig ==========\\
//========================================\\

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../src/API/Campus/Views',
));

//========== Configuration Layout twig ==========\\

$app->before(function () use ($app) {
    $app['twig']->addGlobal('layout', $app['twig']->loadTemplate('Layout.html.twig'));
});

//==============================================\\
//========== Configuration serializer ==========\\
//==============================================\\

$app->register(new Silex\Provider\SerializerServiceProvider());