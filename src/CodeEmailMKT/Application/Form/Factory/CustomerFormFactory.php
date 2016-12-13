<?php

namespace CodeEmailMKT\Application\Form\Factory;


use CodeEmailMKT\Application\Form\CustomerForm;
use CodeEmailMKT\Application\InputFilter\CustomerInputFilter;
use CodeEmailMKT\Domain\Entity\Customer;
use Interop\Container\ContainerInterface;
use Zend\Hydrator\ClassMethods;

class CustomerFormFactory
{
    public function __invoke(ContainerInterface $container) : CustomerForm
    {
       $form = new CustomerForm();
       $form->setHydrator(new ClassMethods());
       $form->setObject(new Customer());
       $form->setInputFilter(new CustomerInputFilter());

       return $form;
    }
}