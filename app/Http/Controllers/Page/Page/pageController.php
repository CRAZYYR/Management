<?php

namespace App\Http\Controllers\Page\Page;

use App\Http\Model\Customer;
use App\Http\Model\Goods;
use App\Http\Model\Goods_Cache;
use App\Http\Model\Month;
use App\Http\Model\Pz;
use App\Http\Model\Sales;
use App\Http\Model\Usermonth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class pageController extends Controller
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


        $salelists=Sales::where(array('uid'=>session('uinfo')['uid'],'smonth'=>date('Ym',time())))->join('pz', 'pz.pgid', '=', 'sales.glid')->paginate(20);

        return view('page.pagesale',compact('salelists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $glids=Goods::where('lid','!=',0)->get();
        return view('page.salegoods',compact('glids'));
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

                $input= Input::except('_token');


                if ($input['spric']=='' || $input['spric']=='' || $input['snumber']=='' || $input['sweight']=='' || $input['cname']=='' || $input['cphone']=='') {
                   return back()->with('error','填写参数可能有误,请检查后重新提交!');
                }



        $glid=Goods::where('gid',$input['gid'])->first();
        $gods=Goods::where('gid',$glid->lid)->first();
        $pname=$gods->gname;
 
        $input['glid']=$glid->lid;
        $input['sname']=$glid->gname;
        $input['stime']=time();
        $input['smonth']=date('Ym',time());
        $input['uname']=session('uinfo')['uname'];
       $input['uaccount']=session('uinfo')['account'];
        $input['uid']=session('uinfo')['uid'];

        $sid=Sales::insertGetId($input);
        $customer=array('cname'=>$input['cname'],'cphone'=>trim($input['cphone']));
        // 判断是否Sales插入成功
        if ($sid) {
            // 判断用户是否已经存在
            $user=Customer::where(array('cname'=>$input['cname'],'cphone'=>trim($input['cphone'])))->first();
            // 如果不是vip用户
            if (!$user) {
              Customer::insert($customer);
            }else{
                 // 如果是vip用户
              Customer::where(array('cname'=>$input['cname'],'cphone'=>trim($input['cphone'])))->increment('cpoint',10);
            }

            // 数据插入到usermonth表中
$this->InsertToUserMonth($input);
           
            // 将数据插入到PZ表中
      $this->InsertToPz($input,$pname);

        // 将数据插入到mounth 表中
            $this->InsertToMonth($input);

return back()->with('error','添加成功!');
        }
return back()->with('error','添加失败,请重新添加!');

    }

/**
 * 将数据插入到月份销售表中
 * [InsertToMonth description]
 */
    public function InsertToMonth($input){
        // 判断是否存在 货物 品牌   在这个月的销售记录表中
        $rs=Month::where(array('mtime'=>$input['smonth'],'gid'=>$input['gid'],'glid'=>$input['glid']))->first();
       
                if($rs){
                    // 存在
          Month::where(array('mtime'=>$input['smonth'],'gid'=>$input['gid'],'glid'=>$input['glid']))->increment(
            'mtotle',$input['snumber']);
                    Month::where(array('mtime'=>$input['smonth'],'gid'=>$input['gid'],'glid'=>$input['glid']))->increment('mmoney',$input['spric']);

                }else{
                    // 不存在
                    // 
            Month::insert(array(
                'mtime'=>$input['smonth'],
                'mtotle'=>$input['snumber'],
                'gid'=>$input['gid'],
                'mmoney'=>$input['spric'],
                'glid'=>$input['glid']

                ));
                }
    }

/**
 * 将数据插入到pz表中
 * @param [type] $input [description]
 */
        public function InsertToPz($input,$pname){
// 判断Pz表中是否存在这一月分类品牌的销售记录
            $rs=Pz::where(array('pgid'=>$input['glid'],'pmonth'=>$input['smonth']))->first();
         
            if($rs){
                // 存在
                Pz::where(array('pgid'=>$input['glid'],'pmonth'=>$input['smonth']))->increment('ptotle',$input['snumber']);
            }else{
                // 不存在
                 Pz::insertGetId(array(
                    'pname'=>$pname,
                    'pmonth'=>$input['smonth'],
                    'ptotle'=>$input['snumber'],
                    'pgid'=>$input['glid']
                    ));

            }
        }

/**
 * 把数据插入到Usermonth表中
 * @param [type] $usermonth [description]
 */
    public function InsertToUserMonth($input){
        $rs=Usermonth::where(array('uid'=>$input['uid'],'umtime'=>$input['smonth']))->first();

        if ($rs) {
            Usermonth::where(array('uid'=>$input['uid'],'umtime'=>$input['smonth']))->increment('umtotle',$input['snumber']);
             Usermonth::where(array('uid'=>$input['uid'],'umtime'=>$input['smonth']))->increment('umweight',$input['sweight']);
     
        }else{
            // 月分中不存在此用户
            Usermonth::insert(array(
                'uname'=>$input['uname'],
                'umtime'=>$input['smonth'],
                'umtotle'=>$input['snumber'],
                'uid'=>$input['uid'],
                'umweight'=>$input['sweight']
                ));
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

    // 密码修改
    public function updatepw(){

    }
}
