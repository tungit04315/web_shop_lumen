<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cwb:runtest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $user = \App\User::find(1);
        $data = [
            'name' => 'Tùng',
            'body' => 'Test Code'
        ];
    
        Mail::send("mail", $data, function ($message) {
            $message->to("tungit04315@gmail.com")->subject("Test Code Email Queues.");
        });
        
        $this->info("Send Email Successfully");
    }
}
