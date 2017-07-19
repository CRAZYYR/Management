<?php

namespace App\Http\Controllers\Admin\Login;

use App\http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *显示登陆界面
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       return view('login.index');
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
     *登陆验证账号和密码
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if ($input=Input::except('_token')) {
            $where=array(
                'uaccount'=>trim($input['uname'])
                );
            $user=User::where($where)->first();
            // 判断用户是否存在
            if ($user) {
               if ($user->upw) {
                   $pw=$this->encrpt(trim($input['upw']));
                 if ($pw==$user->upw) {
                    $array=array(
                        'uid'=>$user->uid,
                        'uname'=>$user->uname,
                        'account'=>$user->uaccount,
                        );
                     session(array('uinfo'=>$array));
                     $up=array(
                        'uip'=>$_SERVER["REMOTE_ADDR"],
                        'utime'=>time()
                        );
                     // 更新用户的登陆时间和IP地址
                     User::where(array('uid'=>$user->uid))->update($up);
                   
                   return redirect('manage');

                 }else{
                     return back()->with('msg','你输入的密码错误!');
                }
               }


            }else{
        return back()->with('msg','你输入的账号错误!');

           

        }

    }else{
            return view('login.index');
        }

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
    public function  encrpt($en){
        return md5(md5($en));
    }
    public function loginout()
    {
        session(array('uinfo'=>null));
        return redirect('login');
    }
  
}
