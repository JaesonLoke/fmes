<?php

namespace App\Models;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['id','product_name','status','operator_id','planner_id','quantity','workorder_id','completion'];

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    
    public function reports()
    {
        return $this->hasMany(Report::class),'';
    }
    

}