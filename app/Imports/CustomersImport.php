<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithBatchInserts, WithChunkReading};

class CustomersImport implements ToModel, WithBatchInserts, WithChunkReading
{
    use Importable;

    public function model(array $row)
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        return new \App\Customer([
            'code' => (integer) $row[0],
            'name' => $row[1],
            'street_1' => $row[2],
            'street_2' => $row[3],
            'postal_code' => $row[4],
            'localization' => $row[5],
            'tax_id' => $row[6],
            'salesperson' => (integer) $row[7],
            'coordinator' => $row[8]
        ]);
    }

    public function batchSize(): int
    {
        return 3000;
    }

    public function chunkSize(): int
    {
        return 3000;
    }
}