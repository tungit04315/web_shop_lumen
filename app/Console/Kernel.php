<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Cache;
use DateTimeZone;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\SendNotificationCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->call(function () {
        //     $user = \App\User::find(1); // Thay 1 bằng ID của người dùng bạn muốn gửi thông báo
        //     $user->notify(new \App\Notifications\SampleNotification);
        // })->dailyAt('15:30') // Đổi thời gian và múi giờ theo định dạng giờ:phút (14:30) và múi giờ Việt Nam
        // ->timezone('Asia/Ho_Chi_Minh');

        // $schedule->call(function () {
        //     $user = \App\User::find(1);
        //     $user->notify(new \App\Notifications\SampleNotification);
        // })->daily();

        // $schedule->command('cwb:runtest')->timezone('Asia/Ho_Chi_Minh')->weekly('08:00');
        // $schedule->command('cwb:runtest')->timezone('Asia/Ho_Chi_Minh')->dailyAt('13:17');
        // $schedule->command('cwb:runtest')->everyFiveMinutes()->withoutOverlapping();
        $schedule->command('cwb:runtest')->everyMinute();

        //VD:->everyMinute();, ->everyTwoMinutes();, ->everyThreeMinutes();, ->daily();, >dailyAt('13:00');, ....
    }
}
