<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salesperson extends Model
{
    protected $table = 'sales_representatives';
    protected $guarded = ['id'];
}