<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    public $table = 'workorders';

    protected $fillable = ['id','workorder_name','production_id','status','planner_id',','completion','due_date'];
}
