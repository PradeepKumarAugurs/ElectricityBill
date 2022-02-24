<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BillSlab;
use Carbon\Carbon;
class BillSlabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $current_date = Carbon::now()->format('Y-m-d H:i:m');
        BillSlab::insert([
            // city  1
            ["city_id" => 1,'start_range'=>0,'end_range'=>100,'per_unit_cost'=>2,'created_at'=>$current_date,'updated_at'=>$current_date],
            ["city_id" => 1,'start_range'=>100,'end_range'=>200,'per_unit_cost'=>4,'created_at'=>$current_date,'updated_at'=>$current_date],
            ["city_id" => 1,'start_range'=>200,'end_range'=>5000,'per_unit_cost'=>5,'created_at'=>$current_date,'updated_at'=>$current_date],
            //  city  2
            ["city_id" => 2,'start_range'=>0,'end_range'=>100,'per_unit_cost'=>2,'created_at'=>$current_date,'updated_at'=>$current_date],
            ["city_id" => 2,'start_range'=>100,'end_range'=>200,'per_unit_cost'=>4,'created_at'=>$current_date,'updated_at'=>$current_date],
            ["city_id" => 2,'start_range'=>200,'end_range'=>5000,'per_unit_cost'=>5,'created_at'=>$current_date,'updated_at'=>$current_date],
            // city  3
            ["city_id" => 3,'start_range'=>0,'end_range'=>100,'per_unit_cost'=>2,'created_at'=>$current_date,'updated_at'=>$current_date],
            ["city_id" => 3,'start_range'=>100,'end_range'=>200,'per_unit_cost'=>4,'created_at'=>$current_date,'updated_at'=>$current_date],
            ["city_id" => 3,'start_range'=>200,'end_range'=>5000,'per_unit_cost'=>5,'created_at'=>$current_date,'updated_at'=>$current_date],
        ]);
    }
}
