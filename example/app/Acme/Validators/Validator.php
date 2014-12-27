<?php namespace Acme\Validators;

use Validator as V;

/**
 * Created by PhpStorm.
 * User: Rich
 * Date: 27/12/14
 * Time: 10:29
 */

abstract class Validator{

    protected $errors;

    public function isValid(array $attributes){

        $v = V::make($attributes, static::$rules);

        if($v->fails()){
            $this->errors = $v->messages();
            return false;
        }

        return true;

    }

    public function getErrors(){

        return $this->errors;

    }



}