<?php

namespace App\Http\Controllers\Admin\Sale;

use App\Http\Model\Sales;
use App\Http\Model\User_Cache;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class TSaleController extends Controller
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

                $saleinfo=[];
        $mtime=Sales::select('smonth')->orderBy('smonth','desc')->distinct()->get();
 
           $saleinfos=Sales::where('sales.smonth',date('Ym',time()))->get();

        return view('admin.sale.totlesaleGoods',compact('mtime','saleinfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
     * 返回选中月的服务员记录记录
     * @return [type] [description]
     */
      public function getMonthData(){

            // 判断用户是否处于登录状态
        if(!session('uinfo')){
            return redirect('login');
        }
        $input=Input::except('_token');
      

                $saleinfo=[];
        $mtime=Sales::select('smonth')->orderBy('smonth','desc')->distinct()->get();
 
           $saleinfos=Sales::where('sales.smonth',$input['smonth'])->get();
        


    // 进行数据的拼接并返回
$str='';
      
        $str.='<div class="row">

<div class="col-sm-10 col-md-12">

 
        <div class="panel panel-default">

            <div class="panel-heading no-collapse" style="text-align: center;">服务员销售情况</div>
        ';
   $str.=' <table class="table table-bordered table-striped" >
              <thead>
         <tr>
      <th>账户</th>
      <th>姓名</th>
       <th>顾客</th>
       <th>商品名</th>
      <th>价格</th>
 <th>数量</th>
 <th>时间</th>
  
    </tr>
              </thead>
              <tbody>';
               foreach($saleinfos as $k => $v){


    $str.=    '</tr>
              </thead>
              <tbody>

    <tr>
      <td>'.$v->uaccount.'</td>
      <td>'.$v->uname.'</td>
      <td>'.$v->cname.'</td>
      <td>'.$v->sname.'</td>
      <td>'.$v->spric.'</td>
      <td>'.$v->snumber.'</td>
      <td>'.date('Y-m-d H:i:s',$v->stime).'</td></tr>';




             }


$str.= '  </tbody>
            </table>
        </div>

       
    </div>


</div>';



    echo $str;

            }
}
