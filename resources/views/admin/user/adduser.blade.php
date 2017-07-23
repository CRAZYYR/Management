@extends('layout.left')
@section('content')
    <div class="content">
        <div class="header">
            
            <h1 class="page-title">店员登录帐号添加</h1>
     
         
        </div>
        <div class="main-content">
             @if(session('error'))
                <h2>{{session('error')}}</h2> 
                 @endif

<div class="row">
  <div class="col-md-4">
    <br>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
      <form id="tab" method="post"  action="{{asset('wuser')}}">
         
           {{csrf_field()}}
         
        <div class="form-group">
        <label>帐号</label>
        <input name="uaccount" type="text" placeholder="请输入登录帐号!"  class="form-control">
        </div>
        <div class="form-group">
        <label>姓名</label>
        <input name="uname" type="text" placeholder="请输入姓名!" class="form-control">
        </div>
        <div class="form-group">
        <label>密码</label>
        <input name="upw" type="password" placeholder="请输入登录密码!"  class="form-control">
        </div>
             <div class="form-group">
        <label>超级管理员</label>
      
          <table><td>
         <input  type="radio" name="uspu"  value="1" />开启</td>
         <td>
         <input  type="radio" name="uspu"  value="0"/>关闭</td>
       </table>
        </div>
     
     
       
  

    <div class="btn-toolbar list-toolbar">
      <button class="btn btn-primary"><i class="fa fa-save"></i> 添加</button>
     
    </div>
  </div>
</div>



@endsection