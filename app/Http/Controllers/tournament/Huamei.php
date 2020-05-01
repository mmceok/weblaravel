<?php


namespace App\Http\Controllers\tournament;


class Huamei implements Bird
{
    const INFO = '666';

    function call()
    {
        // TODO: Implement call() method.
        echo 'hhhhmmmm';
    }

    function eat()
    {
        // TODO: Implement eat() method.
        echo 'chi chong zi';
        echo '<br>'.self::INFO;
        echo '<br>'.static::INFO;
    }


}
