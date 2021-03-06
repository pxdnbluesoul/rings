<?php

namespace App\Policies;

use App\Account;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user is an administrator.
     *
     * @param  App\Account $user
     * @return mixed
     */
    public function authorize(Account $user)
    {
        $level = DB::connection('auth')->table('account_access')->where([
            ['id', '=', $user->id],
            ['gmlevel', '>=', 3],
            ['RealmID', '=', -1]
        ])->orWhere([
        ['id', '=', $user->id],
        ['gmlevel', '>=', 3],
        ])->count();

        return $level;
    }
}