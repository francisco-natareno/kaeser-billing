<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\{Importable, ToModel};

class ContractsImport implements ToModel
{
    use Importable;

    public function model(array $row)
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        return \App\Contract::firstOrCreate([
            'contract' => (integer) $row[0],
            'sap_date' => $row[1],
            'header' => $row[2],
            'internal_ref' => $row[3],
            'salesperson' => $row[4],
            'sales_channel' => (integer) $row[5],
            'invoice_description' => $row[6],
            'client_code' => (integer) $row[7],
            'start_date' => $row[8],
            'end_date' => $row[9],
            'value' => (float) $row[10],
            'currency' => $row[11],
            'creator' => $row[12],
            'payment' => $row[13]
        ]);
    }
}