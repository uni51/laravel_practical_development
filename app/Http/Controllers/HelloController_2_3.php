<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    function __construct()
    {
    }

    public function index(Request $request)
    {

        $data = [
            'msg'=> $request->hello,
            'data'=> $request->alldata,
        ];

        return view('hello.index', $data);
    }

}
