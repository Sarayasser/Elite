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
        return $user->getPoints() >= 50;
    }
}
