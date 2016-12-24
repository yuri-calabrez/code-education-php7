<?php
/**
 * Created by PhpStorm.
 * User: Yuri
 * Date: 23/11/2016
 * Time: 22:15
 */

namespace CodeEmailMKT\Infrastructure\Persistence\Doctrine\Repository;


use CodeEmailMKT\Domain\Entity\Tag;
use CodeEmailMKT\Domain\Persistence\TagRepositoryInterface;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;

class TagRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : TagRepositoryInterface
    {
        $entityManager = $container->get(EntityManager::class);
        return $entityManager->getRepository(Tag::class);
    }
}