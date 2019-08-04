<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
//        $response = $this->get('/');
//        $response->assertStatus(200);

        // ステータスのチェック
        $this->get('/')->assertStatus(200);

        // ステータスOKのチェック
        $this->get('/hello')->assertOk();

        // POSTのチェック
//        $this->post('/hello')->assertOk();

        // パラメータを指定する
        $this->get('/hello/1')->assertOk();

        // 存在しないページのチェック
        $this->get('/hoge')->assertStatus(404);

        // コンテンツに含まれるテキスト
        $this->get('/hello')->assertSeeText('Index');

        // レスポンスに含まれるテキスト
        $this->get('/hello')->assertSee('<h1>');

        // 用意したテキストが順に登場する
        $this->get('/hello')->assertSeeInOrder(['<html','<head','<body','<h1>']);

        $seeText1 = '杉山 七夏_MYJOB_';
        $seeJsEnText1 = json_encode($seeText1);
        // Ajaxへのアクセス（コンテンツに含まれるテキスト）
        $this->get('/hello/json/1')->assertSeeText($seeJsEnText1);

        // Ajaxの内容チェック
        $seeText2 = '原田 康弘_MYJOB_';
        $this->get('/hello/json/2')->assertExactJson(
            ['id'=>2, 'name'=> $seeText2,
                'mail'=>'watanabe.mitsuru@sasada.com','age'=> 8,
                'created_at'=>'2019-08-03 00:00:00',
                'updated_at'=>'2019-08-04 01:40:27']);
    }
}
