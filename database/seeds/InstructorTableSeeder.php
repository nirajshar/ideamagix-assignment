<?php

use Illuminate\Database\Seeder;

class InstructorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 1000 users with just one line
        $instructor = factory(App\Instructor::class, 10)->create();
    }
}
