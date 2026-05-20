<?php

namespace App\Jobs;

use App\Mail\SendMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $data;
    protected $subject;
    protected $mail_to;
    protected $view;

    public function __construct($mail_to, $subject, $view, $data)
    {
        //
        $this->data = $data;
        $this->mail_to = $mail_to;
        $this->view = $view;
        $this->subject = $subject;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->mail_to)->send(new SendMail($this->subject, $this->view, $this->data));
    }
}
