<?php

namespace Shoyim\PhpValidation\Exception;

use Exception;

class InvalidRuleException extends Exception
{
    public function __construct($message = "")
    {
        parent::__construct($message);
    }
}