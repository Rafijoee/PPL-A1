<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class FileDownloadController extends Controller
{
    public function downloadFile($filename)
    {
        $path = public_path('pdf/' . $filename);

        if (!File::exists($path)) {
            return abort(404, 'File not found.');
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        return Response::make($file, 200, [
            'Content-Type' => $type,
            'Content-Disposition' => 'attachment; filename="' . $filename . '"'
        ]);
    }
}
