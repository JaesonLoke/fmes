<?php

namespace App\Models;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['id','product_name','status','operator_id','planner_id','quantity','workorder_id','completion'];

    public function works()
    {
        return $this->hasMany(Work::class,'pro_id','id');
    }

    public function notis()
    {
        return $this->hasMany(Work::class,'pro_id','id');
    }
    

}