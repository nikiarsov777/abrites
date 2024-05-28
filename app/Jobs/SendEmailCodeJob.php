<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable; 
use Illuminate\Queue\SerializesModels; 
use Illuminate\Queue\InteractsWithQueue; 
use Illuminate\Contracts\Queue\ShouldQueue; 
use Illuminate\Foundation\Bus\Dispatchable; 
use Illuminate\Support\Facades\Mail;
use App\Mail\SendCodeMail;
use Illuminate\Support\Facades\Config;

class SendEmailCodeJob implements ShouldQueue
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
        array_pop($data);
        
        Mail::to($this->details['email'])->send(new SendCodeMail($data));
    }
}