<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Model\Customer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CustomerController extends Controller
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
        $customers=Customer::where(array('cvip'=>0))->orderBy('cpoint','desc')->paginate(20);
         return view('admin.manage.users',compact('customers'));
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
       
       return view('admin.manage.user',compact('rs'));
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
           return redirect('customer');
       }
       
       
     
        return redirect('customer');
    }

    /**
     * Remove the specified resource from storage.
     *异步删除数据
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          // 判断用户是否处于登录状态
        if(!session('uinfo')){
            return redirect('login');
        }
        // 进行数据的删除
       $rs=Customer::where(array('cid'=>$id))->delete();
       if ($rs) {
           return json_encode(array('state'=>1,'msg'=>'删除成功!'));
       }else{
        return json_encode(array('state'=>0,'msg'=>'删除失败!'));
       }
    }
}
