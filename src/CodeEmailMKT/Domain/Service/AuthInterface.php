<?php


namespace CodeEmailMKT\Domain\Service;


interface AuthInterface
{
    public function authenticate($email, $password);

    public function isAuth();

    public function getUser();

    public function destroy();
}