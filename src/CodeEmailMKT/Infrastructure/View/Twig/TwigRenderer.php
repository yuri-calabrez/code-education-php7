<?php

namespace CodeEmailMKT\Infrastructure\View\Twig;

use Twig_Environment as TwigEnvironment;
use \Zend\Expressive\Twig\TwigRenderer as ZendTwigRenderer;

/**
 * Template implementation bridging league/plates
 */
class TwigRenderer extends ZendTwigRenderer
{
    /**
     * @return TwigEnvironment
     */
    public function getTemplate(): TwigEnvironment
    {
        return $this->template;
    }
}
