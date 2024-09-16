<?php

namespace Shoyim\PhpValidation;

use Shoyim\PhpValidation\Exception\InvalidRuleException;

class Validator
{
    public $validators = [];
    public $errors = [];

    public function __construct()
    {
        $this->validators = [
            'empty' => new Rules\EmptyRule(),
            'numeric' => new Rules\NumericRule(),
            'string' => new Rules\StringRule(),
            'email' => new Rules\EmailRule(),
            'password' => new Rules\PasswordRule(),
            'required' => new Rules\RequiredRule(),
            'max' => new Rules\MaxRule(),
            'min' => new Rules\MinRule()
        ];
    }

    public function validate($rules, $params)
    {
        foreach ($rules as $ruleField => $ruleString) {
            $ruleArray = explode('|', $ruleString);
            foreach ($ruleArray as $rule) {
                $ruleSettings = $this->parseRule($rule);

                if (isset($this->validators[$ruleSettings['rule']])) {
                    $checkValue = isset($params[$ruleField]) ? $params[$ruleField] : null;

                    if (!$this->validators[$ruleSettings['rule']]->check($checkValue, $ruleSettings['params'])) {
                        $this->errors[$ruleField][] = $this->validators[$ruleSettings['rule']]->getMessage();
                    }
                } else {
                    throw new InvalidRuleException('Rule ' . $rule . ' is not defined');
                }
            }
        }
    }

    private function parseRule($rule)
    {
        $ruleSettings = explode(':', $rule);
        $ruleName = $ruleSettings[0];
        $ruleParams = isset($ruleSettings[1]) ? $ruleSettings[1] : null;

        return [
            'rule' => $ruleName,
            'params' => [$ruleParams]
        ];
    }

    public function fails()
    {
        return count($this->errors) > 0;
    }

    public function passes()
    {
        return count($this->errors) === 0;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getValidators()
    {
        return $this->validators;
    }

    public function setRule(Rules\AbstractRule $rule)
    {
        if (!isset($this->validators[$rule->getRuleName()])) {
            $this->validators[$rule->getRuleName()] = $rule;
        }
    }
}