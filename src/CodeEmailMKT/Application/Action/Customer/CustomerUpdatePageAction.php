<?php

namespace CodeEmailMKT\Application\Action\Customer;

use CodeEmailMKT\Application\Form\CustomerForm;
use CodeEmailMKT\Application\Form\HttpMethodElement;
use CodeEmailMKT\Domain\Persistence\CustomerRepositoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template;

class CustomerUpdatePageAction
{

    private $template;
    /**
     * @var CustomerRepositoryInterface
     */
    private $repository;
    /**
     * @var RouterInterface
     */
    private $router;

    public function __construct(CustomerRepositoryInterface $repository, Template\TemplateRendererInterface $template, RouterInterface $router)
    {
        $this->template = $template;
        $this->repository = $repository;
        $this->router = $router;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $id = $request->getAttribute("id");
        $entity = $this->repository->find($id);
        $form = new CustomerForm();
        $form->add(new HttpMethodElement('PUT'));
        $form->bind($entity);
        if ($request->getMethod() == "PUT") {
            $flash = $request->getAttribute('flash');
            $dataRaw = $request->getParsedBody();
            $form->setData($dataRaw);
            if($form->isValid()) {
                $entity = $form->getData();
                $this->repository->update($entity);
                $flash->setMessage('success', "Contato editado com sucesso!");
                $uri = $this->router->generateUri('customer.list');
                return new RedirectResponse($uri);
            }
        }
        return new HtmlResponse($this->template->render("app::customer/update", ["form" => $form]));
    }
}
