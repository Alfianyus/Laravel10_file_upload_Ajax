<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class UploadFileController extends Controller
{
    public function index()
    {
        return view('fileupload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);

        $title = time() . '.' . request()->file->getClientOriginalExtension();

        $request->file->move(public_path('upload'), $title);

        $storeFile = new File;
        $storeFile->title = $title;
        $storeFile->save();

        return redirect()->json(['success' => 'file upload successfully']);
    }
}
