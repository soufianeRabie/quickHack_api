<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class table1 extends Model
{

    protected $fillable = ['att1' ,'name', 'att2' , 'att3' , 'att4'];
    use HasFactory;
}
