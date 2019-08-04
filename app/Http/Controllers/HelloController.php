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
        $msg = 'show people record.';

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
        $id = $request->input('id');

        $person = Person::find($id);

        // イベントの発行を行なっている
        event(new PersonEvent($person));

        $data = [
            'input' => '',
            'msg' => 'id='. $id,
            'data' => [$person],
        ];

        return view('hello.index', $data);
    }
}
