<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\BillSlab;
class BillCalculator extends Controller
{
    public function index(Request $request){
        $data['cities'] = City::get();
        return view('welcome')->with($data);
    }
    public function calculateBill(Request $request){
        if(isset($request->unit) && isset($request->city_id)){
            $unit = $remainingUnit = (float)$request->unit;
            $city_id = $request->city_id;
            $calculateChnages = 0.00;
            $getSlab = BillSlab::where('city_id',$city_id)->orderBy('start_range','ASC')->get();
            if(count($getSlab)){
                foreach ($getSlab as $key => $row) {
                    $unitDiff = $row->end_range - $row->start_range;
                    if($remainingUnit==0){
                        break;
                    }
                    else if($remainingUnit-$unitDiff == 0){
                        $calculateChnages += $remainingUnit*$row->per_unit_cost;
                        $remainingUnit = 0;
                    }
                    else if($remainingUnit-$unitDiff > 0){
                        $calculateChnages += $unitDiff*$row->per_unit_cost;
                        $remainingUnit -= $unitDiff;
                    }
                    else if($remainingUnit-$unitDiff < 0){
                        $calculateChnages += $remainingUnit*$row->per_unit_cost;
                        $remainingUnit -= $remainingUnit;
                    }
                }

                if($remainingUnit!=0 && $remainingUnit> 0){
                    if(count($getSlab)){
                        $calculateChnages += $remainingUnit*$getSlab[count($getSlab)-1]->per_unit_cost;
                        $remainingUnit = 0;
                    }
                }
            }
            return $calculateChnages;
        }
    }
}
