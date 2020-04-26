<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithBatchInserts, WithChunkReading};

class PartsImport implements ToModel, WithBatchInserts, WithChunkReading
{
    use Importable;

    public function model(array $row)
    {
        return new \App\Part([
            'part_number' => $row[0],
            'description' => $row[1],
            'gross_price' => (float) $row[2],
            'net_price' => (float) $row[3]
        ]);
    }

    public function batchSize(): int
    {
        return 10000;
    }

    public function chunkSize(): int
    {
        return 10000;
    }
}