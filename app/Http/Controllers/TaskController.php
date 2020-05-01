<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $date = "04/30/1973";
        list($month, $day, $year) = preg_split ('[/.-]', $date);
        echo "Month: $month; Day: $day; Year: $year<br />\n";

        exit;

        echo 0?:3;
        echo '<br>';
        echo 0??3;

        exit;

        $arr = ['a','b','c','d'];
        $list = ['aa','bb','cc','dd'];
        $res = array_combine($arr,$list);
        var_dump($res);
        exit;

        $card = DB::select("select * from app.user");
        var_dump($card[0]->id);



        exit;
        return Task::where('user_id', auth('api')->user()->id)->get();

        exit;

        echo 123;

//        app()->getRoutes();

        $routes = Route::getRoutes();


//        var_dump($routes);

foreach($routes as $route) {
//    echo $route->getPath();
    var_dump($route);
    exit;
}

}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
