<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use Carbon\Carbon;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $current_date = Carbon::now()->format('Y-m-d H:i:m');
        City::insert([
            ["name" => "Bhopal",'created_at'=>$current_date,'updated_at'=>$current_date],
            ["name" => "Lucknow",'created_at'=>$current_date,'updated_at'=>$current_date],
            ["name" => "Kanpur",'created_at'=>$current_date,'updated_at'=>$current_date]
        ]);
    }
}
