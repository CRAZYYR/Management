<?php

namespace App\Http\Controllers;

use App\http\Model\Server;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
     function __construct() {
           // 判断用户是否处于登录状态
        if(!session('uinfo')){
            return redirect('login');
        }

        $uinfo=session('uinfo');
        $server=Server::where(array('sname'=>'title'))->first();
        $title=$server->sdescribe;
        View::share(array('title'=>$title,'uinfo'=>$uinfo));
   }
}
