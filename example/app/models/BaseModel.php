<?php
/**
 * Created by PhpStorm.
 * User: Rich
 * Date: 28/12/14
 * Time: 10:48
 */

class BaseModel extends Eloquent{

    protected $errors;

    public static function boot(){

        parent::boot();

        static::saving(function($model){

            return $model->validate();

        });

    }

    public function validate(){

        $validation = Validator::make($this->getAttributes(), static::$rules);

        if($validation->fails())
        {
            $this->errors = $validation->messages();

            return false;
        }

        return true;

    }


    public function getErrors(){

        return $this->errors;

    }


}