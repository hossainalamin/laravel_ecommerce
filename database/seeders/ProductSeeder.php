<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ["name"        => "nokia mobile",
            "price"       => "12000",
            "category"    => "mobile",
            "description" => "A smartphone with various features and nice looking",
            "gellary"     => "../../image/mobile.jpg"],
            ["name"        => "xiaomi mobile",
            "price"       => "11000",
            "category"    => "mobile",
            "description" => "A smartphone with various features and nice looking",
            "gellary"     => "../../image/mobile.jpg"],
            ["name"        => "Samsung mobile",
            "price"       => "15000",
            "category"    => "mobile",
            "description" => "A smartphone with various features and nice looking",
            "gellary"     => "../../image/mobile.jpg"]
        ]);
        
    }
}
