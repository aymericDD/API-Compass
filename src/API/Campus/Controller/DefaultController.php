<?php
/**
 * Created by PhpStorm.
 * User: Rico
 * Date: 14/03/2015
 * Time: 14:03
 */

namespace API\Campus\Controller;

use API\Campus\Entity\Address;
use API\Campus\Entity\Campus;
use API\Campus\Entity\Localisation;
use Symfony\Component\HttpFoundation\Response;

class DefaultController {

    private $_app;

    public function __construct($app)
    {
        $this->_app = $app;
    }

    public function indexAction()
    {
//        $json_string = file_get_contents("http://api-supinfo.web-heberg.net/?campus=all");
//        $parsed_json = json_decode($json_string);
//        foreach($parsed_json->campus as $key => $value) {
//            $json_string2 = file_get_contents("http://api-supinfo.web-heberg.net/?campus=$value");
//            $parsed_json2 = json_decode($json_string2);
//            //========== Get Localisation ==========\\
//            $localisation = new Localisation();
//            $localisation->setLat(floatval($parsed_json2->localisation->lat));
//            $localisation->setLng(floatval($parsed_json2->localisation->lng));
//            //========== Get address ==========\\
//            $address = new Address();
//            $address->setCodepostale(intval($parsed_json2->adresse->codepostale));
//            $address->setRue($parsed_json2->adresse->rue);
//            $address->setVille($parsed_json2->adresse->ville);
//            //========== Set campus ==========\\
//            $campus = new Campus();
//            $campus->setAddress($address);
//            $campus->setLocalisation($localisation);
//            $campus->setName($value);
//            $this->_app['db.orm.em']->persist($campus);
//            $this->_app['db.orm.em']->flush();
//
//        }

        return $this->_app['twig']->render('Pages/index.html.twig');
    }

    public function getAllCampusAction()
    {
        $repositoryCampus = $this->_app['db.orm.em']->getRepository('API\Campus\Entity\Campus');
        $campuses = $repositoryCampus->findAll();
        if(!empty($campuses)) {
            return new Response(
                $this->_app['serializer']->serialize($campuses, "json"),
                200,
                ['Content-Type' => 'application/json']
            );
        }
        $error = array("message" => "No campus");
        return $this->_app->json($error, 404);
    }

    public function getCampusByNameAction($name)
    {
        $campuses = $this->_app['db.orm.em']->getRepository('API\Campus\Entity\Campus');
        $campus = $campuses->findBy(array("name" => $name));
        if(!empty($campus)) {
            return new Response(
                $this->_app['serializer']->serialize($campus, "json"),
                200,
                ['Content-Type' => 'application/json']
            );
        }
        $error = array("message" => "The campus $name was not found.");
        return $this->_app->json($error, 404);

    }

}