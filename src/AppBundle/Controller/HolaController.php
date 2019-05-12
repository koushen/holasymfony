<?php
/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 11/05/2019
 * Time: 19:18
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HolaController extends Controller
{
    /**
     * @Route("/hola/{name}")
     */
    public function nameAction($name){
        return $this->render('hola/hola.html.twig',[
            'name'  =>  $name
        ]);
    }
}