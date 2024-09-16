<?php

namespace Shoyim\PhpValidation\Rules;

class UrlRule extends AbstractRule
{
    private $ruleName = 'url';
    private $errorMessage = '';

    public function check($value, $params = null)
    {
        if (!filter_var($value, FILTER_VALIDATE_URL)) {
            $this->errorMessage = 'The value is not a valid URL.';
            return false;
        }

        if (isset($params['protocol']) && strpos($value, $params['protocol'] . '://') !== 0) {
            $this->errorMessage = 'The URL must start with ' . $params['protocol'] . '://.';
            return false;
        }

        return true;
    }

    public function getMessage()
    {
        return $this->errorMessage ?: 'The URL validation failed for an unknown reason.';
    }

    public function getRuleName()
    {
        return $this->ruleName;
    }
}
