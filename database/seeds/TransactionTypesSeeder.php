<?php

use Illuminate\Database\Seeder;
use App\TransactionType;

class TransactionTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactionTypes = [
            'Debit'          => 0,
            'Refund'         => 0,
            'Electricity'    => 0,
            'Rent'           => 0,
            'Stationary'     => 0,
            'Salary'         => 0,
            'Credit'         => 1,
            'Fees'           => 1,
            'Admission Fees' => 1,
        ];

        foreach ($transactionTypes as $name => $is_credit)
        {
            TransactionType::create([
                'name' => $name,
                'is_credit'=> $is_credit,
            ]);
        }
    }
}
