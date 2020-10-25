<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    public function index()
    {
        $url = config('filesystems.disks.s3.url').'/';
        $images = [];
        $files = Storage::disk('s3')->files('images');
        foreach ($files as $file) {
            $images[] = [
                'name' => $file,
                'src' => $url . $file
            ];
        }
        return view('welcome', compact('images'));
    }

    public function storeimage(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $filePath = 'images/' . $name; /* images/ is a directory in aws storage bucket. */
            Storage::disk('s3')->put($filePath, file_get_contents($file));
        }

        return back()->withSuccess('Image uploaded successfully');
    }

    public function deleteimage($image)
    {
        Storage::disk('s3')->delete($image);

        return back()->withSuccess('Image was deleted successfully');
    }
}
