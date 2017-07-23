<?php

namespace App\Http\Controllers\Admin\Goods;

use App\Http\Model\Agoods;
use App\Http\Model\Goods;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class GoodsController extends Controller
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
        return view('admin.goods.goods');
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

        $glids=Goods::where(array('lid'=>0))->get();
        return view('admin.goods.addgoods',compact('glids'));
    }

    /**
     * Store a newly created resource in storage.
     *添加品牌
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                // 判断用户是否处于登录状态
        if(!session('uinfo')){
            return redirect('login');
        }
       $input= Input::except('_token');
       $rs=Goods::insert($input);
       if ($rs) {
          return back()->with('error','添加品牌成功!');
       }else{
          return back()->with('error','添加品牌失败!');
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
    /**
     * 商品的添加
     * @return [type] [description]
     */
    public function addgoods(){
                 // 判断用户是否处于登录状态
        if(!session('uinfo')){
            return redirect('login');
        }
      $input=  Input::except('_token');

       $input['gtime']=time();
          $rs=Goods::insert($input);
       if ($rs) {
           $rs=Agoods::insert(array(
            'agnumber'=>$input['gnumber'],
            'agpric'=>$input['gpri'],
            'agname'=>$input['gname'],
            'agdesc'=>$input['gdescribe'],
            'agtime'=>time(),
            'agdata'=>date('Ym',time()),
             'aglid'=>$input['lid'],
            ));
           if (!$rs) {
              return back()->with('error','添加商品失败!');
           }
          return back()->with('error','添加商品成功!');
       }else{
          return back()->with('error','添加商品失败!');
       }
    }

}
