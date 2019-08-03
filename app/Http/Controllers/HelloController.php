<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Jobs\MyJob;

class HelloController extends Controller
{
    function __construct()
    {
    }

    public function index(Person $person=null)
    {
        if($person != null) {
            MyJob::dispatch($person);
        }

        $msg = 'index action : show people record aaaa.';

        $result = Person::orderBy('id','asc')->get();

        $data = [
            'input' => '',
            'msg' => $msg,
            'data' => $result,
        ];

        return view('hello.index', $data);
    }


    public function send(int $id)
    {

        $msg = 'send action : show people record.';

        $result = Person::find($id);

        $data = [
            'input' => $id,
            'msg' => $msg,
            'data' => $result,
        ];

        return view('hello.index', $data);
    }
}
