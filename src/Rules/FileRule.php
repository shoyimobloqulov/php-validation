<?php

namespace Shoyim\PhpValidation\Rules;

class FileRule extends AbstractRule
{
    private $ruleName = 'file';
    private $errorMessage = ''; 

    public function check($value, $params = null)
    {
        $maxSize = $params['max_size'] ?? 2 * 1024 * 1024;
        $minSize = $params['min_size'] ?? 1; 
        $allowedTypes = $params['types'] ?? ['image/jpeg', 'image/png'];

        if (!isset($value['tmp_name']) || !is_uploaded_file($value['tmp_name'])) {
            $this->errorMessage = 'The file was not uploaded or is invalid.';
            return false;
        }

        if ($value['size'] > $maxSize) {
            $this->errorMessage = 'The file exceeds the maximum allowed size of ' . ($maxSize / 1024) . 'KB.';
            return false;
        }

        if ($value['size'] < $minSize) {
            $this->errorMessage = 'The file is smaller than the minimum required size of ' . ($minSize / 1024) . 'KB.';
            return false;
        }

        if (!in_array($value['type'], $allowedTypes)) {
            $this->errorMessage = 'The file type is not supported. Allowed types are: ' . implode(', ', $allowedTypes) . '.';
            return false;
        }

        return true;
    }

    public function getMessage()
    {
        return $this->errorMessage ?: 'The file validation failed for an unknown reason.';
    }

    public function getRuleName()
    {
        return $this->ruleName;
    }
}
