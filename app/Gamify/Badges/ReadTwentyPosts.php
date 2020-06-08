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
        return $user->getPoints() >= 200;
    }
}
