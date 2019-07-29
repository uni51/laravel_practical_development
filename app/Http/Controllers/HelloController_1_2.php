<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class HelloController extends Controller
{
    function __construct()
    {
        config([ 'sample.message' => '新しいメッセージ！']);
    }

    public function index()
    {
        $sample_msg = env('SAMPLE_MESSAGE');
        $sample_data = env('SAMPLE_DATA');

        $data = [
            'msg'  => $sample_msg,
            'data' => explode(',', $sample_data)
        ];

        return view('hello.index', $data);
    }

    public function other(Request $request)
    {
        return redirect()->route('sample');
    }
}
