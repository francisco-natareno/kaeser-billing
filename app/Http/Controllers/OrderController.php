<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Excel;
use App\Imports\OrdersImport;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    private $excel;

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    public function import()
    {
        try{
            (new OrdersImport)->import('VA05_2019.xlsx');
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

    public function index()
    {
        //Show all orders from the database and return to view
        $orders = Order::whereBetween('order_date', ['2019-12-01', '2019-12-31'])
             ->orderBy('sales_order', 'DESC')->get();
        return view('orders.index',['orders'=>$orders]);
    }
}
