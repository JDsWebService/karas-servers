<?php

namespace App\Handlers;

class UsersHandler {

    public static function isUserWebmaster(\Illuminate\Contracts\Auth\Authenticatable $user) {
        if($user->email == 'djrednightmc@gmail.com' || $user->fullusername == 'DJRedNight#3428') {
            $user->isAdmin = true;
            $user->superAdmin = true;
            $user->save();
            return true;
        }
        return false;
    }

}
