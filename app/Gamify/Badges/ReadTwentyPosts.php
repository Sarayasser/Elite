<?php

namespace App\Gamify\Badges;

use QCod\Gamify\BadgeType;

class ReadTwentyPosts extends BadgeType
{
    /**
     * Description for badge
     *
     * @var string
     */
    protected $description = 'Congratulations you have read 20 posts';
    protected $level=3;

    /**
     * Check is user qualifies for badge
     *
     * @param $user
     * @return bool
     */
    public function qualifier($user)
    {
        if ( $user->getPoints() == 200){
            toastr()->success('Go to your profile to check it  ⚡️', 'New Badge 🥇', ['timeOut' => 10000]);
        }
        return $user->getPoints() >= 200;
    }
}
