<?php
declare(strict_types = 1);
namespace CodeEmailMKT\Domain\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Customer
{
    private $id;

    private $name;

    private $email;

    private $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     */
    public function setName(string $name)
    {
        $this->name = $name;
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
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getTags() : Collection
    {
        return $this->tags;
    }

    public function addTags(Collection $tags)
    {
        /** @var Tag $tag */
        foreach ($tags as $tag) {
            //Adicionando o customer na tag
            $tag->getCustomers()->add($this);
            //Adicionando tag no customer
            $this->tags->add($tag);
        }
        return $this;
    }

    public function removeTags(Collection $tags)
    {
        /** @var Tag $tag */
        foreach ($tags as $tag) {
            //Removendo o customer da tag
            $tag->getCustomers()->removeElement($this);
            //Removendo tag do customer
            $this->tags->removeElement($tag);
        }
        return $this;
    }

}