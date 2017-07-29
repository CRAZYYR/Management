<?php

namespace App\Http\Controllers\Page\Page;

use App\Http\Model\Customer;
use App\http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class pagevipController extends Controller
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
      return view('page.pagevip',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                             // 判断用户是否处于登录状态
        if(!session('uinfo')){
            return redirect('login');  
        }
             return view('page.addpageuservip');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                    // 判断用户是否处于登录状态
        if(!session('uinfo')){
            return redirect('login');
        }
        
        $input=Input::except('_token');
        if (!$input['cname'] || !$input['ccard'] || !$input['cphone'] ||!$input['caddress']) {
             return back()->with('error','添加VIP账户失败!');
        }
       $input['cvip']=1;
          $uid=Customer::insert($input);
          if ($uid) {

        
             return redirect('pagevip');
              
          }
          return back()->with('error','添加vip账户失败!');
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
       
       return view('page.pageupdatevip',compact('rs'));
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
           return redirect('pagevip');
       }
       
       
        return redirect('pagevip');
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
    public  function updatemypw(){
            // 判断用户是否处于登录状态
        if(!session('uinfo')){
            return redirect('login');
        }
        return view('page.updatepw');
        
    }
        public function updatepw(){
                  // 判断用户是否处于登录状态
        if(!session('uinfo')){
            return redirect('login');
        }

        $input=Input::except('_token');
        $oldpw=trim($input['oldpw']);
        $newpw=md5(md5(trim($input['newpw'])));
        $rs=User::where('uid',session('uinfo')['uid'])->first();
        if(md5(md5($oldpw))==($rs->upw))
        {
            User::where('uid',session('uinfo')['uid'])->update(array('upw'=>$newpw));
              return redirect('loginout');
        }else{
            return back()->with('error','原密码输入错误！,请检查后重新提交!');
        }
    }
}
