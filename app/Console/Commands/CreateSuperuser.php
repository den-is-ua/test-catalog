<?php

namespace App\Console\Commands;

use App\Models\User;
use Hash;
use Illuminate\Console\Command;

class CreateSuperuser extends Command
{
    protected $signature = 'create-superuser';


    public function handle()
    {
        $email = 'superuser@gmail.com';
        $pass = 'secret';

        User::create([
            'name' => 'Superuser',
            'email' => $email,
            'password' => Hash::make($pass)
        ]);

        $this->info("User has been created. Use email/password: {$email}/{$pass}");
    }
}
