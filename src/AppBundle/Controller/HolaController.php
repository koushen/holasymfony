<?php
/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 11/05/2019
 * Time: 19:18
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Genus;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class HolaController extends Controller
{
    /**
     * @Route("/hola/new",name="new")
     */
    public function newAction(){
        $genus = new Genus();
        $genus->setName('Cosa'.rand(1,100));
        $genus->setDescription('description '.rand(1,1000));
        $em = $this->getDoctrine()->getManager();
        $em->persist($genus);
        $em->flush();
        return new Response('<html><body><H1>GENUS CREATED!!</H1></body></html>');
    }

    /**
     * @Route("/hola/list",name="list")
     */
    public function listAction(){
        $em = $this->getDoctrine()->getManager();
        $res = $em->getRepository("AppBundle:Genus")
            ->findAllPublished();
        return $this->render('hola/list.html.twig',[
            'res'  =>  $res
        ]);
    }

    /**
     * @Route("hola/item/{item}",name="item")
     */
    public function itemAction($item){
        $em = $this->getDoctrine()->getManager();
        $itemFound = $em->getRepository("AppBundle:Genus")->findOneBy(
            ['name'=>$item]
        );
        if(!$itemFound){
            throw $this->createNotFoundException('No item found');
        }
        return $this->render('hola/item.html.twig',[
            'item'  =>  $itemFound
        ]);
    }
    /**
     * @Route("/hola/{name}", name="homepage")
     */
    public function nameAction($name){
        return $this->render('hola/hola.html.twig',[
            'name'  =>  $name
        ]);
    }

    /**
     * @Route("/hola/api/{pokemon}", name="api_pokemon")
     * @Method("GET")
     */
    public function getCosa($pokemon){
        $data = [
            [
                'name'=> 'pikachu',
                'color'=> 'yellow',
                'type'=>'electric'
            ],
            [
                'name'=> 'bulbasur',
                'color'=> 'green',
                'type'=>'plant'
            ],
            [
                'name'=> 'squirtle',
                'color'=> 'blue',
                'type'=>'water'
            ]
        ];
        $finalData = [
            $pokemon => $data
        ];
        return new  JsonResponse($finalData);
    }
}