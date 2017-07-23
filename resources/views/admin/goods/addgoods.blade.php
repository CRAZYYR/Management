@extends('layout.left')
@section('content')
    <div class="content">
        <div class="header">
            
            <h1 class="page-title">商品->添加</h1>
     

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
      <form id="tab" method="post"  action="{{url('add')}}">
    
           {{csrf_field()}}
         
        <div class="form-group">
        <label>品牌</label>
        <select name="lid">
        @foreach($glids as $glid)
  <option value ="{{$glid->gid}}">{{$glid->gname}}</option>
  @endforeach
        </select>
        </div>

       <div class="form-group">
        <label>商品名</label>
        <input name="gname" type="text" placeholder="请输入商品名!"  class="form-control">
        </div>

      <div class="form-group">
        <label>数量(件)</label>
        <input name="gnumber" type="text" placeholder="请输入商品数量!"  class="form-control">
        </div>


           <div class="form-group">
        <label>单价(g/元)</label>
        <input name="gpri" type="text" placeholder="请输入商品价格!"  class="form-control">
        </div>

             <div class="form-group">
        <label>单重量(g)</label>
        <input name="gweight" type="text" placeholder="请输入商品重量!"  class="form-control">
        </div>


        <div class="form-group">
        <label>描述</label>
        <textarea name="gdescribe" placeholder="请简单描述这个商品" class="form-control" rows="5"></textarea>
        <!-- <input name="ccard" type="text"   class="form-control"> -->
        </div>
   
       
  

    <div class="btn-toolbar list-toolbar">
      <button class="btn btn-primary"><i class="fa fa-save"></i> 添加</button>
     
    </div>
  </div>
</div>



@endsection