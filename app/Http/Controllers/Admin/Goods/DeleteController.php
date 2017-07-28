<?php

namespace App\Http\Controllers\Admin\Goods;

use App\Http\Model\Goods;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class DeleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *货物下架页面
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    // 判断用户是否处于登录状态
        if(!session('uinfo')){
            return redirect('login');
        }
        $goodlists=Goods::paginate(20);

       return view('admin.goods.deletegoods',compact('goodlists'));
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
                         // 判断用户是否处于登录状态
        if(!session('uinfo')){
            return redirect('login');
        }
        $va=Goods::where(array('gid'=>$id))->first();

      if ($va->lid) {
          $rs=Goods::where(array('gid'=>$id))->delete();
           if ($rs) {
               return json_encode(array('state'=>1,'msg'=>'删除成功!'));
           }else{
            return json_encode(array('state'=>0,'msg'=>'删除失败!'));
           }
      }else{
          $rs=Goods::where(array('gid'=>$id))->delete();
          if($rs){
    $rs=Goods::where(array('lid'=>$id))->delete();
    
           return json_encode(array('state'=>1,'msg'=>'删除成功!'));

          }else{
              return json_encode(array('state'=>0,'msg'=>'删除失败!'));
          }
      
      
      
      }
        // 进行数据的删除
  
    }
}
