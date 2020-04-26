<?php

namespace App\Imports;

use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithBatchInserts, WithChunkReading};

class InvoicesImport implements ToModel, WithChunkReading, ShouldQueue
{
    use Importable;

    public function model(array $row)
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        return \App\Invoice::firstOrCreate([
            'invoice' => (integer) $row[0],
            'billing_date' => $row[1],
            'client_code' => (integer) $row[2],
            'class' => $row[3],
            'sales_channel' => $row[4],
            'type' => $row[5],
            'doc' => $row[6],
            'sap_status' => $row[7],
            'value' => (float) $row[8],
            'tax' => (float) $row[9],
            'currency' => $row[10],
            'creator' => $row[11]
        ]);
    }

    public function chunkSize(): int
    {
        return 4000;
    }
}