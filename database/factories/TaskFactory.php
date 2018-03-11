<?php

use Faker\Generator as Faker;
use App\Models\Task;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->name,
        'status_id' => function(){
            return random_int(1,2);
        },
        'due_to' => \Carbon\Carbon::now()->addDays(3)
    ];
});
