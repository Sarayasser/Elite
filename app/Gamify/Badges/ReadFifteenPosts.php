<?php

namespace App\Gamify\Badges;

use QCod\Gamify\BadgeType;

class ReadFifteenPosts extends BadgeType
{
    /**
     * Description for badge
     *
     * @var string
     */
    protected $description = 'Congratulations you have read 15 posts';
    protected $level=2;

    /**
     * Check is user qualifies for badge
     *
     * @param $user
     * @return bool
     */
    public function qualifier($user)
    {
        return $user->getPoints() >= 150;
    }
}
