<?php namespace Acme\Services;

use Acme\Validators\TaskValidator;
use Acme\Validators\ValidationException;
use Task;

/**
 * Created by PhpStorm.
 * User: Rich
 * Date: 27/12/14
 * Time: 10:16
 */

class TaskCreatorService{

    protected $validator;

    public function __construct(TaskValidator $validator){

        $this->validator = $validator;

    }

    public function make(array $attributes){

//      determine whether the data is valid
        if($this->validator->isValid($attributes)){

//          create the task
            Task::create([
                'title' => $attributes['title'],
                'body' => $attributes['body'],
                'user_id' => $attributes['assign']
            ]);


            return true;

        }



//      If not, throw exception
        throw new ValidationException('Task validation failed', $this->validator->getErrors());

    }

}