<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory()->count(5)->create()->each(function($u){
            $u->questions()
            ->saveMany(
                Question::factory()->count(rand(1, 5))->make()
            )
            ->each(function($q){
                $q->answers()->saveMany(Answer::factory()->count(rand(1,5))->make());
            });
        });      
        
        
    }
}
