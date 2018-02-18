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
            'Debit' => 0,
            'Credit' => 1,
            'Refund' => 0,
            'Fees' => 1,
            'Electricity' => 0,
            'Rent' => 0,
            'Stationary' => 0,
            'Salary' => 0,

        ];

        foreach ($transactionTypes as $name => $is_credit)
        {
            TransactionType::create([
                'name' => $transaction,
                'is_credit'=> $is_credit,
            ]);
        }
    }
}
