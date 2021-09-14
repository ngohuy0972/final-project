<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stock;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Stock::create([
            'product_id'=>'1',
            'color'=>'Gold',
            'quantity'=>'5'
        ]);

        Stock::create([
            'product_id'=>'1',
            'color'=>'Rose',
            'quantity'=>'3'
        ]);

        Stock::create([
            'product_id'=>'1',
            'color'=>'Grey',
            'quantity'=>'8'
        ]);

        Stock::create([
            'product_id'=>'2',
            'color'=>'Gold',
            'quantity'=>'5'
        ]);

        Stock::create([
            'product_id'=>'2',
            'color'=>'Rose',
            'quantity'=>'3'
        ]);

        Stock::create([
            'product_id'=>'2',
            'color'=>'Grey',
            'quantity'=>'8'
        ]);

        Stock::create([
            'product_id'=>'3',
            'color'=>'Gold',
            'quantity'=>'5'
        ]);

        Stock::create([
            'product_id'=>'3',
            'color'=>'Rose',
            'quantity'=>'3'
        ]);

        Stock::create([
            'product_id'=>'3',
            'color'=>'Grey',
            'quantity'=>'8'
        ]);

        Stock::create([
            'product_id'=>'4',
            'color'=>'Gold',
            'quantity'=>'5'
        ]);

        Stock::create([
            'product_id'=>'4',
            'color'=>'Rose',
            'quantity'=>'3'
        ]);

        Stock::create([
            'product_id'=>'4',
            'color'=>'Green',
            'quantity'=>'8'
        ]);

        Stock::create([
            'product_id'=>'5',
            'color'=>'Gold',
            'quantity'=>'5'
        ]);

        Stock::create([
            'product_id'=>'5',
            'color'=>'Rose',
            'quantity'=>'3'
        ]);

        Stock::create([
            'product_id'=>'5',
            'color'=>'Gray',
            'quantity'=>'8'
        ]);

        Stock::create([
            'product_id'=>'6',
            'color'=>'Gold',
            'quantity'=>'5'
        ]);

        Stock::create([
            'product_id'=>'6',
            'color'=>'Rose',
            'quantity'=>'3'
        ]);

        Stock::create([
            'product_id'=>'6',
            'color'=>'Red Product',
            'quantity'=>'8'
        ]);
    }
}
