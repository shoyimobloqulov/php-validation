<?php

namespace Shoyim\PhpValidation\Rule;

class EmptyRule extends AbstractRule
{
    private $ruleName = 'empty';

    public function check($value, $params = null)
    {
        return empty($value);
    }

    public function getMessage()
    {
        return 'The value is empty';
    }

    public function getRuleName()
    {
        return $this->ruleName;
    }
}