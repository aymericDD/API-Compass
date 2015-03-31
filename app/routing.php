<?php
/**
 * Created by PhpStorm.
 * User: Rico
 * Date: 12/03/2015
 * Time: 22:08
 */

$app->get('/api/campus/', 'api.campus.defaultController:indexAction');

$app->get('/api/campus/all', 'api.campus.defaultController:getAllCampusAction');

$app->get('/api/campus/{name}', 'api.campus.defaultController:getCampusByNameAction');