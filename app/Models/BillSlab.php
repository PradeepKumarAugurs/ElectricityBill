<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillSlab extends Model
{
    use HasFactory;
    protected $fillable = ['city_id','start_range','end_range','per_unit_cost'];
}
