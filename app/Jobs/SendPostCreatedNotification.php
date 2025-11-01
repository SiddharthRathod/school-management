<?php

namespace App\Jobs;

use App\Models\Post;
use App\Models\User;
use App\Mail\PostCreatedMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendPostCreatedNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $post;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $roles = explode(',',$this->post->targete_user);
        // Retrieve all users who need to be notified
        $users = User::whereHas('roles', function ($query) use ($roles) {
                        $query->whereIn('name', $roles);
                    })->get();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new PostCreatedMail($this->post));
        }
    }
}
