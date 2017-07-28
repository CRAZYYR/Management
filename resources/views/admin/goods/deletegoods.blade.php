@extends('layout.left')
@section('content')

    <div class="content">
        <div class="header">
            
            <h1 class="page-title">商品总游览</h1>

        </div>

        <div style="color: #C70909;">注意：删除品牌将会删除所属品牌的所有商品！</div>

        <div class="main-content mondatashow" >
            

  
<div class="row">

<div class="col-sm-6 col-md-12">

 
        <div class="panel panel-default">

    
        
            <table class="table table-bordered table-striped" >
              <thead>
         <tr>
      <th>商品名</th>
 <th>所属</th>
    
      <th style="width: 3.5em;"></th>
    </tr>
              </thead>
              <tbody>
 @foreach($goodlists as $k => $v)
    <tr>
      <td>{{$v->gname}}</td>
    @if($v->lid)
     <td>商品</td>
     @else
       <td>品牌</td>
     @endif
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




<ul class="pagination">
 
  {!!$goodlists->render()!!}
  

</ul>


<script type="text/javascript">

// 异步删除
$('.delete').click(function(){
  var that=$(this).parent().parent();
    var gid=$(this).attr('value');
    $.post("{{url('deletegoods')}}/"+gid,{'_method':'delete','_token':'{{csrf_token()}}'},function(data){
      if (data.state) {
       layer.msg(data.msg);  
       that.remove();
      window.location.reload(); 
      }else{
        layer.msg(data.msg);
      }

    },'json');
 
 });

</script>




@endsection
      