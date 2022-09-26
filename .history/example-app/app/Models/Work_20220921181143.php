<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    public $table = 'name_exact_of_the_table';

    protected $fillable = ['id','workorder_name','production_id','status','planner_id','completion'];
}
