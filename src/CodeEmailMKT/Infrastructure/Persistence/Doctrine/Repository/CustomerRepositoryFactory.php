<?php
/**
 * Created by PhpStorm.
 * User: Yuri
 * Date: 23/11/2016
 * Time: 22:15
 */

namespace CodeEmailMKT\Infrastructure\Persistence\Doctrine\Repository;


use CodeEmailMKT\Domain\Entity\Customer;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;

class CustomerRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : CustomerRepository
    {
        $entityManager = $container->get(EntityManager::class);
        return $entityManager->getRepository(Customer::class);
    }
}