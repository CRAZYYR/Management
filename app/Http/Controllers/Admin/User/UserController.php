<?php

namespace App\Http\Controllers\Admin\User;

use App\http\Model\User;
use App\Http\Model\User_Cache;
use App\Http\Model\Usermonth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
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
       
        $wusers=User::where(array('uspu'=>0))->orderBy('utime','desc')->paginate(20);
         return view('admin.user.wusers',compact('wusers'));
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
             return view('admin.user.adduser');
       
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
        if (!$input['uname'] || !$input['upw'] || !$input['uaccount']) {
             return back()->with('error','添加账户失败!');
        }
        
        $input['uip']=$_SERVER["REMOTE_ADDR"];
        $input['utime']=time();
        $input['upw']=md5(md5($input['upw']));
          $uid=User::insertGetId($input);
          if ($uid) {

            $array=array('uid'=>$uid,'uname'=>$input['uname'],'uaccount'=>$input['uaccount']);
               $rs=User_Cache::insert($array);
               if ($rs) {
                   return redirect('wuser');
               }else{
                return back()->with('error','添加账户失败!');
               }
          }
          return back()->with('error','添加账户失败!');
           
          
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
        $rs=User::where(array('uid'=>$id))->first();
       
       return view('admin.user.wuser',compact('rs'));
       
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
       $input['upw']=md5(md5($input['upw']));

       $rs=User::where(array('uid'=>$id))->update($input);
       if ($rs) {
           return redirect('wuser');
       }
       
       
        return redirect('wuser');
    }

    /**
     * Remove the specified resource from storage.
     *异步进行数据的删除
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
       $rs=User::where(array('uid'=>$id))->delete();
       if ($rs) {
           return json_encode(array('state'=>1,'msg'=>'删除成功!'));
       }else{
        return json_encode(array('state'=>0,'msg'=>'删除失败!'));
       }
    }
     
    /**
     * 设置超级用户
     * [uspu description]
     * @return [type] [description]
     */
    public function uspu(){
      $input= Input::except('_token');
      $rs=User::where($input)->update(array('uspu'=>1));
       if ($rs) {
           return json_encode(array('state'=>1,'msg'=>'修改成功!'));
       }else{
        return json_encode(array('state'=>0,'msg'=>'修改失败!'));
       }
    }
    /**
     * 锁定账号
     * @return [type] [description]
     */
    public function ulock(){

        $input=Input::all();
        // 解锁枷锁判断
        if ($input['js']) {
              $input= Input::except('_token','js');
      $rs=User::where($input)->update(array('ulock'=>0));
       if ($rs) {
           return json_encode(array('state'=>1,'msg'=>'帐号已解锁!'));
       }else{
        return json_encode(array('state'=>0,'msg'=>'帐号解锁失败!'));
       }

        }else{

   $input= Input::except('_token','js');
      $rs=User::where($input)->update(array('ulock'=>1));
       if ($rs) {
           return json_encode(array('state'=>1,'msg'=>'帐号已锁定!'));
       }else{
        return json_encode(array('state'=>0,'msg'=>'帐号锁定失败!'));
       }
        }
   


    }
}
