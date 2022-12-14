<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    public $table = 'reports';

    protected $fillable = ['id','ProductOrWork','ProductID','WorkID','detail','category'];

    public $timestamps = false;
}
