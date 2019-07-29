<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{
    private $fname;

    public function __construct()
    {
        $this->fname = 'hello.txt';
    }

    public function index()
    {
        $dir = '/';
        $all = Storage::disk('logs')->allfiles($dir);

        $data = [
            'msg'=> 'DIR: ' . $dir,
            'data'=> $all
        ];
        return view('hello.index', $data);
    }

    public function other(Request $request)
    {
        Storage::disk('local')->putFile('files', $request->file('file'));

        return redirect()->route('hello');
    }

}
