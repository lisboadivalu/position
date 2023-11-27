<?php

namespace App\Jobs;

use App\Mail\AdminUserMailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendAdminEmailJoib implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $name;
    protected string $email;
    protected string $password;

    /**
     * Create a new job instance.
     */
    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->password = $data['password'];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $template = (new AdminUserMailTemplate($this->name, $this->email, $this->password));
        Mail::to($this->email)->send($template);
    }
}
