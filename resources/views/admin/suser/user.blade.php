@extends('layout.left')
@section('content')
    <div class="content">
        <div class="header">
            
            <h1 class="page-title">超级管理修改</h1>
     

        </div>
        <div class="main-content">
            

<div class="row">
  <div class="col-md-4">
    <br>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
      <form id="tab" method="post"  action="{{asset('suser').'/'.$rs->uid}}">
          {{method_field("PUT")}}
           {{csrf_field()}}
         
        <div class="form-group">
        <label>帐号</label>
        <input name="uaccount" type="text" value="{{$rs->uaccount}}" class="form-control">
        </div>
        <div class="form-group">
        <label>姓名</label>
        <input name="uname" type="text" value="{{$rs->uname}}" class="form-control">
        </div>
        <div class="form-group">
        <label>设置新密码</label>
        <input name="upw" type="text" placeholder="请输入新密码!"  class="form-control">
        </div>
    
   
    <div class="btn-toolbar list-toolbar">
      <button class="btn btn-primary"><i class="fa fa-save"></i> 修改</button>
     
    </div>
  </div>
</div>



@endsection