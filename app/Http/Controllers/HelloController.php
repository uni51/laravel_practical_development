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
     * テーブルpeopleのレコードを表示する
     *
     */
//    public function index(Request $request)
//    {
//        $msg = 'show people record';
//
//        // モデルクラスのgetを呼び出している
//        $result = Person::get();
//
//        $data = [
//            'msg' => $msg,
//            'data' => $result,
//        ];
//
//        return view('hello.index', $data);
//    }


    /**
     * コレクションの機能：reject
     * 未成年データを排除するサンプル
     *
     */
//    public function index(Request $request)
//    {
//        $msg = 'show people record.';
//
//        $result = Person::get()->reject(function($person)
//        {
//            return $person->age < 20;
//        });
//
//        $data = [
//            'msg' => $msg,
//            'data' => $result,
//        ];
//
//        return view('hello.index', $data);
//    }

    /**
     * コレクションの機能：filter
     * 未成年以外のデータを抽出するサンプル（未成年データを排除するサンプル）
     *
     */
//    public function index(Request $request)
//    {
//        $msg = 'show people record.';
//
//        $result = Person::get()->filter(function($person)
//        {
//            return $person->age >= 20;
//        });
//
//        $data = [
//            'msg' => $msg,
//            'data' => $result,
//        ];
//
//        return view('hello.index', $data);
//    }


    /**
     * コレクションの機能：diffによる差分取得
     *
     */
//    public function index(Request $request)
//    {
//        $msg = 'show people record.';
//
//        $result = Person::get()->filter(function($person)
//        {
//            return $person->age < 50;
//        });
////        echo '<pre>';
////        var_dump($result);
////        echo '</pre>';
//
//        $result2 = Person::get()->filter(function($person)
//        {
//            return $person->age > 20;
//        });
////        echo '<pre>';
////        var_dump($result2);
////        echo '</pre>';
//
//        // $resultに含まれているものから、$result2に含まれているものを除外したものを抽出する
//        $result3 = $result->diff($result2);
//
//        $data = [
//            'msg' => $msg,
//            'data' => $result3,
//        ];
//        return view('hello.index', $data);
//    }


    /**
     * コレクションの機能：modelkeysとonlyおよびexcept
     *
     */
//    public function index(Request $request)
//    {
//        $msg = 'show people record.';
//
//        // modelKeysを利用して、テーブルの全てのキーだけをまとめ、取り出す
//        $keys = Person::get()->modelKeys();
//
////        echo '<pre>';
////        var_dump($keys);
////        echo '</pre>';
//
//        $even = array_filter($keys, function($key)
//        {
//            return $key % 2 == 0;
//        });
//
//        // 配列にまとめたID（IDが偶数）のモデルを取得
//        $result = Person::get()->only($even);
//
//        // 配列にまとめたID（IDが偶数）以外のモデルを取得
////        $result = Person::get()->except($even);
//
//        $data = [
//            'msg' => $msg,
//            'data' => $result,
//        ];
//
//        return view('hello.index', $data);
//    }


    /**
     * コレクションの機能：mergeとunique
     *
     */
//    public function index(Request $request)
//    {
//        $msg = 'show people record.';
//
//        $even = Person::get()->filter(function($item)
//        {
//            // IDが偶数のもの
//            return $item->id % 2 == 0;
//        });
//
//        $even2 = Person::get()->filter(function($item)
//        {
//            // age（年齢）が偶数のもの
//            return $item->age % 2 == 0;
//        });
//
//        $result = $even->merge($even2);
//
//        $data = [
//            'msg' => $msg,
//            'data' => $result,
//        ];
//
//        return view('hello.index', $data);
//    }

    /**
     * mapによるコレクション作成
     *
     */
    public function index(Request $request)
    {
        $msg = 'show people record.';

        $even = Person::get()->filter(function($item)
        {
            return $item->id % 2 == 0;
        });

        // mapによるコレクション作成
        $map = $even->map(function($item, $key)
        {
            return $item->id . '_' . $item->name;
        });

        $data = [
            'msg' => $map,
            'data' => $even,
        ];

        return view('hello.index', $data);
    }

}
