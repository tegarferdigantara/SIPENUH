<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class BroadcastWhatsappMessage
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $number;
    protected $message;
    protected $whatsappServerUrl;

    /**
     * Create a new job instance.
     */
    public function __construct($number, $message)
    {
        $this->number = $number;
        $this->message = $message;
        $this->whatsappServerUrl = env('WHATSAPP_SERVER_URL');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}
