<?php

namespace Shoyim\PhpValidation\Rules;

class RequiredRule extends AbstractRule
{
    private $ruleName = 'required';

    public function check($value, $params = null)
    {
        return isset($value);
    }

    public function getMessage()
    {
        return 'The value is required';
    }

    public function getRuleName()
    {
        return $this->ruleName;
    }
}