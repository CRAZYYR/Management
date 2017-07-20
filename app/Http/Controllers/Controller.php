<?php

namespace App\Http\Controllers;

use App\Http\Model\Customer;
use App\Http\Model\Goods;
use App\http\Model\Server;
use App\http\Model\User;
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
         $goods=Goods::where('lid','=',0)->orderBy('gmoney','desc')->get();
        $ghot=Goods::where(['lid'=>0])->orderBy('gsale','desc')->take(4)->get();
         $ghotch=Goods::where('lid','!=',0)->orderBy('gsale','desc')->take(6)->get();
        $uinfo=session('uinfo');
         $waiter=User::orderBy('utotle','desc')->take(6)->get();
        $server=Server::where(array('sname'=>'title'))->first();
        $title=$server->sdescribe;
        $customer=Customer::orderBy('cpoint','desc')->get();
        View::share(array('title'=>$title,'uinfo'=>$uinfo,'ghot'=>$ghot,'ghotch'=>$ghotch,'waiter'=>$waiter,'customer'=>$customer,'goods'=>$goods));
   }
}
