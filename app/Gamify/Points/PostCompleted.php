<?php

namespace App\Gamify\Points;

use QCod\Gamify\PointType;
use App\User;

class PostCompleted extends PointType
{
    /**
     * Number of points
     *
     * @var int
     */
    public $points = 10;

    /**
     * Point constructor
     *
     * @param $subject
     */
    public function __construct($subject)
    {
        $this->subject = $subject;
    }

    /**
     * User who will be receive points
     *
     * @return mixed
     */
    public function payee()
    {
        // $badge=auth()->user()->badge();
        // dd($badge);
        //  Notification::create([
        //    'description'=>'New Badge Earned',
        //    'user_id'=>auth()->user(),
        // ]);
        return auth()->user();

    }
}
