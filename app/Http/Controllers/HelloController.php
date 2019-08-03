<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class HelloController extends Controller
{
    function __construct()
    {
    }

    /**
     * カスタムコレクションの利用
     *
     */
    public function index(Request $request)
    {
        $msg = 'show people record.';

        $records = Person::get();

        $fields = Person::get()->fields();

        $data = [
            'msg' => implode(', ', $fields),
            'data' => $records,
        ];

        return view('hello.index', $data);
    }


    public function save($id, $name)
    {
        $record = Person::find($id);

        // ミューテータによって、名前が大文字に変換される
        $record->name = $name;

        $record->save();

        return redirect()->route('hello');
    }


    public function other()
    {
        $person = new Person();

        $person->all_data = ['aaa','bbb@ccc', 34]; // ダミーデータ

        $person->save();

        return redirect()->route('hello');
    }


    /**
     * JSON形式でのレコード取得（toJson）
     *
     */
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
