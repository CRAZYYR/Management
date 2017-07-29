@extends('layout.page')
@section('content')
    <div class="content">
        <div class="header">
            
            <h1 class="page-title">VIP客户信息修改</h1>
     

        </div>
        <div class="main-content">
            

<div class="row">
  <div class="col-md-4">
    <br>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
      <form id="tab" method="post"  action="{{asset('pagevip').'/'.$rs->cid}}">
          {{method_field("PUT")}}
           {{csrf_field()}}
         
        <div class="form-group">
        <label>姓名</label>
        <input name="cname" type="text" value="{{$rs->cname}}" class="form-control">
        </div>
        <div class="form-group">
        <label>身份证号码</label>
        <input name="ccard" type="text" value="{{$rs->ccard}}" class="form-control">
        </div>
         <div class="form-group">
        <label>积分</label>
        <input name="cpoint" type="text" value="{{$rs->cpoint}}" class="form-control">
        </div>
       
        <div class="form-group">
        <label>联系方式</label>
        <input name="cphone" type="text" value="{{$rs->cphone}}" class="form-control">
        </div>
        <div class="form-group">
        <label>地址</label>
        <input name="caddress" type="text" value="{{$rs->caddress}}" class="form-control">
        </div>

       
  

    <div class="btn-toolbar list-toolbar">
      <button class="btn btn-primary"><i class="fa fa-save"></i> 修改</button>
     
    </div>
  </div>
        </div>
      </div>



    </div>
@endsection
