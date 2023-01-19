<?php

namespace App\Console\Commands;

use App\Emails;
use App\Mail\JobUpdate;
use Illuminate\Http\Request;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class DailyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Respectively send an exclusive job offers to everyone daily via email.';

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
     * @return int
     */
    public function handle()
    {
        $users = Emails::all();
        if($users->count() > 0)
        {
            if($users->agree_id == 1)
            {
                foreach($users as $user)
                {
                    Mail::to($user)->send(new JobUpdate($user));
                }
            }
        }
        $this->info('Successfully sent daily mail to everyone.');
    }

}
