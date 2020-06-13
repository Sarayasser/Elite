<?php

namespace App\Gamify\Badges;

use QCod\Gamify\BadgeType;

class ReadFivePosts extends BadgeType
{
    /**
     * Description for badge
     *
     * @var string
     */
    protected $description = 'Congratulations you have read 5 posts';

    /**
     * Check is user qualifies for badge
     *
     * @param $user
     * @return bool
     */
    public function qualifier($user)
    {
        if ( $user->getPoints() == 50){
            toastr()->success('Go to your profile to check it  ⚡️', 'New Badge 🥇', ['timeOut' => 10000]);
        }
        return $user->getPoints() >= 50;
    }
}
