<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\{Importable, ToModel};

class OrdersImport implements ToModel
{
    use Importable;

    public function model(array $row)
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        return \App\Order::firstOrCreate([
            'sales_order' => (integer) $row[0],
            'order_date' => $row[1],
            'client_code' => (integer) $row[2],
            'payment' => $row[3],
            'quotation' => $row[4],
            'customer_ref' => $row[5],
            'order_position' => (integer) $row[6],
            'quantity' => (integer) $row[7],
            'measure' => $row[8],
            'part_number' => $row[9],
            'order_value' => (float) $row[10],
            'currency' => $row[11],
            'creator' => $row[12],
            'status' => $row[13],
            'rejection' => $row[14]
        ]);
    }
}