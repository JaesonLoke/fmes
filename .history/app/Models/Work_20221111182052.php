<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    public $table = 'workorders';

    protected $fillable = ['id','workorder_name','production_id','status','quantity','planner_id','completion','due_date'];

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    
    public function reports()
    {
        return $this->hasMany(Report::class,'ProductID','id');
    }
}
