<?php

namespace App\Http\Controllers\Admin\User;

use App\http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *suser
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                        // 判断用户是否处于登录状态
        if(!session('uinfo')){
            return redirect('login');
        }
    
        $susers=User::where(array('uspu'=>1))->orderBy('utime','desc')->paginate(20);
         return view('admin.suser.users',compact('susers'));
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
        $rs=User::where(array('uid'=>$id))->first();
       
       return view('admin.suser.user',compact('rs'));

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
           return redirect('suser');
       }
       
       
        return redirect('suser');
    }

    /**
     * Remove the specified resource from storage.
     *
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
      $rs=User::where($input)->update(array('uspu'=>0));
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
