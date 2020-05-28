<?php


namespace App\Http\Controllers;


use phpDocumentor\Reflection\Types\Integer;

/**
 * ioc di
 * Class TestController
 * @package App\Http\Controllers
 */
class TestController extends Controller
{
    //http://127.0.0.1:8383/api/test
    public function index()
    {
        echo 'tst';
        die;

        $con = new container();
        $con->register('redis',function (){
            return new redis;
        });

        $con->save('redis');

        exit;

        $bs = new Business(new Redis);
        $bs->save();
        $bs->updateIoc(new Mysql);
        $bs->save();

    }

}

class Business
{
    private $md;

    public function __construct($ioc)
    {
        $this->md = $ioc;
    }

    public function save()
    {
        $this->md->set();
    }

    public function updateIoc($ioc)
    {
        $this->md = $ioc;
    }

}

interface Db
{
    public function set();
}

class redis implements Db
{
    function set()
    {
        // TODO: Implement set() method.
        echo 'redis set val';
    }

}

class mysql implements Db
{
    public function set()
    {
        // TODO: Implement set() method.
        echo 'mysql set val';
    }

}

class container
{
    private $list = [];
    public function register($name,$obj)
    {
        $this->list[$name] = $obj;
    }

    public function save($name)
    {
        // () 和 call_user_func 效果一样
//        $this->list[$name]()->set();

        $ins = call_user_func($this->list[$name]);
        $ins->set();
    }
}
