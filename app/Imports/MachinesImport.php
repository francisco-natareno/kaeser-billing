<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithBatchInserts, WithChunkReading};

class MachinesImport implements ToModel, WithBatchInserts, WithChunkReading
{
    use Importable;

    public function model(array $row)
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        return new \App\Machine([
            'material' => $row[0],
            'serial' => $row[1],
            'emr' => (integer) $row[2],
            'description' => $row[3],
            'year' => (integer) $row[4],
            'category' => $row[5],
            'denomination' => $row[6],
            'model' => $row[7],
            'client_code' => (integer) $row[8],
            'sales_org' => (integer) $row[9],
            'wty_client' => $row[10],
            'start_up' => $row[11],
            'identification' => $row[12]
        ]);
    }

    public function batchSize(): int
    {
        return 4000;
    }

    public function chunkSize(): int
    {
        return 4000;
    }
}