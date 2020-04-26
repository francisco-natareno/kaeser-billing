<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'sales_orders';
    protected $guarded = ['id'];

    public function client()
    {
        return $this->belongsTo(Customer::class, 'client_code', 'code');
    }

    public function part()
    {
        return $this->belongsTo(Part::class, 'part_number', 'part_number');
    }
}
