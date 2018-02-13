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
            'Debit',
            'Credit',
            'Refund',
            'Transfer',
        ];

        foreach ($transactionTypes as $transaction)
        {
            TransactionType::create([
                'name' => $transaction
            ]);
        }
    }
}
