<?php

class TasksTableSeeder extends Seeder{

    public function run(){

        Task::truncate();

        Task::create([
            'title' => 'Build deck',
            'body'    => 'Go to homebase first',
            'user_id' => 2,
            'completed' => 0

        ]);

        Task::create([
            'title' => 'Finish web cast',
            'body'    => 'Before wife gets mad',
            'user_id' => 1,
            'completed' => 0

        ]);

    }

}