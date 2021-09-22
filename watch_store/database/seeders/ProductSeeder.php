<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Product::create([
            'name'=>'Watch 01',
            'brand'=>'Rolex',
            'price'=>'35000',
            'image'=>'/uploads/images/popular1.png',
            'category'=>'Watch'
        ]);

        Product::create([
            'name'=>'Watch 02',
            'brand'=>'Richard Mille',
            'price'=>'80000',
            'image'=>'/uploads/images/popular2.png',
            'category'=>'Watch'
        ]);

        Product::create([
            'name'=>'Watch 03',
            'brand'=>'Hublot',
            'price'=>'20000',
            'image'=>'/uploads/images/popular3.png',
            'category'=>'Watch'
        ]);

        Product::create([
            'name'=>'Watch 04',
            'brand'=>'Patek Philippe',
            'price'=>'440000',
            'image'=>'/uploads/images/popular4.png',
            'category'=>'Watch'
        ]);

        Product::create([
            'name'=>'Watch 05',
            'brand'=>'Rolex',
            'price'=>'30000',
            'image'=>'/uploads/images/popular5.png',
            'category'=>'Watch'
        ]);

        Product::create([
            'name'=>'Watch 06',
            'brand'=>'Hublot',
            'price'=>'45000',
            'image'=>'/uploads/images/popular6.png',
            'category'=>'Watch'
        ]);
    }
}
