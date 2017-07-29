<?php

namespace App\Http\Controllers\Page\Page;

use App\Http\Model\Goods;
use App\Http\Model\Goods_Cache;
use App\Http\Model\Pz;
use App\Http\Model\Sales;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class pageController extends Controller
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


        $salelists=Sales::where(array('uid'=>session('uinfo')['uid'],'smonth'=>date('Ym',time())))->join('pz', 'pz.pgid', '=', 'sales.glid')->paginate(20);

        return view('page.pagesale',compact('salelists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $glids=Goods::where('lid','!=',0)->get();
        return view('page.salegoods',compact('glids'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $input= Input::except('_token');
        $glid=Goods::where('gid',$input['gid'])->first();
        $input['glid']=$glid->lid;
        $input['sname']=$glid->gname;
        $input['stime']=time();
        $input['smonth']=date('Ym',time());
        $input['uname']=session('uinfo')['uname'];
       $input['uaccount']=session('uinfo')['account'];
        $input['uid']=session('uinfo')['uid'];
        dd($input);
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

    // 密码修改
    public function updatepw(){

    }
}
