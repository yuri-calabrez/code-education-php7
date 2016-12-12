<?php

namespace CodeEmailMKT\Domain\Service;

interface FlashMessageInterface
{
    const MESSAGE_SUCCESS = 0;
    const MESSAGE_INFO = 1;
    const MESSAGE_WARNING = 2;
    const MESSAGE_ERROR = 3;

    public function setNamespace($name);

    public function setMessage($key, $value);

    public function getMessage($key);
}