@extends('layout.page')
@section('content')

<div class="content">
        <div class="header">
            
            <h1 class="page-title">近一个月的销售情况</h1>
   
<div class="btn-toolbar list-toolbar">
 <!--    <a class="btn btn-primary" href="{{url('wuser/create')}}"><i class="fa fa-plus"></i>添加店员</a>

  <div class="btn-group">
        </div> -->
        <div class="main-content">
            


<div class="row">

<div class="col-sm-12 col-md-12">


        <div class="panel panel-default">
            <div class="panel-heading no-collapse"><center>近一个月的销售情况</center></div>
            <table class="table table-bordered table-striped">
              <thead>
    <tr>
      <th>商品</th>
      <th>价格</th>
      <th>件数</th>
      <th>重量</th>
      <th>分类</th> 
      <th>订单时间</th> 
     <!--  <th style="width: 3.5em;"></th> -->
    </tr>
              </thead>
              <tbody>
@foreach($salelists as $sale)
    <tr>
      <td>{{$sale->cname}}</td>
      <td>{{$sale->spric}}</td>
      <td>{{$sale->snumber}}</td>
      <td>{{$sale->sweight}}</td>
      <td>{{$sale->pname}}</td>

        <td>{{date('Y-m-d',$sale->stime)}}</td>

 <!--      <td>
          <a href="{{url('wuser').'/'.$sale->uid}}" class="update" ><i class="fa fa-pencil"></i></a>
          <a href="#" role="button" data-toggle="modal" class="delete" value="{{$sale->uid}}"><i class="fa fa-trash-o"></i></a>
      </td> -->
    </tr>
 
@endforeach
              </tbody>
            </table>
        </div>
    </div>


</div>






<script type="text/javascript">
// 异步进行超级管理
$('.uspu').click(function(){

if ($("input[type='checkbox']").is(':checked')) {
var that =$(this).parent().parent();
var uid=$(this).val();
    $.post("{{url('wuser/uspu')}}",{'uid':uid,'_token':'{{csrf_token()}}'},function(data){
      if (data.state) {
       layer.msg(data.msg);  
        that.remove();
      }else{
        layer.msg(data.msg);
      }

    },'json');

}


});
// 异步进行账号锁定
$('.ulock').click(function(){
var uid=$(this).val();
if ($("input[type='checkbox']").is(':checked')) {

    $.post("{{url('wuser/ulock')}}",{'uid':uid,'js':0,'_token':'{{csrf_token()}}'},function(data){
      if (data.state) {
       layer.msg(data.msg);  
       
      }else{
        layer.msg(data.msg);
      }

    },'json');

}else{
// 进行解锁

    $.post("{{url('wuser/ulock')}}",{'uid':uid,'js':1,'_token':'{{csrf_token()}}'},function(data){
      if (data.state) {
       layer.msg(data.msg);  
       
      }else{
        layer.msg(data.msg);
      }

    },'json');



}


});


$('.delete').click(function(){
  var that=$(this).parent().parent();
    var uid=$(this).attr('value');
    $.post("{{url('wuser')}}/"+uid,{'_method':'delete','_token':'{{csrf_token()}}'},function(data){
      if (data.state) {
       layer.msg(data.msg);  
       that.remove();
      }else{
        layer.msg(data.msg);
      }

    },'json');
 
});


</script>


<ul class="pagination">
 
  {!!$salelists->render()!!}
  

</ul>




@endsection