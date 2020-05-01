<?php


namespace App\Http\Controllers\tournament;


use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index()
    {
        $hm = new Huamei();

        $hm->call();
        $hm->eat();
    }

}
