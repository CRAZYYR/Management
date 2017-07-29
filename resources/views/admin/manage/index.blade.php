@extends('layout.left')
@section('content')
    <div class="content">
        <div class="header">
            <div class="stats">
    <p class="stat"><span class="label label-info">{{date('Y',time())}}</span> 年</p>
    <p class="stat"><span class="label label-success">{{date('m',time())}}</span>月</p>
    <p class="stat"><span class="label label-danger">{{date('d',time())}}</span> 日</p>
</div>

            <h1 class="page-title">欢迎你的光临</h1>


        </div>
        <div class="main-content">
            


<!-- 销量排行前四的商品总 -->

    <div class="panel panel-default">
        <a href="#page-stats" class="panel-heading" data-toggle="collapse">上一月销量排行前四的品牌:</a>
        <div id="page-stats" class="panel-collapse panel-body collapse in">

                    <div class="row">
                        @foreach($ghot as $ghot)
                        <div class="col-md-3 col-sm-6">
                            <div class="knob-container">
                                <input class="knob" data-width="200" data-min="0" data-max="{{$gmontht}}" data-displayPrevious="true" value="{{$ghot->ptotle}}" data-fgColor="#92A3C2" data-readOnly=true; >
                                <h3 class="text-muted text-center">{{$ghot->gname}}</h3>
                            </div>
                        </div>
                      @endforeach
                    
                    </div>
        </div>
    </div>
<!-- 销售排行前6的商品 -->
<!-- <div class="row">
<div class="col-sm-6 col-md-12">
        <div class="panel panel-default"> 
            <div class="panel-heading no-collapse">
                <span class="panel-icon pull-right">
                    <a href="#" class="demo-cancel-click" rel="tooltip" title="点击刷新"><i class="fa fa-refresh"></i></a>
                </span>
               推销排行前六商品
            </div>
            <table class="table list">
              <tbody>
              @foreach($ghotch as $ghotch)
                  <tr>
                      <td>
                          <a href="#"><p class="title">{{$ghotch->gname}}</p></a>
                          <p class="info">总量:{{$ghotch->gnumber}}件</p>
                      </td>
                      <td>
                          <p>商品单价(g)</p>
                          <a href="#">${{$ghotch->gpri}}</a>
                      </td>
                           <td>
                          <p>商品重(g)</p>
                          <a href="#">{{$ghotch->gweight}}</a>
                      </td>
                          <td>
                          <p>销售量</p>
                          <a href="#">{{$ghotch->gsale}}件</a>
                      </td>
                      <td>
                          <p class="text-danger h3 pull-right" style="margin-top: 12px;">${{$ghotch->gmoney}}</p>
                      </td>
                  </tr>
                 
                    @endforeach
              </tbody>
            </table>
        </div>
    </div>
    

</div> -->
<div class="row">

<div class="col-sm-6 col-md-12">


        <div class="panel panel-default">
            <div class="panel-heading no-collapse">上一月服务员销量</div>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>帐号</th>
                  <th>姓名</th>
                  <th>销售量(件)</th>
                </tr>
              </thead>
              <tbody>

              @foreach($waiter as $wa)

                <tr>
                  <td>{{$wa->uaccount}}</td>
                  <td>{{$wa->uname}}</td>
                  <td>{{$wa->umtotle}}</td>
                </tr>
               @endforeach
              </tbody>
            </table>
        </div>
    </div>


</div>
<div class="row">
     <div class="col-sm-6 col-md-12">
    

        <div class="panel panel-default">
            <div class="panel-heading no-collapse">商品 上一月的销售情况(前10)</div>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>商品名称</th>
                  <th>销售(g)</th>
                   <th>收入</th>
                </tr>
              </thead>
              <tbody>
              <?php $moneyt=0; ?>
              @foreach($month as $month)
                <tr>
                  <td>{{$month->gname}}</td>
                  <td>{{$month->mtotle}}</td>
                  <td>${{$month->mmoney}}</td>
                </tr>
                <?php $moneyt+=$month->mmoney ;?>
              @endforeach
                <tr>
                  <th>总收入</th>
                  <th colspan="2">${{$moneyt}}</th>
                </tr>

              </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
      