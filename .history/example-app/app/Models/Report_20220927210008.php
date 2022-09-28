<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public $table = 'reports';

    protected $fillable = ['id','workorder_name','product_id','status','planner_id','completion','due_date'];
}
