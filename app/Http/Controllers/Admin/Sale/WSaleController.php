<?php

namespace App\Http\Controllers\Admin\Sale;

use App\Http\Model\Usermonth;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class WSaleController extends Controller
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
        $mtime=Usermonth::select('umtime')->orderBy('umtime','desc')->distinct()->get();
      
       
           $saleinfo=Usermonth::where('usermonth.umtime',date('Ym',time()))->join('user', 'user.uid', '=', 'usermonth.uid')->orderBy('usermonth.umtotle','desc')->get();

        return view('admin.sale.wsaleGoods',compact('mtime','saleinfo'));
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

     public function getMonthData(){
            // 判断用户是否处于登录状态
        if(!session('uinfo')){
            return redirect('login');
        }
        $input=Input::except('_token');


                $saleinfo=[];
        $mtime=Usermonth::select('umtime')->orderBy('umtime','desc')->distinct()->get();
      
       
           $saleinfo=Usermonth::where('usermonth.umtime',$input['umtime'])->join('user', 'user.uid', '=', 'usermonth.uid')->orderBy('usermonth.umtotle','desc')->get();

    // 进行数据的拼接并返回
$str='';
      
        $str.='<div class="row">

<div class="col-sm-6 col-md-12">

 
        <div class="panel panel-default">

            <div class="panel-heading no-collapse" style="text-align: center;">服务员销售情况</div>
        ';
   $str.=' <table class="table table-bordered table-striped" >
              <thead>
         <tr>
      <th>账户</th>
      <th>姓名</th>
      <th>销售量(件)</th>
  
    </tr>
              </thead>
              <tbody>';
               foreach($saleinfo as $k => $v){


    $str.=    '</tr>
              </thead>
              <tbody>

    <tr>
      <td>'.$v->uaccount.'</td>
      <td>'.$v->uname.'</td>
      <td>'.$v->umtotle.'</td></tr>';




             }


$str.= '  </tbody>
            </table>
        </div>

       
    </div>


</div>';


    echo $str;

            }
}
