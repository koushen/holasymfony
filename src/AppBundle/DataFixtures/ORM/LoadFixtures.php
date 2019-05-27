<?php
/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 28/05/2019
 * Time: 0:33
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Genus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $genus = new Genus();
        $genus->setName('Cosa'.rand(1,100));
        $genus->setDescription('description '.rand(1,1000));
        $em = $this->getDoctrine()->getManager();
        $em->persist($genus);
        $em->flush();
    }
}