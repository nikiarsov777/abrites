<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable; 
use Illuminate\Queue\SerializesModels; 
use Illuminate\Queue\InteractsWithQueue; 
use Illuminate\Contracts\Queue\ShouldQueue; 
use Illuminate\Foundation\Bus\Dispatchable; 
use Illuminate\Support\Facades\Mail;
use App\Mail\SendVerifyMail;

class SendEmailVerifyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    protected $details;
    
    
    /** 
    * Create a new job instance.
    * @return void
    */ 
    
    public function __construct($details)
    {
        $this->details = $details;
    }
    
    /** 
    * Execute the job.
    *
    * @return void
    */
    
    public function handle()
    {
    
        $data = $this->details;
        
        Mail::to($this->details['email'])->send(new SendVerifyMail($data));
    }
}