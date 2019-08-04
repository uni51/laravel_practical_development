<?php

namespace App\Console;

use App\Person;
use App\Jobs\MyJob;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Storage;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // コマンドを実行する
//        $schedule->exec('./mycmd.sh');

        // 共通の前処理
        $count = Person::all()->count();
        $id = rand(0, $count) + 1;

        // クロージャで処理を実行する
//        $schedule->call(function() use ($id)
//        {
//            $person = Person::find($id);
//            MyJob::dispatch($person);
//        });


        // オブジェクトで処理を実行する
//        $obj = new ScheduleObj($id);
//        $schedule->call($obj);


        /* インスタンス実行
        $schedule->call(new MyJob($id)); */

        /* ディスパッチする
        $schedule->call(function() use($id)
        {
            MyJob::dispatch($id);
        }); */

        $schedule->job(new MyJob($id));
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}



//class ScheduleObj
//{
//    private $person;
//
//    public function __construct($id)
//    {
//        $this->person = Person::find($id);
//    }
//
//    public function __invoke()
//    {
//        Storage::append('person_access_log.txt', $this->person->all_data);
//        MyJob::dispatch($this->person);
//        return 'true';
//    }
//}
