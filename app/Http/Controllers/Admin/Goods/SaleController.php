<?php

namespace App\Http\Controllers\Admin\Goods;

use App\Http\Model\Goods;
use App\Http\Model\Goods_Cache;
use App\Http\Model\Month;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *获取月份
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            // 判断用户是否处于登录状态
        if(!session('uinfo')){
            return redirect('login');
        }
        $saleinfo=[];
        $mtime=Month::select('mtime')->orderBy('mtime','desc')->distinct()->get();
        $goods=Goods_Cache::where(array('lid'=>0))->get();
       
           $joins=Month::where('month.mtime',date('Ym',time()))->join('goods_cache', 'goods_cache.gid', '=', 'month.gid')->orderBy('month.mtotle','desc')->get();

                foreach($goods as $good){
             foreach($joins as $k => $join){

            if ($good->gid==$join->lid) {

                 $saleinfo[$good->gname][$k]=$join;
            }
            
           }
         }
// dd($saleinfo);
        return view('admin.goods.saleGoods',compact('mtime','saleinfo'));
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
        //
    }
    /**
     * 异步进行月份数据的插入
     * @return [type] [description]
     */
    public function getMonthData(){
            // 判断用户是否处于登录状态
        if(!session('uinfo')){
            return redirect('login');
        }

        $input=Input::except('_token');

    $saleinfo=[];
        $goods=Goods_Cache::where(array('lid'=>0))->get();
       
           $joins=Month::where('month.mtime',$input['mtime'])->join('goods_cache', 'goods_cache.gid', '=', 'month.gid')->orderBy('month.mtotle','desc')->get();
            
            foreach($goods as $good){
             foreach($joins as $k => $join){

            if ($good->gid==$join->lid) {

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

            <div class="panel-heading no-collapse" style="text-align: center;">('.$ke.') 销售情况</div>
        ';
   $str.=' <table class="table table-bordered table-striped" >
              <thead>
         <tr>
      <th>商品名</th>
      <th>商品单价</th>
      <th>销售件数</th>
      <th>销售盈利</th>
    
      <th style="width: 3.5em;"></th>
    </tr>
              </thead>
              <tbody>';
               foreach($va as $k => $v){


$str.=    '</tr>
              </thead>
              <tbody>

    <tr>
      <td>'.$v->gname.'</td>
      <td>'.$v->gpri.'</td>
      <td>'.$v->mtotle.'</td>
      <td>'.$v->mmoney.'</td></tr>';

    // $str.='<td>
    //       <a href="'.url('customervip').'/'.$v->gid.'" ';



    // $str.=' class="update" ><i class="fa fa-pencil"></i></a>
    //       <a href="#" role="button" data-toggle="modal" class="delete" value="'.$v->gid.'"><i class="fa fa-trash-o"></i></a>
    //   </td>
    // </tr>';
 
             }


$str.= '  </tbody>
            </table>
        </div>

       
    </div>


</div>';


        }

//     foreach($saleinfo as $k => $v)  {
//         $str.='<div class="row">

// <div class="col-sm-6 col-md-12">

 
//         <div class="panel panel-default">

//             <div class="panel-heading no-collapse" style="text-align: center;">'.$k.'==销售情况</div>
//         ';
//    $str.=' <table class="table table-bordered table-striped" >
//               <thead>
//          <tr>
//       <th>商品名</th>
//       <th>商品单价</th>
//       <th>销售件数</th>
//       <th>销售盈利</th>
    
//       <th style="width: 3.5em;"></th>
//     </tr>
//               </thead>
//               <tbody>

//     <tr>
//       <td>'.$v->gname.'</td>
//       <td>'.$v->gpri.'</td>
//       <td>'.$v->mtotle.'</td>
//       <td>'.$v->mmoney.'</td>';

//     $str.='<td>
//           <a href="'.url('customervip').'/'.$v->gid.'" ';



//     $str.=' class="update" ><i class="fa fa-pencil"></i></a>
//           <a href="#" role="button" data-toggle="modal" class="delete" value="'.$v->gid.'"><i class="fa fa-trash-o"></i></a>
//       </td>
//     </tr>
 

//               </tbody>
//             </table>
//         </div>

       
//     </div>


// </div>';

// }
    // 进行数据的拼接并返回结束
    // 
    echo $str;

            }
}
