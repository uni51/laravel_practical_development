<?php

namespace App\Http\Controllers;
use App\Facades\MyService;

class HelloController extends Controller
{
    function __construct()
    {
    }

    public function index(int $id = -1)
    {
        MyService::setId($id);

        $data = [
            'msg'=> MyService::say(),
            'data'=> MyService::alldata()
        ];

        return view('hello.index', $data);
    }

}
