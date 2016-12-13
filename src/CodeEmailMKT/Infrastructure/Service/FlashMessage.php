<?php

namespace CodeEmailMKT\Infrastructure\Service;

use CodeEmailMKT\Domain\Service\FlashMessageInterface;
use Zend\Mvc\Controller\Plugin\FlashMessenger;

class FlashMessage implements FlashMessageInterface
{

    /**
     * @var FlashMessenger
     */
    private $flashMessenger;

    public function __construct(FlashMessenger $flashMessenger)
    {
        $this->flashMessenger = $flashMessenger;
    }

    public function setNamespace(string $name = __NAMESPACE__) : FlashMessage
    {
        $this->flashMessenger->setNamespace($name);
        return $this;
    }

    public function setMessage($key, string $value) : FlashMessage
    {
        switch ($key){
            case self::MESSAGE_SUCCESS:
                $this->flashMessenger->addSuccessMessage($value);
                break;
            case self::MESSAGE_INFO:
                $this->flashMessenger->addInfoMessage($value);
                break;
            case self::MESSAGE_WARNING:
                $this->flashMessenger->addWarningMessage($value);
                break;
            case self::MESSAGE_ERROR:
                $this->flashMessenger->addErrorMessage($value);
                break;
        }

        return $this;
    }

    public function getMessage($key)
    {
        $result = null;
        switch ($key){
            case self::MESSAGE_SUCCESS:
                $result = $this->flashMessenger->getSuccessMessages();
                break;
            case self::MESSAGE_INFO:
                $result = $this->flashMessenger->getInfoMessages();
                break;
            case self::MESSAGE_WARNING:
                $result = $this->flashMessenger->getWarningMessages();
                break;
            case self::MESSAGE_ERROR:
                $result = $this->flashMessenger->getErrorMessages();
                break;
        }
        return count($result) ? $result[0] : null;
    }
}