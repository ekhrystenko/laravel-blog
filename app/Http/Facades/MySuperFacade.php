<?php

namespace App\Http\Facades;

class MySuperFacade  extends \Illuminate\Support\Facades\Facade{

    public static function getFacadeAccessor()
    {
        return 'mySuperClass';
    }
}
