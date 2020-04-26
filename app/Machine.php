<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $guarded = ['id'];

    public function client()
    {
        return $this->belongsTo(Customer::class, 'client_code', 'code');
    }
}
