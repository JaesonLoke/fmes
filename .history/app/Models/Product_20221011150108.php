<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['id','product_name','status','operator_id','quantity','workorder_id','completion'];

    public function inventorys()
    {
        return $this->belongsToMany(Inventory::class)->withPivot(['quantity']);
    }   

}