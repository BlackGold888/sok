<?php

namespace Core;
class Validator
{
    private $data;
    private $errors = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

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

//example //TODO remove this
// $validator = new Validator([
//     'email' => 'test',
//     'password' => '123'
// ]);
//
//    $validator->validate('email', 'required|email');
//
//    if ($validator->passed()) {
//        echo 'Validation passed';
//    } else {
//        echo 'Validation failed';
//    }
//
//    var_dump($validator->errors());
//
//    $validator->validate('password', 'required|min:6|max:12');