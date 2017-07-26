<?php

namespace App\Http\Controllers\Admin\Manage;

use App\Http\Model\Month;
use App\Http\Model\Pz;
use App\Http\Model\Sales;
use App\http\Model\Server;
use App\Http\Model\Usermonth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 判断用户是否处于登录状态
        if(!session('uinfo')){
            return redirect('login');
        }
        // 多表联合查询，进行数据的统计
        // 返回上一个月的销售记录
        $month=Month::where(array('month.mtime'=>date('Ym',time())-1))->join('goods_cache', 'goods_cache.gid', '=', 'month.gid')->orderBy('month.mtotle','desc')->take(10)->get();
        //上一月服务员的销售记录
        $waiter=Usermonth::where(array('usermonth.umtime'=>date('Ym',time())-1))->join('user_cache', 'user_cache.uid', '=', 'usermonth.uid')->orderBy('usermonth.umtime','desc')->get();

        // 上一月销量排行前四的品牌
        $ghot=Pz::where(array('pz.pmonth'=>date('Ym',time())-1))->join('goods_cache', 'goods_cache.gid', '=', 'pz.pgid')->orderBy('pz.ptotle','desc')->take(4)->get();
        $gmontht=Pz::where(array('pmonth'=>date('Ym',time())-1))->sum('ptotle');

        return view('admin.manage.index',compact('month','waiter','ghot','gmontht'));
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
