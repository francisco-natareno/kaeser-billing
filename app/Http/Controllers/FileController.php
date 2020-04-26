<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:files-show|file-upload|file-destroy', ['only' => ['index','store','destroy']]);
        $this->middleware('permission:file-upload', ['only' => ['store']]);
        $this->middleware('permission:file-destroy', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        return view('upload');
        //$files = File::all();
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'Por favor seleccione un archivo',
            'mimes' => 'El archivo seleccionado no es válido',
            'max' => 'El archivo seleccionado es demasiado grande',
        ];

        $validator = Validator::make($request->all(),
            ['filename' => 'required|mimes:xls,xlsx|max:16384'],$messages);
        
        // if validation fails
        if($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        // if validation success
        if($file = $request->file('filename')) {
            $fullName = $file->getClientOriginalName();
            $filename = pathinfo($fullName, PATHINFO_FILENAME).'.'.$file->getClientOriginalExtension();
            //$target_path = public_path('/uploads/');
            $target_path = storage_path('app/uploads/');

            if($file->move($target_path, $filename)) {
                $file = File::updateOrCreate(['filename' => $fullName])->touch();
                return back()->with("success", "Archivo cargado exitosamente!");
            }
        }
    }
}