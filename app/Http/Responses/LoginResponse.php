<?php

namespace App\Http\Responses;

use Filament\Http\Responses\Auth\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            return redirect()->to('/admin');
        }

        if ($user->hasRole('mentor')) {
            return redirect()->to('/mentor');
        }

        if ($user->hasRole('member')) {
            return redirect()->to('/member');
        }

        return redirect()->to('/');
    }
}