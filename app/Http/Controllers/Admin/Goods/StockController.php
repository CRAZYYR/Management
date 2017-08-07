<?php

namespace App\Http\Controllers\Admin\Goods;

use App\Http\Model\Agoods;
use App\Http\Model\Goods;
use App\Http\Model\Goods_Cache;
use App\Http\Model\Stock;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class StockController extends Controller
{
    /**
     * 进货信息详单
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $saleinfo=[];
     $mtime=Agoods::select('agdata')->orderBy('agdata','desc')->distinct()->get();
        $goods=Goods_Cache::where(array('lid'=>0))->get();
       
      $joins=Agoods::where('agoods.agdata',date('Ym',time())-1)->join('goods_cache', 'goods_cache.gid', '=', 'agoods.gid')->orderBy('agoods.agnumber','desc')->get();
           // dd($joins);
                foreach($goods as $good){
             foreach($joins as $k => $join){

            if ($good->gid==$join->aglid) {

                 $saleinfo[$good->gname][$k]=$join;
            }
            
           }
         }


        return view('admin.goods.stockGoods',compact('mtime','saleinfo'));
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
        // 进行数据的删除
       $rs=Goods::where(array('gid'=>$id))->delete();
       if ($rs) {
           return json_encode(array('state'=>1,'msg'=>'删除成功!'));
       }else{
        return json_encode(array('state'=>0,'msg'=>'删除失败!'));
       }
    }
    /**
     * 异步进行月份数据的插入
     * @return [type] [description]
     */
    public function getMonthData(){

        $input=Input::except('_token');

    $saleinfo=[];
     $mtime=Agoods::select('agdata')->orderBy('agdata','desc')->distinct()->get();
        $goods=Goods_Cache::where(array('lid'=>0))->get();
       
      $joins=Agoods::where('agoods.agdata',$input['agdata'])->join('goods_cache', 'goods_cache.gid', '=', 'agoods.gid')->orderBy('agoods.agnumber','desc')->get();


                foreach($goods as $good){
             foreach($joins as $k => $join){

            if ($good->gid==$join->aglid) {

                 $saleinfo[$good->gname][$k]=$join;
            }
            

           }
         }

    // 进行数据的拼接并返回
$str='';
        foreach($saleinfo as $ke => $va){
        $str.='<div class="row">

<div class="col-sm-6 col-md-12">

 
        <div class="panel panel-default">

            <div class="panel-heading no-collapse" style="text-align: center;">('.$ke.') 进货信息</div>
        ';
   $str.=' <table class="table table-bordered table-striped" >
              <thead>
         <tr>
      <th>商品名</th>
      <th>单价</th>
      <th>件数</th>
      <th>单重</th>
      <th>时间</th>
      <th style="width: 3.5em;"></th>
    </tr>
              </thead>
              <tbody>';
               foreach($va as $k => $v){


$str.=    '</tr>
              </thead>
              <tbody>

    <tr>
      <td>'.$v->agname.'</td>
      <td>'.$v->agpric.'</td>
      <td>'.$v->agnumber.'</td>
      <td>'.$v->agweight.'</td>
      <td>'.date('y-m-d',$v->agtime).'</td>';



    $str.='<td>
          <a href="#" role="button" data-toggle="modal" class="delete" value="'.$v->gid.'"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>';
             }


$str.= '  </tbody>
            </table>
        </div>

       
    </div>


</div>';


        }

    echo $str;

            }
}
