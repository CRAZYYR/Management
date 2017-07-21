@extends('layout.left')
@section('content')

    <div class="content">
        <div class="header">
            
            <h1 class="page-title">普通顾客信息</h1>
   

        </div>
        <div class="main-content">
            


<div class="row">

<div class="col-sm-6 col-md-12">


        <div class="panel panel-default">
            <div class="panel-heading no-collapse"><center>服务员信息</center></div>
            <table class="table table-bordered table-striped">
              <thead>
    <tr>
      <th>账号</th>
      <th>姓名</th>
      <th>登录时间</th>
      <th>超级管理</th>
      <th>是否锁定</th> 
      <th style="width: 3.5em;"></th>
    </tr>
              </thead>
              <tbody>
@foreach($wusers as $wuser)
    <tr>
      <td>{{$wuser->uaccount}}</td>
      <td>{{$wuser->uname}}</td>
        <td>{{date('Y-m-d',$wuser->utime)}}</td>
      <td>


      <input class="uspu"   type="checkbox" value="{{$wuser->uid}}"  />
     
        
      </td>
      <td>
   
              <input class="ulock"  type="checkbox"  value="{{$wuser->uid}}" />
           

      </td>
      <td>
          <a href="{{url('wuser').'/'.$wuser->uid}}" class="update" ><i class="fa fa-pencil"></i></a>
          <a href="#" role="button" data-toggle="modal" class="delete" value="{{$wuser->uid}}"><i class="fa fa-trash-o"></i></a>
      </td>
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
 
  {!!$wusers->render()!!}
  

</ul>



@endsection
      