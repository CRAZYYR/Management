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

        <div class="main-content mondatashow" >
            
@foreach($saleinfo as $ke => $va)
  
<div class="row">

<div class="col-sm-6 col-md-12">

 
        <div class="panel panel-default">

            <div class="panel-heading no-collapse" style="text-align: center;">({{$ke}}) 销售情况</div>
        
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
 @foreach($va as $k => $v)
    <tr>
      <td>{{$v->gname}}</td>
      <td>{{$v->gpri}}</td>
      <td>{{$v->mtotle}}</td>
      <td>{{$v->mmoney}}</td>
    
<!--       <td>
          <a href="{{url('customervip').'/'.$v->gid}}" class="update" ><i class="fa fa-pencil"></i></a>
          <a href="#" role="button" data-toggle="modal" class="delete" value="{{$v->gid}}"><i class="fa fa-trash-o"></i></a>
      </td> -->
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
$.post("{{url('getMonthData')}}",{'mtime':mtime,'_token':'{{csrf_token()}}'},function(data){
      // if (data.state) {
               $('.mondatashow').empty();
               $('.mondatashow').append(data);
      // layer.msg(data);  
     //  that.remove();


      // }else{
      //   layer.msg(data.msg);
      // }

    },'html');

}




</script>




@endsection
      