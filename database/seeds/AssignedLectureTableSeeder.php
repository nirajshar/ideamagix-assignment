<?php

use Illuminate\Database\Seeder;

class AssignedLectureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assignedLecture = factory(App\AssignedLecture::class, 10)->create();
        
    }
}
