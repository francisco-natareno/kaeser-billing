<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceTableSeeder extends Seeder
{
    public function run()
    {
        ini_set('memory_limit', '-1');
        $sql = file_get_contents(database_path() . '/seeds/invoices.sql');
        DB::statement($sql);
    }
}
