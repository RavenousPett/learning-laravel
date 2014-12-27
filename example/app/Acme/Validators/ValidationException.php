<?php namespace Acme\Validators;

use Exception;

/**
 * Created by PhpStorm.
 * User: Rich
 * Date: 27/12/14
 * Time: 10:36
 */

class ValidationException extends Exception {

    protected $errors;

    public function __construct($message, $errors, $code = 0, Exception $previous = null){

        $this->errors = $errors;

        parent::__construct($message, $code, $previous);

    }

    public function getErrors(){

        return $this->errors;

    }


}