<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    use Notifiable;

    protected $connection = 'auth';
    protected $table = 'account';
    public $timestamps = false;
    protected $guarded = []; // come back to this once we have the scope better defined of this model.

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->sha_pass_hash;
    }

    public function characters()
    {
        return $this->hasMany(Character::class, 'account', 'id');
    }
}
