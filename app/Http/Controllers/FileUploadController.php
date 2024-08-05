<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function save(Request $request): string
    {
        $path = $request->file('avatar')->store('avatars');
 
        return $path;
    }

    public function upload(Request $request): string
    {
        $request->validate([
            'file' => 'required|mimes:jpg,png,pdf|max:2048',
        ]);

        $file = $request->file('file');
        $path = Storage::disk('public_uploads')->put('', $file);

        // Additional logic (e.g., storing file information in the database)

        return 'uploads/' . $path;
    }
}
