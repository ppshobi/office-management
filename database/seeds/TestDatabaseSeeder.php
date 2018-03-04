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

        factory('App\Staff', 5)->create();

        //creating 5 course
        factory('App\Course', 5)->create();

        // create 10 students under each course
        foreach (App\Course::all() as $course)
        {
            factory('App\Student', 10)->create(['course_id' => $course->id]);
        }

        // create 10 transactions for each student
        foreach (\App\Student::all() as $student)
        {
            factory('App\Transaction', 10)->create([
                'transactionable_type' => get_class($student), 
                'transactionable_id' => $student->id,
                'transaction_type_id' => 4, 
            ]);
        }

        // create 10 transactions for each staff
        foreach (\App\Staff::all() as $staff)
        {
            factory('App\Transaction', 10)->create([
                'transactionable_type' => get_class($staff),
                'transactionable_id' => $staff->id,
                'transaction_type_id' => 8,
            ]);
        }

        factory('App\Transaction', 100)->create();

        create('App\User', [
            'email' => 'shobi@oryxcloud.com',
            'password' => bcrypt('starman')
        ]);

        echo "\nDone Seeding Test Database\n";

    }
}
