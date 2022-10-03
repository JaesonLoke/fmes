<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    public $table = 'inventorys';

    protected $fillable = ['id','inventory_name','quantity','image',''];

    public $timestamps = false;
}
