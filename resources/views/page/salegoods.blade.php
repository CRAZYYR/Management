@extends('layout.page')
@section('content')
    <div class="content">
        <div class="header">
            
            <h1 class="page-title">记录账单</h1>
     

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
      <form id="tab" method="post"  action="{{url('waiter')}}">
    
           {{csrf_field()}}
         
        <div class="form-group">
        <label>商品选择</label>
        <select name="gid">
        @foreach($glids as $glid)
  <option value ="{{$glid->gid}}">{{$glid->gname}}</option>
  @endforeach
        </select>
        </div>

       <div class="form-group">
        <label>价格(元)</label>
        <input name="spric" type="text" placeholder="请输入价格!"  class="form-control">
        </div>

      <div class="form-group">
        <label>数量(件)</label>
        <input name="snumber" type="number" placeholder="请输入商品数量!"  class="form-control">
        </div>


           <div class="form-group">
        <label>重量(g)</label>
        <input name="sweight" type="text" placeholder="请输入商品重量!"  class="form-control">
        </div>

             <div class="form-group">
        <label>顾客姓名</label>
        <input name="cname" type="text" placeholder="请输入顾客姓名!"  class="form-control">
        </div>
        <div class="form-group">
        <label>联系方式</label>
        <input name="cphone" type="text" placeholder="请输入顾客联系方式!"  class="form-control">
        </div>

        <div class="form-group">
        <label>其他说明</label>
        <textarea name="sdescribe" placeholder="其他附带说明！" class="form-control" rows="5"></textarea>
        <!-- <input name="ccard" type="text"   class="form-control"> -->
        </div>
   
       
  

    <div class="btn-toolbar list-toolbar">
      <button class="btn btn-primary"><i class="fa fa-save"></i> 添加</button>
     
    </div>
  </div>
</div>



@endsection