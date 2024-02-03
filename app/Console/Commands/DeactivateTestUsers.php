<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class DeactivateTestUsers extends Command
{
    protected $signature = 'user:deactivate-test-users';
    
    protected $description = 'Deactivate users with email addresses containing the word "test"';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::where('email', 'like', '%test%')->get();
        $count = 0;

        foreach ($users as $user) {
            $user->status = 'Not Active';
            $user->save();
            $count++;
        }

        $this->info($count . ' users have been deactivated.');
    }
}
