<?php

namespace CodeEmailMKT\Application\Action\Customer;

use CodeEmailMKT\Application\Form\CustomerForm;
use CodeEmailMKT\Application\Form\HttpMethodElement;
use CodeEmailMKT\Domain\Persistence\CustomerRepositoryInterface;
use CodeEmailMKT\Domain\Service\FlashMessageInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template;

class CustomerRemovePageAction
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
    /**
     * @var CustomerForm
     */
    private $form;

    public function __construct(CustomerRepositoryInterface $repository,
                                Template\TemplateRendererInterface $template,
                                RouterInterface $router,
                                CustomerForm $form
    )
    {
        $this->template = $template;
        $this->repository = $repository;
        $this->router = $router;
        $this->form = $form;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $id = $request->getAttribute("id");
        $entity = $this->repository->find($id);
        $this->form->add(new HttpMethodElement('DELETE'));
        $this->form->bind($entity);
        if ($request->getMethod() == "DELETE") {
            $flash = $request->getAttribute('flash');
            $this->repository->remove($entity);
            $flash->setMessage(FlashMessageInterface::MESSAGE_SUCCESS, "Contato removido com sucesso!");
            $uri = $this->router->generateUri('customer.list');
            return new RedirectResponse($uri);
        }
        return new HtmlResponse($this->template->render("app::customer/delete", ["form" => $this->form]));
    }
}
