<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Machine;

class MachineController extends Controller
{
    public function index(Request $request)
    {
        $data = Machine::where('category', '=', 'COMPRESOR')->get();

        return view('machines.index',compact('data'));
    }
}