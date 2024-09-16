<?php

namespace Shoyim\PhpValidation\Rules;

class StringRule extends AbstractRule
{
    private $ruleName = 'string';

    public function check($value, $params = null)
    {
        return is_string($value);
    }

    public function getMessage()
    {
        return 'The value is not string';
    }

    public function getRuleName()
    {
        return $this->ruleName;
    }
}