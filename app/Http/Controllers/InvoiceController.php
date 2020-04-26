<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;

class InvoiceController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:invoices-show|invoice-transfer|invoice-cancel', ['only' => ['index','store']]);
        $this->middleware('permission:invoice-transfer', ['only' => 'transfer']);
        $this->middleware('permission:invoice-cancel', ['only' => 'cancel']);
    }

    public function index(Request $request)
    {
        $data = Invoice::where('status', '!=', 'cancelled')
            ->whereRaw('(class = "FV" OR class = "F1" OR class = "F2")')
            ->orderBy('billing_date', 'DESC')->get();

        return view('invoices.index',compact('data'));
    }

    public function cancel($id)
    {
        Invoice::find($id)->update([
            'status' => 'cancelled',
            'sap_user' => \Illuminate\Support\Facades\Auth::user()->sap_user,
            'cancel_date' => \Carbon\Carbon::now()->toDateString()
            ]);

        return redirect()->route('invoices.index')
            ->with('success','Factura Cancelada');
    }

    public function transfer($id)
    {
        Invoice::find($id)->update([
            'status' => 'transfered',
            'sap_user' => \Illuminate\Support\Facades\Auth::user()->sap_user,
            'transfer_date' => \Carbon\Carbon::now()->toDateString()
            ]);

        return redirect()->route('invoices.index')
            ->with('success','Factura Transferida Exitosamente!');
    }
}