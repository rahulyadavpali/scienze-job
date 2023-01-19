<?php

namespace App\Mail;

use App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class JobUpdate extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $job = Jobs::all();
        $job = $job->reverse();
        $name = $this->user->name;
        return $this->subject('New jobs on Scienze Jobs : Jobs For Scientists By The Scientists')->view('mail.jobupdate', compact('job', 'name'));
    }

}
