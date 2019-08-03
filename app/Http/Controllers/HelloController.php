<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    function __construct()
    {
    }

    /**
     * whereメソッドによる条件検索
     *
     */
//    public function index($id = -1)
//    {
//        if ($id >= 0)
//        {
//            $msg = 'get ID <= ' . $id;
//
//            $result = DB::table('people')
//                ->where('id','<=', $id)->get();
//        }
//        else
//        {
//            $msg = 'get people records.';
//            $result = DB::table('people')->get();
//        }
//
//        $data = [
//            'msg' => $msg,
//            'data' => $result,
//        ];
//
//        return view('hello.index', $data);
//    }


    /**
     * あいまい検索
     *
     */
//    public function index($id = -1)
//    {
//        if ($id >= 0)
//        {
//            $msg = 'get name like "' . $id . '".';
//            $result = DB::table('people')
//                ->where('name','like', '%' . $id . '%')->get();
//        }
//        else
//        {
//            $msg = 'get people records.';
//            $result = DB::table('people')->get();
//        }
//
//        $data = [
//            'msg' => $msg,
//            'data' => $result,
//        ];
//
//        return view('hello.index', $data);
//    }


    /**
     * 最初・最後のレコード取得
     *
     */
//    public function index()
//    {
//        $msg = 'get people records.';
//
//        $first = DB::table('people')->first();
//
//        $last = DB::table('people')->orderBy('id','desc')->first();
//
//        $result = [$first, $last];
//
//        $data = [
//            'msg' => $msg,
//            'data' => $result,
//        ];
//
//        return view('hello.index', $data);
//    }


    /**
     * 指定IDのレコード取得（find）
     *
     */
//    public function index($id = -1)
//    {
//        if ($id >= 0)
//        {
//            $msg = 'get name like "' . $id . '".';
//            // view側のforeachに対応させるため、配列形式にしている
//            $result = [DB::table('people')->find($id)];
//        }
//        else
//        {
//            $msg = 'get people records.';
//            $result = DB::table('people')->get();
//        }
//        $data = [
//            'msg' => $msg,
//            'data' => $result,
//        ];
//        return view('hello.index', $data);
//    }

    /**
     * 特定のフィールドだけ取得（pluck）
     *
     */
//    public function index()
//    {
//        // 特定のフィールドだけ取得（pluck）
//        $name = DB::table('people')->pluck('name');
//        $value = $name->all();
//        $msg = implode(', ', $value);
//        $result = DB::table('people')->get();
//
//        $data = [
//            'msg' => $msg,
//            'data' => $result,
//        ];
//
//        return view('hello.index', $data);
//    }


    /**
     * chunkByIdによる分割処理
     *
     */
//    public function index()
//    {
//        $data = ['msg' => '', 'data' => []];
//
//        $msg = 'get: ';
//
//        $result = [];
//
//        // レコードIDが奇数のものだけをまとめる
//        DB::table('people')
//            ->chunkById(2, function($items) use (&$msg, &$result)
//            {
//                foreach($items as $item)
//                {
//                    $msg .= $item->id . ' ';
//                    $result += array_merge($result, [$item]);
//                    break;
//                }
//                return true;
//            });
//
//        $data = [
//            'msg' => $msg,
//            'data' => $result,
//        ];
//
//        return view('hello.index', $data);
//    }


    /**
     * orderByとchunkを使う
     *
     */
//    public function index()
//    {
//        $data = ['msg' => '', 'data' => []];
//        $msg = 'get: ';
//        $result = [];
//
//        // レコードをnameで並び替え、冒頭から奇数個目のものだけをピックアップする
//        DB::table('people')->orderBy('name', 'asc')
//            ->chunk(2, function($items) use (&$msg, &$result)
//            {
//                foreach($items as $item)
//                {
//                    $msg .= $item->id . ':' . $item->name . ' ';
//                    $result += array_merge($result, [$item]);
//                    break;
//                }
//                return true;
//            });
//
//        $data = [
//            'msg' => $msg,
//            'data' => $result,
//        ];
//
//        return view('hello.index', $data);
//    }


    /**
     * 一定の部分だけを抜き出して処理する
     *
     */
//    public function index($id)
//    {
//        $data = ['msg' => '', 'data' => []];
//        $msg = 'get: ';
//        $result = [];
//        $count = 0;
//
//        DB::table('people')
//            ->chunkById(3, function($items) use (&$msg, &$result, &$id, &$count)
//            {
//                if ($count == $id)
//                {
//                    foreach($items as $item)
//                    {
//                        $msg .= $item->id . ':' . $item->name . ' ';
//                        $result += array_merge($result, [$item]);
//                    }
//                    return false;
//                }
//                $count++;
//                return true;
//            });
//
//        $data = [
//            'msg' => $msg,
//            'data' => $result,
//        ];
//
//        return view('hello.index', $data);
//    }


    /**
     * whereBetweenを使った、2つの値の範囲内を検索
     *
     */
//    public function index($id)
//    {
//        $ids = explode(',', $id);
//
//        $msg = 'get people.';
//
//        $result = DB::table('people')
//            ->whereBetween('id', $ids)
//            ->get();
//
//        $data = [
//            'msg' => $msg,
//            'data' => $result,
//        ];
//
//        return view('hello.index', $data);
//    }


    /**
     * 配列で検索値を指定
     *
     */
    public function index($id)
    {
        $ids = explode(',', $id);
        $msg = 'get people.';

        $result = DB::table('people')
            ->whereIn('id' ,$ids)
            ->get();

        $data = [
            'msg' => $msg,
            'data' => $result,
        ];

        return view('hello.index', $data);
    }

}
