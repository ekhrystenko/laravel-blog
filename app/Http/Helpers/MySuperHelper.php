<?php

namespace App\Http\Helpers;

class MySuperHelper
{
    private $_number = 0;

    public function getResult(int $t = 0)
    {
        return $t + 14545454;
    }
}
