<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class S3Controller extends Controller
{
    public function index()
    {
        $disk = Storage::disk('s3');
        $txt = $disk->get('s3_sample.txt');

        return view('s3.index',
            compact('txt')
        );
    }
}
