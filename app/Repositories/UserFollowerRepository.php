<?php

namespace App\Repositories;

use App\Models\UserFollower;

class UserFollowerRepository
{
    public function getRecordQuery($follower_id)
    {
        return UserFollower::where(
            'user_id', request()->user()->id
        )->where(
            'follower_id', $follower_id
        );
    }
}
