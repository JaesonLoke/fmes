<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    public $table = 'workorders';

    protected $fillable = ['id','workorder_name','production_id','status','quantity','planner_id','completion','due_date'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
    public function notifications()
    {
        return $this->hasMany(Report::class,'WorkID','id');
    }

    
}
