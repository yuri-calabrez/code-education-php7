<?php

namespace CodeEmailMKT\Action;

use CodeEmailMKT\Entity\Cliente;
use CodeEmailMKT\Entity\Endereco;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template;

class TestePageAction
{

    private $template;
    private $manager;

    public function __construct(EntityManager $manager, Template\TemplateRendererInterface $template = null)
    {
        $this->template = $template;
        $this->manager = $manager;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $cliente = new Cliente();
        $endereco = new Endereco();

        $cliente->setNome("João da Silva");
        $cliente->setEmail("joao.silva@mail.com");
        $cliente->setCpf("22556999541");
        $this->manager->persist($cliente);

        $endereco->setCliente($cliente);
        $endereco->setLogradouro("Rua Manuel da Nobrega");
        $endereco->setCidade("São Paulo");
        $endereco->setEstado("SP");
        $endereco->setCep("1112223345");

        $this->manager->persist($endereco);
        $this->manager->flush();

        $clientes = $this->manager->getRepository('CodeEmailMKT\Entity\Endereco')->findAll();

        return new HtmlResponse($this->template->render("app::teste", ['clientes' => $clientes]));
    }
}
