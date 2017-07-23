@extends('layout.left')
@section('content')

    <div class="content">
        <div class="header">
            
            <h1 class="page-title">销售信息</h1>

        </div>

   
<div class="btn-toolbar list-toolbar">
           <label>时间段选择 </label>
        <select name="lid" class="list" onchange="change()">
        @foreach($mtime as $mtime)
  <option value ="{{$mtime->mtime}}">{{$mtime->mtime}}</option>
  @endforeach
        </select>

</div>

        <div class="main-content">
            

 @foreach($saleinfo as $k => $v)  
<div class="row">

<div class="col-sm-6 col-md-12">

 
        <div class="panel panel-default">

            <div class="panel-heading no-collapse" style="text-align: center;">{{$k}}==销售情况</div>
        
            <table class="table table-bordered table-striped" >
              <thead>
         <tr>
      <th>商品名</th>
      <th>商品单价</th>
      <th>销售件数</th>
      <th>销售盈利</th>
    
      <th style="width: 3.5em;"></th>
    </tr>
              </thead>
              <tbody>

    <tr>
      <td>{{$v->gname}}</td>
      <td>{{$v->gpri}}</td>
      <td>{{$v->mtotle}}</td>
      <td>{{$v->mmoney}}</td>
    
      <td>
          <a href="{{url('customervip').'/'.$v->cid}}" class="update" ><i class="fa fa-pencil"></i></a>
          <a href="#" role="button" data-toggle="modal" class="delete" value="{{$v->cid}}"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
 

              </tbody>
            </table>
        </div>

       
    </div>


</div>
 @endforeach






<script type="text/javascript">

// 动态的改变月份数据
function change(){
var mtime=$('.list').find(" option:selected").val();
$.post("{{url('getMonthData')}}",{'mtime':mtime,'_token':'{{csrf_token()}}'},function(data){
      if (data.state) {
       layer.msg(data.msg);  
       that.remove();


      }else{
        layer.msg(data.msg);
      }

    },'html');

}



$('.delete').click(function(){
  var that=$(this).parent().parent();
    var cid=$(this).attr('value');
    $.post("{{url('customer')}}/"+cid,{'_method':'delete','_token':'{{csrf_token()}}'},function(data){
      if (data.state) {
       layer.msg(data.msg);  
       that.remove();
      }else{
        layer.msg(data.msg);
      }

    },'json');
 
});


</script>




@endsection
      