<?php

use Illuminate\Database\Seeder;

class TestDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding Test Database\n";

        $this->call(TransactionTypesSeeder::class);

        //creating 5 course
        factory('App\Course', 5)->create();

        // create 10 students under each course
        foreach (App\Course::all() as $course)
        {
            factory('App\Student', 10)->create(['course_id' => $course->id]);
        }

        //create 10 transactions for each student
        foreach (\App\Student::all() as $student)
        {
            factory('App\Transaction', 10)->create(['student_id' => $student->id]);
        }

        echo "\nDone Seeding Test Database\n";

    }
}
