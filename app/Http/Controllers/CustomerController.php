<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Excel;
use App\Imports\CustomersImport;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $excel;

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    public function import()
    {
        try{
            (new CustomersImport)->import('clientes.xlsx');
            return redirect('/')->with('success', 'File imported successfully!');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e){
            $failures = $e->failures();
            foreach ($failures as $failure) {
                $failure->row(); // row that went wrong
                $failure->attribute(); // either heading key (if using heading row concern) or column index
                $failure->errors(); // Actual error messages from Laravel validator
                $failure->values(); // The values of the row that has failed.
            }
        }
    }
}
