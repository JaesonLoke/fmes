<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;

    public $table = 'productions';

    protected $fillable = ['id','production_name','status','planner_id','completion''];
}
