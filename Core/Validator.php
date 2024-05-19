<?php

namespace Core;
class Validator
{
    private $data;
    private $errors = [];

    /**
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @param $field
     * @param $rules
     * @return void
     */
    public function validate($field, $rules)
    {
        $rules = explode('|', $rules);

        foreach ($rules as $rule) {
            if ($rule === 'required' && empty($this->data[$field])) {
                $this->addError($field, 'The ' . $field . ' field is required');
            }

            if ($rule === 'email' && !filter_var($this->data[$field], FILTER_VALIDATE_EMAIL)) {
                $this->addError($field, 'The ' . $field . ' field must be a valid email address');
            }

            if (strpos($rule, 'min') !== false) {
                $length = (int) filter_var($rule, FILTER_SANITIZE_NUMBER_INT);
                if (strlen($this->data[$field]) < $length) {
                    $this->addError($field, 'The ' . $field . ' field must be at least ' . $length . ' characters');
                }
            }

            if (strpos($rule, 'max') !== false) {
                $length = (int) filter_var($rule, FILTER_SANITIZE_NUMBER_INT);
                if (strlen($this->data[$field]) > $length) {
                    $this->addError($field, 'The ' . $field . ' field must be less than ' . $length . ' characters');
                }
            }
        }
    }

    /**
     * @param $field
     * @param $error
     * @return void
     */
    public function addError($field, $error)
    {
        $this->errors[$field][] = $error;
    }

    public function errors()
    {
        return $this->errors;
    }

    public function passed()
    {
        return empty($this->errors);
    }
}
