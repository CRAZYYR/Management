@extends('layout.left')
@section('content')
    <div class="content">
        <div class="header">
            
            <h1 class="page-title">VIP客户信息修改</h1>
     

        </div>
                @if(session('error'))
                <h2>{{session('error')}}</h2> 
                 @endif
        <div class="main-content">
            

<div class="row">
  <div class="col-md-4">
    <br>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
      <form id="tab" method="post"  action="{{asset('customervip')}}">
    
           {{csrf_field()}}
         
        <div class="form-group">
        <label>姓名</label>
        <input name="cname" type="text" placeholder="请输入VIP姓名!"  class="form-control">
        </div>
        <div class="form-group">
        <label>身份证号码</label>
        <input name="ccard" type="text" placeholder="请输入VIP身份证帐号"  class="form-control">
        </div>
       
       
        <div class="form-group">
        <label>联系方式</label>
        <input name="cphone" type="text" placeholder="请输入VIP联系方式" class="form-control">
        </div>
        <div class="form-group">
        <label>地址</label>
        <input name="caddress" type="text" placeholder="请输入VIP地址"  class="form-control">
        </div>

       
  

    <div class="btn-toolbar list-toolbar">
      <button class="btn btn-primary"><i class="fa fa-save"></i> 添加</button>
     
    </div>
  </div>
</div>



@endsection