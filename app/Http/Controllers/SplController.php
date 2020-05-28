<?php


namespace App\Http\Controllers;


class SplController extends Controller
{
    public function index()
    {
        echo 123;

//        $mm = new Test();
//        $mm->show();
    }


    function __autoload($className)
    {
        echo 123;
        exit;
        return '../../Models/'.$className.'.php';
    }

}
