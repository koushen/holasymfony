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
use Nelmio\Alice\Fixtures;

class LoadFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /*
         ****REGULAR FIXTURES****

        $genus = new Genus();
        $genus->setName('Cosa'.rand(1,100));
        $genus->setDescription('description '.rand(1,1000));
        $manager->persist($genus);
        $manager->flush();*/
        Fixtures::load(
            __DIR__.'/fixtures.yml',
            $manager,
            [
                'providers' => [$this]
            ]);
    }
    public function vikingName(){
        $gerenate = [
            'Alva',
            'Brynhild',
            'Gudrun',
            'Gunnhild',
            'Gunnvor',
            'Ingrid',
            'Solveig',
            'Torhild',
            'Torunn',
            'Turid',
            'Vigdis',
            'Yngvild',
            'Gunnar',
            'Harald',
            'Arne'
        ];
        return $gerenate[array_rand($gerenate)];
    }
}
