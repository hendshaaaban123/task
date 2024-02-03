<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class SoftDeleteInactiveUsers extends Command
{
    protected $signature = 'user:soft-delete-inactive-users';
    
    protected $description = 'Soft delete users with a status of "Not Active"';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $count = User::where('status', 'Not Active')->delete();

        $this->info($count . ' users have been soft deleted.');
    }
}
