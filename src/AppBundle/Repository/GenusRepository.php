<?php
/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 10/06/2019
 * Time: 1:25
 */

namespace AppBundle\Repository;

use AppBundle\Entity\Genus;
use Doctrine\ORM\EntityRepository;

class GenusRepository extends EntityRepository
{
    /**
     * @return Genus[]
     */
    public function findAllPublished()
    {
        return $this->createQueryBuilder('genus')
            ->andWhere('genus.isPublished = :isPublished')
            ->setParameter('isPublished',true)
            ->getQuery()
            ->execute();
    }
}