<?php
/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 11/05/2019
 * Time: 19:18
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class HolaController
{

    /**
     * @Route("/hola")
     */
    public function showAction(){
        return new Response('HOLA QUE TAL CHAVAL!!');
    }

    /**
     * @Route("/hola/{name}")
     */
    public function nameAction($name){
        return new Response('HOLA QUE TAL '.$name.'!!');
    }
}