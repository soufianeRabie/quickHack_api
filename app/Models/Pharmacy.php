<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{

    protected $fillable = ['name' ,'address', 'operationhours' , 'garde'];
    use HasFactory;
}
