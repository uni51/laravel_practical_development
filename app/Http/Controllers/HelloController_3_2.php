<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Pagination\MyPaginator;
use App\Person;

class HelloController extends Controller
{
    function __construct()
    {
    }

    /**
     * pagenateによるページネーション
     *
     */
//    public function index($id)
//    {
//        $msg = 'show page: ' . $id;
//
//        $result = DB::table('people')
//            ->paginate(3, ['*'], 'page', $id);
//
//        $data = [
//            'msg' => $msg,
//            'data' => $result,
//        ];
//        return view('hello.index', $data);
//    }


    /**
     * ナビゲーションリンクの表示
     *
     */
//    public function index(Request $request)
//    {
//        $id = $request->query('page');
//
//        $msg = 'show page: ' . $id;
//
//        $result = DB::table('people')
//            ->paginate(3, ['*'], 'page', $id);
//
//        // simplePaginateの利用
////        $result = DB::table('people')
////            ->simplePaginate(3);
//
//        $data = [
//            'msg' => $msg,
//            'data' => $result,
//        ];
//
//        return view('hello.index', $data);
//    }


    /**
     * 独自ページネーションの利用
     *
     */
    public function index(Request $request)
    {
        $id = $request->query('page');

        $msg = 'show page: ' . $id;

        $result = Person::paginate(3);

        $paginator = new MyPaginator($result);

        $data = [
            'msg' => $msg,
            'data' => $result,
            'paginator' => $paginator,
        ];

        return view('hello.index', $data);
    }
}
