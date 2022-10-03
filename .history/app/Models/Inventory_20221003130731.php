<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    public $table = 'reports';

    protected $fillable = ['id','ProductOrWork','ProductOrWorkID','detail'];

    public $timestamps = false;
}
