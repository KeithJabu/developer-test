<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'position',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function checkUserbyEmail(string $email) {
        return User::query()->where('email', $email)->first();

    }

    public static function userExists(string $user_email): bool
    {
        $user = (new User)->checkUserbyEmail($user_email);

        if ($user) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
