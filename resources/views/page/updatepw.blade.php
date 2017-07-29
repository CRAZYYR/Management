@extends('layout.page')
@section('content')
    <div class="content">
        <div class="header">
            
            <h1 class="page-title">密码修改</h1>
     

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
      <form id="tab" method="post"  action="{{asset('pageupdatepw')}}">
    
           {{csrf_field()}}
         
        <div class="form-group">
        <label>原密码</label>
        <input name="oldpw" type="password" placeholder="请输入原密码!"  class="form-control">
        </div>
        <div class="form-group">
        <label>新密码</label>
        <input name="newpw" type="password" placeholder="请输入新密码"  class="form-control">
        </div>
       
       
   

       
  

    <div class="btn-toolbar list-toolbar">
      <button class="btn btn-primary"><i class="fa fa-save"></i>修改</button>
     
    </div>
  </div>
</div>



@endsection