<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Define Relationship Blog/Post
    public function posts() {
        return $this->hasMany('App\Models\Blog\Post');
    }

    // Get Tribe Rank Attribute
    public function getTribeRankAttribute($value) {
        switch($value) {
            case 'owner':
                return 'Owner';
                break;
            case 'admin':
                return 'Admin';
                break;
            case 'member':
                return 'Member';
                break;
        }
    }

    // Define Steam ID Mutator
    public function getSteamIdAttribute($value) {
        if ( empty($value) ) { // will check for empty string, null values, see php.net about it
            $this->attributes['steam_id'] = NULL;
        } else {
            $this->attributes['steam_id'] = $value;
        }
    }

    // Define Epic ID Mutator
    public function getEpicIdAttribute($value) {
        if ( empty($value) ) { // will check for empty string, null values, see php.net about it
            $this->attributes['epic_id'] = NULL;
        } else {
            $this->attributes['epic_id'] = $value;
        }
    }
}
