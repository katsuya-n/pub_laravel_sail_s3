<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class S3TxtController extends Controller
{
    public function index()
    {
        $disk = Storage::disk('s3');
        $data = $disk->get('s3_sample.txt');

        if ($data === null) {
            throw new \Exception('error');
        }

        return view('s3.index',
            compact('data')
        );
    }
}
