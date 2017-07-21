<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>{{$title}}</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/lib/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/layer/mobile/need/layer.css')}}">
    <link rel="stylesheet" href="{{asset('public/lib/font-awesome/css/font-awesome.css')}}">

    <script src="{{asset('public/lib/jquery-1.11.1.min.js')}}" type="text/javascript"></script>
 <script src="{{asset('public/layer/layer.js')}}" type="text/javascript"></script>

        <script src="{{asset('public/lib/jQuery-Knob/js/jquery.knob.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $(".knob").knob();
        });
    </script>


    <link rel="stylesheet" type="text/css" href="{{asset('public/stylesheets/theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/stylesheets/premium.css')}}">
    

    <link href="{{asset('public/switch/css/inserthtml.com.radios.css')}}" rel="stylesheet" type="text/css"/>



 
</head>
<body class=" theme-blue">

    <!-- Demo page code -->

    <script type="text/javascript">
        $(function() {
            var match = document.cookie.match(new RegExp('color=([^;]+)'));
            if(match) var color = match[1];
            if(color) {
                $('body').removeClass(function (index, css) {
                    return (css.match (/\btheme-\S+/g) || []).join(' ')
                })
                $('body').addClass('theme-' + color);
            }

            $('[data-popover="true"]').popover({html: true});
            
        });
    </script>
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
            color: #fff;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
   
  <!--<![endif]-->

    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="" href="index.html"><span class="navbar-brand"><span class="fa fa-paper-plane"></span> {{$title}}</span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;">
          <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span> {{$uinfo['uname']}}
                    <i class="fa fa-caret-down"></i>
                </a>

              <ul class="dropdown-menu">
                <li><a href="">{{$uinfo['account']}}</a></li>
                <li class="divider"></li>
                <li><a tabindex="-1" href="{{url('loginout')}}">退出登录</a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </div>
    

    <div class="sidebar-nav">
    <ul>
    <li><a href="#" data-target=".dashboard-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-dashboard"></i> 本店基本信息<i class="fa fa-collapse"></i></a></li>
    <li><ul class="dashboard-menu nav nav-list collapse in">
            <li><a href="{{url('manage')}}"><span class="fa fa-caret-right"></span>销售基本信息</a></li>
            <li ><a href="{{url('customer')}}"><span class="fa fa-caret-right"></span> 普通顾客信息</a></li>
            <li ><a href="{{url('customervip')}}"><span class="fa fa-caret-right"></span>VIP顾客信息</a></li>
          
    </ul></li>

    <li data-popover="true" data-content="Items in this group require a <strong><a href='#' target='blank'>premium license</a><strong>." rel="popover" data-placement="right"><a href="#" data-target=".premium-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-fighter-jet"></i> 账户管理<i class="fa fa-collapse"></i></a></li>
        <li><ul class="premium-menu nav nav-list collapse">
         
            <li ><a href="{{url('wuser')}}"><span class="fa fa-caret-right"></span> 店员帐号管理</a></li>
           
     
            <li ><a href="premium-pricing-tables.html"><span class="fa fa-caret-right"></span> 超级用户管理</a></li>
        
    </ul></li>

        <li><a href="#" data-target=".accounts-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-briefcase"></i> 账单信息<i class="fa fa-collapse"></i> </a></li>
        <li><ul class="accounts-menu nav nav-list collapse">
            <li ><a href="sign-in.html"><span class="fa fa-caret-right"></span> 进货账单</a></li>
            <li ><a href="sign-up.html"><span class="fa fa-caret-right"></span> 销售账单</a></li>
            <li ><a href="sign-up.html"><span class="fa fa-caret-right"></span> 售后服务账单</a></li>
            <li ><a href="reset-password.html"><span class="fa fa-caret-right"></span> 利润信息账单</a></li>
    </ul></li>

        <li><a href="#" data-target=".legal-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i> 货物信息<i class="fa fa-collapse"></i></a></li>
        <li><ul class="legal-menu nav nav-list collapse">
            <li ><a href="privacy-policy.html"><span class="fa fa-caret-right"></span> 店员销售表</a></li>
            <li ><a href="terms-and-conditions.html"><span class="fa fa-caret-right"></span> 商品销售总表</a></li>
               <li ><a href="terms-and-conditions.html"><span class="fa fa-caret-right"></span> 进货信息总表</a></li>
             <li ><a href="terms-and-conditions.html"><span class="fa fa-caret-right"></span> 商品剩余总表</a></li>
    </ul></li>

        <li><a href="help.html" class="nav-header"><i class="fa fa-fw fa-question-circle"></i> 帮助</a></li>
            
            </ul>
    </div>

@yield('content')
<!-- ========== -->

      <footer>
                <hr>

                <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
              
                <p>© <?php echo date('Y',time()); ?> <a href="#" target="_blank">{{$title}}</a></p>
            </footer>
        </div>
    </div>


    <script src="{{asset('public/lib/bootstrap/js/bootstrap.js')}}"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  
</body>
</html>

