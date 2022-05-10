<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{

    public function index()
    {
        $file = session()->get('file_name');
        return view("pdf.index", compact('file'));
    }

    public function create()
    {
        return view('pdf.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf',
        ]);

        // name by date
        $fileName = date('YmdHis') . '_' . $request->file->getClientOriginalName();
        Storage::disk('local')->putFileAs('public/files', $request->file, $fileName);

        $file = new File();
        $file->name = "storage/files/" . $fileName;
        $file->save();

        $file_name = $file->name;

        session()->put('file_name', $file_name);

        return redirect()->route('pdf.index', compact('file_name'));

    }
}
