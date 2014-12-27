<?php namespace Acme\Validators;

/**
 * Created by PhpStorm.
 * User: Rich
 * Date: 27/12/14
 * Time: 10:24
 */

class TaskValidator extends Validator{


    protected static $rules = [
        'title' => 'required',
        'body' => 'required',
        'assign' =>'required'
    ];


}