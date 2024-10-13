<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request): string
    {
        $picture = $request->file('picture');
        $filename = $picture->getClientOriginalName();
        $picture->storePubliclyAs("pictures", $filename, "public");
        return "OK: " . $filename;
    }
}
