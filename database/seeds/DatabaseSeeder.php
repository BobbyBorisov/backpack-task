<?php

use App\Models\Status;
use App\Models\Task;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status_ids = collect([
            Status::create(['name' => 'Started']),
            Status::create(['name' => 'Finished'])
        ])->pluck('id')->toArray();

        factory(Task::class,50)->create([
            'status_id' => function () use ($status_ids){
                return $status_ids[array_rand($status_ids)];
            }
        ]);

        factory(User::class)->create([
            'email' => 'admin@mindhub.com'
            //password => secret
        ]);
    }
}
