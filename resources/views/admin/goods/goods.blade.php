@extends('layout.left')
@section('content')
    <div class="content">
        <div class="header">
            
            <h1 class="page-title">品牌->添加</h1>
     

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
      <form id="tab" method="post"  action="{{asset('goods')}}">
    
           {{csrf_field()}}
         
        <div class="form-group">
        <label>品牌</label>
        <input name="gname" type="text" placeholder="请输入品牌!"  class="form-control">
        </div>
        <div class="form-group">
        <label>描述</label>
        <textarea name="gdescribe" placeholder="请简单描述这个品牌" class="form-control" rows="5"></textarea>
        <!-- <input name="ccard" type="text"   class="form-control"> -->
        </div>
   
       
  

    <div class="btn-toolbar list-toolbar">
      <button class="btn btn-primary"><i class="fa fa-save"></i> 添加</button>
     
    </div>
  </div>
</div>



@endsection