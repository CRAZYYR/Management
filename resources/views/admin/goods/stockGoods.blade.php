@extends('layout.left')
@section('content')

    <div class="content">
        <div class="header">
            
            <h1 class="page-title">进货信息详单</h1>

        </div>

   
<div class="btn-toolbar list-toolbar">
           <label>时间段选择 </label>
        <select name="lid" class="list" onchange="change()">

        @foreach($mtime as $mtime)
  <option value ="{{$mtime->agdata}}">{{$mtime->agdata}}</option>
  @endforeach
        </select>

</div>

        <div class="main-content mondatashow" >
            
@foreach($saleinfo as $ke => $va)
  
<div class="row">

<div class="col-sm-6 col-md-12">

 
        <div class="panel panel-default">

            <div class="panel-heading no-collapse" style="text-align: center;">({{$ke}}) 进货信息</div>
        
            <table class="table table-bordered table-striped" >
              <thead>
         <tr>
      <th>商品名</th>
      <th>单价</th>
      <th>件数</th>
      <th>单重</th>
      <th>时间</th>
    
       <th style="width: 3.5em;"></th>
    </tr>
              </thead>
              <tbody>
 @foreach($va as $k => $v)
    <tr>
      <td>{{$v->agname}}</td>
      <td>{{$v->agpric}}</td>
      <td>{{$v->agnumber}}</td>
      <td>{{$v->agweight}}</td>
      <td>{{date('y-m-d',$v->agtime)}}</td>
    
      <td>
         
          <a href="#" role="button" data-toggle="modal" class="delete" value="{{$v->gid}}"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
  @endforeach

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
$.post("{{url('getMonth')}}",{'agdata':mtime,'_token':'{{csrf_token()}}'},function(data){
      // if (data.state) {
               $('.mondatashow').empty();
               $('.mondatashow').append(data);

    },'html');

}
// 异步删除

$('.delete').click(function(){
  var that=$(this).parent().parent();
    var gid=$(this).attr('value');
    $.post("{{url('stock')}}/"+gid,{'_method':'delete','_token':'{{csrf_token()}}'},function(data){
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
      