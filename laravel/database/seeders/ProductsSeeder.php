<?php

namespace Database\Seeders;

use App\Models\ProductModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sp_arr = [
            [
                "name" => "Asus TUF Gaming 75", "price" => 18490000
            ],
            [
                "name" => "Acer Gaming Aspire", "price" => 16990000
            ],
            [
                "name" => "MSI Gaming GF63 15", "price" => 16990000
            ],
            [
                "name" => "Lenovo Ideapad 55H", "price" => 15990000
            ],
            [
                "name" => "Acer Gaming Nit i7", "price" => 21990000
            ],
            [
                "name" => "Asus Gaming R5 755", "price" => 19290000
            ],
            [
                "name" => "Asus Air 13 M3", "price" => 38490000
            ],
            [
                "name" => "Asus fq5229TU i3", "price" => 10790000
            ],
            [
                "name" => "Acer Aspire 51M", "price" => 11490000
            ],
            [
                "name" => "MSI Gaming Thin 1H", "price" => 16990000
            ],
            [
                "name" => "MSI GF63 12UCX i5", "price" => 17290000
            ],
            [
                "name" => "MSI Sword HX B14G", "price" => 37990000
            ],
            [
                "name" => "MSI HX B14VFKG i7", "price" => 36590000
            ],
            [
                "name" => "Lenovo LOQ i5 12X", "price" => 21490000
            ],
            [
                "name" => "Lenovo Gaming  i5", "price" => 20790000
            ],
        ];
        for ($i = 0; $i < count($sp_arr); $i++) ProductModel::create($sp_arr[$i]);
    }
}
