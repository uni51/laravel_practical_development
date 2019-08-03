<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class HelloController extends Controller
{
    function __construct()
    {
    }

    public function index()
    {
        $msg = 'show people record.';

        // インデックスの更新を行う
//        Person::get(['*'])->searchable();

        $result = Person::get();

        $data = [
            'input' => '',
            'msg' => $msg,
            'data' => $result,
        ];

        return view('hello.index', $data);
    }


    public function send(Request $request)
    {
        $input = $request->input('find');

        $msg = 'search: ' . $input;

        $result = Person::search($input)->get();


        $data = [
            'input' => $input,
            'msg' => $msg,
            'data' => $result,
        ];

        return view('hello.index', $data);
    }
}
