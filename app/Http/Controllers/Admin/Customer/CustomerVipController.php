<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Model\Customer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CustomerVipController extends Controller
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
        $customers=Customer::where(array('cvip'=>1))->orderBy('cpoint','desc')->paginate(20);
         return view('admin.manage.usersVIP',compact('customers'));
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
        
    // 判断用户是否处于登录状态
        if(!session('uinfo')){
            return redirect('login');
        }
        $rs=Customer::where(array('cid'=>$id))->first();
       
       return view('admin.manage.uservip',compact('rs'));
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
                  // 判断用户是否处于登录状态
        if(!session('uinfo')){
            return redirect('login');
        }
       $input=Input::except('_token','_method');
       $rs=Customer::where(array('cid'=>$id))->update($input);
       if ($rs) {
           return redirect('customervip');
       }
       
       
        return redirect('customervip');
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
