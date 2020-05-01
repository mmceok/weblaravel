<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Jobs\Queue;

class QueuedController extends Controller
{
    //
    public function Test(){




        for($i=0;$i<100;$i++) {

            $arr = [
                'id' => $i
            ];

            $this->dispatch(new Queue($arr));
            echo "成功";
            sleep(2);
        }
    }
}
