<?php

namespace Shoyim\PhpValidation\Rules;
// Super class function or objects collection
abstract class AbstractRule
{
    abstract public function check($value, $params = null);
    abstract public function getMessage();
    abstract public function getRuleName();
}