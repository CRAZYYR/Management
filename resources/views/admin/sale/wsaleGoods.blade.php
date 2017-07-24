@extends('layout.left')
@section('content')

    <div class="content">
        <div class="header">
            
            <h1 class="page-title">服务员销售信息</h1>

        </div>

   
<div class="btn-toolbar list-toolbar">
           <label>时间段选择 </label>
        <select name="lid" class="list" onchange="change()">
        @foreach($mtime as $mtime)
  <option value ="{{$mtime->umtime}}">{{$mtime->umtime}}</option>
  @endforeach
        </select>

</div>

        <div class="main-content mondatashow" >
            

  
<div class="row">

<div class="col-sm-6 col-md-12">

 
        <div class="panel panel-default">

            <div class="panel-heading no-collapse" style="text-align: center;">服务员销售情况</div>
        
            <table class="table table-bordered table-striped" >
              <thead>
         <tr>
      <th>账户</th>
      <th>姓名</th>
      <th>销售量(件)</th>


    </tr>
              </thead>
              <tbody>
            @foreach($saleinfo as $v)

    <tr>
      <td>{{$v->uaccount}}</td>
      <td>{{$v->uname}}</td>
      <td>{{$v->umtotle}}</td>

    

    </tr>
  @endforeach

              </tbody>
            </table>
        </div>

       
    </div>


</div>





<script type="text/javascript">

// 动态的改变月份数据
function change(){
var mtime=$('.list').find(" option:selected").val();
$.post("{{url('wsalegetmonth')}}",{'umtime':mtime,'_token':'{{csrf_token()}}'},function(data){
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
      