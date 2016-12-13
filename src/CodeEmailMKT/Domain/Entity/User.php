<?php
declare(strict_types = 1);
namespace CodeEmailMKT\Domain\Entity;


class User
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $plainPassowrd;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return User
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return User
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return User
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlainPassowrd()
    {
        return $this->plainPassowrd;
    }

    /**
     * @param mixed $plainPassowrd
     * @return User
     */
    public function setPlainPassowrd(string $plainPassowrd)
    {
        $this->plainPassowrd = $plainPassowrd;
        return $this;
    }


    public function generatePassword()
    {
        $password = $this->getPlainPassowrd() ?? uniqid();
        $this->setPassword(password_hash($password, PASSWORD_BCRYPT));
    }

}