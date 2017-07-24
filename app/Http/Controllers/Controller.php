<?php

namespace App\Http\Controllers;

use App\Http\Model\Customer;
use App\Http\Model\Goods;
use App\Http\Model\Sales;
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
         // 销售最火的4类品牌
        // $ghot=Goods::where(['lid'=>0])->orderBy('gsale','desc')->take(4)->get();
        // 销售最火的6类商品
         $ghotch=Goods::where('lid','!=',0)->orderBy('gsale','desc')->take(6)->get();
        // 个人登录信息
        $uinfo=session('uinfo');

         // 网站的基本信息
        $server=Server::where(array('sname'=>'title'))->first();
        $title=$server->sdescribe;
        // // 顾客的基本信息
        // $customer=Customer::orderBy('cpoint','desc')->get();
        View::share(array('title'=>$title,'uinfo'=>$uinfo,'ghotch'=>$ghotch,'goods'=>$goods));
   }
}
