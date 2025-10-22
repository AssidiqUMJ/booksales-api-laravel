<?php
//Seeder transaction
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::create([
            'order_number' => 'PO-0021',
            'customer_id' => 2,
            'book_id' => 1,
            'total_amount' => 260000
        ]);

        Transaction::create([
            'order_number' => 'PO-0022',
            'customer_id' => 3,
            'book_id' => 2,
            'total_amount' => 150000
        ]);

        Transaction::create([
            'order_number' => 'PO-0023',
            'customer_id' => 1,
            'book_id' => 3,
            'total_amount' => 200000
        ]);
    }
}
