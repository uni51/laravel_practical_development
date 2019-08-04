<?php

namespace Tests\Feature;

use App\Person;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
//      /* peopleテーブルを利用する */
//        $data = [
//            'id' => 1,
//            'name' => 'YAMADA-TARO',
//            'mail' => 'taro@yamada',
//            'age' => '34'
//        ];

//        $this->assertDatabaseHas('people', $data);

//        $data['id'] =2;
//        $this->assertDatabaseMissing('people', $data);


//      /* モデルを利用する */
//        $data = [
//            'id' => 1,
//            'name' => 'DUMMY',
//            'mail' => 'dummy@mail',
//            'age' => 0,
//        ];
//        $person = new Person();
//        $person->fill($data)->save();
//        $this->assertDatabaseHas('people',$data);
//
//
//        $person->name = 'NOT-DUMMY';
//        $person->save();
//        $this->assertDatabaseMissing('people',$data);
//
//        $data['name'] = 'NOT-DUMMY';
//        $this->assertDatabaseHas('people',$data);
//
//
//        $person->delete();
//        $this->assertDatabaseMissing('people',$data);



//      /* シードを利用する */
        $this->seed(\DatabaseSeeder::class);
        $person = Person::find(1);
        $data = $person->toArray();

        $this->assertDatabaseHas('people', $data);

        $person->delete();
        $this->assertDatabaseMissing('people', $data);

    }
}
