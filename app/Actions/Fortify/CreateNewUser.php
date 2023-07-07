<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Actions\PasswordValidationRules;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input)
    {
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => 'user', // set default role sebagai 'user'
        ]);
    }
}
