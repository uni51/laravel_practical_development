<?php

namespace App\Http\Controllers;

use App\Person;
use App\Events\PersonEvent;

use Illuminate\Http\Request;


class HelloController extends Controller
{
    function __construct()
    {
    }

    public function index()
    {
        $data = [
            'msg' => 'This is React application.',
        ];

        return view('hello.index', $data);
    }

    public function json($id = -1)
    {
        if ($id == -1)
        {
            return Person::get()->toJson();
        }
        else
        {
            return Person::find($id)->toJson();
        }
    }
}
