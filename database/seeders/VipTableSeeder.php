<?php

namespace Database\Seeders;

use App\Models\Vip;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vips')->delete();

        $vips = [
            [
                'name' => 'VIP1',
                'slug' => 'vip1',
                'amount' => 100,
                'orders_per_day' => 45,
                'sets' => 3,
                'min_prod_amount' => 120,
                'max_prod_amount' => 170,
                'percentage_profit' => 0.5,
                'image' => '652d1e14e4b023900c3f5f07_vip1.png',
                'description' => json_encode([
                    'Suitable for most data capture scenarios involving light to medium usage',
                    'Profit of 0.5% per task -45 tasks per set',
                    'Up to 135 Submit ratings per day',
                    'No access to other Premium features'
                ])
            ],
            [
                'name' => 'VIP2',
                'slug' => 'vip2',
                'amount' => 500,
                'orders_per_day' => 50,
                'sets' => 3,
                'min_prod_amount' => 200,
                'max_prod_amount' => 280,
                'percentage_profit' => 1,
                'image' => '652d1e0fe4b023900c3f5f06_vip2.png',
                'description' => json_encode([
                    'Deposit in accordance with our renewal event',
                    'Profit of 1% per task-50 Submit products per set',
                    'Better Profit and Commission',
                    'Up to 150 tasks per day can be submitted by Vip 2 users'
                ])
            ],
            [
                'name' => 'VIP3',
                'slug' => 'vip3',
                'amount' => 1000,
                'orders_per_day' => 55,
                'sets' => 3,
                'min_prod_amount' => 290,
                'max_prod_amount' => 340,
                'percentage_profit' => 1.5,
                'image' => '652d1e07e4b023900c3f5f05_vip3.png',
                'description' => json_encode([
                    'Deposit in accordance with our renewal event',
                    'Profit of 1.5% per task-55 Submit products per set',
                    'Better Profit and Commission',
                    'Up to 165 tasks per day can be submitted by Vip 3 users'
                ])
            ],
            [
                'name' => 'VIP4',
                'slug' => 'vip4',
                'amount' => 2000,
                'orders_per_day' => 60,
                'sets' => 3,
                'min_prod_amount' => 350,
                'max_prod_amount' => 500,
                'percentage_profit' => 2,
                'image' => '652d1dfae4b023900c3f5f04_vip4.png',
                'description' => json_encode([
                    'Deposit in accordance with our renewal event',
                    'Profit of 2% per task-60 Submit products per set',
                    'Better Profit and Commission',
                    'Up to 300 tasks per day can be submitted by Vip 2 users'
                ])
            ],
        ];

        Vip::insert($vips);
    }
}
