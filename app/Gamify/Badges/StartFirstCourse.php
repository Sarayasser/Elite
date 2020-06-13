<?php

namespace App\Gamify\Badges;

use QCod\Gamify\BadgeType;

class StartFirstCourse extends BadgeType
{
    /**
     * Description for badge
     *
     * @var string
     */
    protected $description = 'Congratulations for starting your first course ';

    /**
     * Check is user qualifies for badge
     *
     * @param $user
     * @return bool
     */
    public function qualifier($user)
    {
        if ( $user->getPoints() == 10){
            toastr()->success('Go to your profile to check it  ⚡️', 'New Badge 🥇', ['timeOut' => 10000]);
        }
        
        return $user->getPoints() >= 10;
    }
}
