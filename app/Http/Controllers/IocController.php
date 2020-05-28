<?php


namespace App\Http\Controllers;


use Identicon\Identicon;
use Illuminate\Http\Request;

class IocController extends Controller
{
    //http://127.0.0.1:8383/api/ioc
    public function index(Request $request)
    {

        $res = $request->all();

        $request->name = 'xyz';
//        $request->nickName = 'aaaa';

        echo $request->id;

        echo $request->nickName;

        echo $request->age;

        dump($request);

        exit;

        echo $request->input('id');

        echo 'ioc';

        exit;

        $identicon = new Identicon();


        echo 'hello wd';
        exit;


        $di = new Di();

        $di->set('test', function() {
            return new Test();
        });

//        $di->get('test');

        var_dump($di->_service);

        exit;
        $di = new Di();
        $di->set('redis', function() {
            return new redisDB([
                'host' => '127.0.0.1',
                'port' => 6379
            ]);
        });
        $di->set('cache', function() use ($di) {
            $cache = new cache([
                'connect' => 'redis'
            ]);
            $cache->setDi($di);
            return $cache;
        });


        // 然后在任何你想使用cache的地方
        $cache = $di->get('redis');
        $cache->get('key'); // 获取缓存数据
//        $cache->save('key', 'value', 'lifetime'); // 保存数据
//        $cache->delete('key'); // 删除数据

    }

    function selfAdd($n){

        $ee = 'ss';

        $args = func_get_args();
        var_dump($args);
        exit;

        $num = 1;
        $add = function () use (&$num){
            return $num+=1;
        };
         echo $add();  // 1
         echo '<br>';
         echo $add();  // 2
         echo '<br>';
         echo $add();  // 3
        echo '<br>';
//        exit;
        $str = '';
        $sum = 0;
        while($num<=$n){
            $str = $str.'+'.$num;
            $sum += $num;
            $num++;
        }
        $str = substr($str,1);
        echo $str.' = '.$sum;
    }

}

class Test
{
    protected $pa = 'xx';

    public function __construct()
    {
//        echo 'new Test';
    }

    public function getName()
    {
        return 'test.getName';
    }
}

class Di
{
    public $_service = [];

    public function set($name, $definition)
    {
        $this->_service[$name] = $definition;
    }

    public function get($name)
    {
        if (isset($this->_service[$name])) {
            $definition = $this->_service[$name];
        } else {
            throw new Exception("Service '" . name . "' wasn't found in the dependency injection container");
        }

        if (is_object($definition)) {
            $instance = call_user_func($definition);
        }

        return $instance;
    }
}

class redisDB
{
    protected $_di;

    protected $_options;

    public function __construct($options = null)
    {
        $this->_options = $options;
    }

    public function setDI($di)
    {
        $this->_di = $di;
    }

    public function get($key, $lifetime=0)
    {
        // code
    }

    public function save($key, $value, $lifetime)
    {
        // code
    }

    public function delete($key)
    {
        // code
    }
}

class cache
{
    protected $_di;

    protected $_options;

    protected $_connect;

    public function __construct($options = null)
    {
        $this->_options = $options;
    }

    public function setDI($di)
    {
        $this->_di = $di;
    }

    protected function _connect()
    {
        $options = $this->_options;
        if (isset($options['connect'])) {
            $service = $options['connect'];
        } else {
            $service = 'redis';
        }

        return $this->_di->get($service);
    }

    public function get($key, $lifetime=0)
    {
        $connect = $this->_connect;
        if (!is_object($connect)) {
            $connect = $this->_connect();
            $this->_connect = $connect;
        }
        // code
//        ...
        return $connect->find($key, $lifetime);
    }

    public function save($key, $value, $lifetime)
    {
        $connect = $this->_connect;
        if (!is_object($connect)) {
            $connect = $this->_connect();
            $this->_connect = $connect;
        }
        // code
//        ...
        return $connect->save($key, $lifetime);
    }

    public function delete($key)
    {
        $connect = $this->_connect;
        if (!is_object($connect)) {
            $connect = $this->_connect();
            $this->_connect = $connect;
        }
        // code
//        ...
        $connect->delete($key, $lifetime);
    }
}
