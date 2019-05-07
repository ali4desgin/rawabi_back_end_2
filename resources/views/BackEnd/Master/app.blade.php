
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>روابي هجر | لوحة التحكم</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{  asset(env("PUBLIC_ASSETS")."BackEnd/css/rtl/bootstrap.min.css")}}" rel="stylesheet">

    <!-- not use this in ltr -->
    <link href="{{  asset(env("PUBLIC_ASSETS")."BackEnd/css/rtl/bootstrap.rtl.css")}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{  asset(env("PUBLIC_ASSETS")."BackEnd/css/plugins/metisMenu/metisMenu.min.css")}}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{  asset(env("PUBLIC_ASSETS")."BackEnd/css/plugins/timeline.css")}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{  asset(env("PUBLIC_ASSETS")."BackEnd/css/rtl/sb-admin-2.css")}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{  asset(env("PUBLIC_ASSETS")."BackEnd/css/plugins/morris.css")}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{  asset(env("PUBLIC_ASSETS")."BackEnd/css/font-awesome/font-awesome.min.css")}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .chat_message {
            width: 600px;
        }
    </style>

    @yield("styles")
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route("admin_dashboard") }}">روابي هجر</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-left">
            {{--<li class="dropdown">--}}
                {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">--}}
                    {{--<i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu dropdown-messages">--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<strong>John Smith</strong>--}}
                                {{--<span class="pull-right text-muted">--}}
                                        {{--<em>Yesterday</em>--}}
                                    {{--</span>--}}
                            {{--</div>--}}
                            {{--<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<strong>John Smith</strong>--}}
                                {{--<span class="pull-right text-muted">--}}
                                        {{--<em>Yesterday</em>--}}
                                    {{--</span>--}}
                            {{--</div>--}}
                            {{--<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<strong>John Smith</strong>--}}
                                {{--<span class="pull-right text-muted">--}}
                                        {{--<em>Yesterday</em>--}}
                                    {{--</span>--}}
                            {{--</div>--}}
                            {{--<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a class="text-center" href="#">--}}
                            {{--<strong>Read All Messages</strong>--}}
                            {{--<i class="fa fa-angle-right"></i>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<!-- /.dropdown-messages -->--}}
            {{--</li>--}}
            {{--<!-- /.dropdown -->--}}
            {{--<li class="dropdown">--}}
                {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">--}}
                    {{--<i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu dropdown-tasks">--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<p>--}}
                                    {{--<strong>Task 1</strong>--}}
                                    {{--<span class="pull-right text-muted">40% Complete</span>--}}
                                {{--</p>--}}
                                {{--<div class="progress progress-striped active">--}}
                                    {{--<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">--}}
                                        {{--<span class="sr-only">40% Complete (success)</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<p>--}}
                                    {{--<strong>Task 2</strong>--}}
                                    {{--<span class="pull-right text-muted">20% Complete</span>--}}
                                {{--</p>--}}
                                {{--<div class="progress progress-striped active">--}}
                                    {{--<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">--}}
                                        {{--<span class="sr-only">20% Complete</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<p>--}}
                                    {{--<strong>Task 3</strong>--}}
                                    {{--<span class="pull-right text-muted">60% Complete</span>--}}
                                {{--</p>--}}
                                {{--<div class="progress progress-striped active">--}}
                                    {{--<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">--}}
                                        {{--<span class="sr-only">60% Complete (warning)</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<p>--}}
                                    {{--<strong>Task 4</strong>--}}
                                    {{--<span class="pull-right text-muted">80% Complete</span>--}}
                                {{--</p>--}}
                                {{--<div class="progress progress-striped active">--}}
                                    {{--<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">--}}
                                        {{--<span class="sr-only">80% Complete (danger)</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a class="text-center" href="#">--}}
                            {{--<strong>See All Tasks</strong>--}}
                            {{--<i class="fa fa-angle-right"></i>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<!-- /.dropdown-tasks -->--}}
            {{--</li>--}}
            {{--<!-- /.dropdown -->--}}
            {{--<li class="dropdown">--}}
                {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">--}}
                    {{--<i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu dropdown-alerts">--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<i class="fa fa-comment fa-fw"></i> New Comment--}}
                                {{--<span class="pull-right text-muted small">4 minutes ago</span>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<i class="fa fa-twitter fa-fw"></i> 3 New Followers--}}
                                {{--<span class="pull-right text-muted small">12 minutes ago</span>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<i class="fa fa-envelope fa-fw"></i> Message Sent--}}
                                {{--<span class="pull-right text-muted small">4 minutes ago</span>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<i class="fa fa-tasks fa-fw"></i> New Task--}}
                                {{--<span class="pull-right text-muted small">4 minutes ago</span>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<i class="fa fa-upload fa-fw"></i> Server Rebooted--}}
                                {{--<span class="pull-right text-muted small">4 minutes ago</span>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a class="text-center" href="#">--}}
                            {{--<strong>See All Alerts</strong>--}}
                            {{--<i class="fa fa-angle-right"></i>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<!-- /.dropdown-alerts -->--}}
            {{--</li>--}}
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">

                    <li><a href="{{ route("admin_settings") }}"><i class="fa fa-gear fa-fw"></i> تعديل بياناتي</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ route("admin_logout") }}"><i class="fa fa-sign-out fa-fw"></i> تسجيل خروج</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    {{--<li class="sidebar-search">--}}
                        {{--<div class="input-group custom-search-form">--}}
                            {{--<input type="text" class="form-control" placeholder="Search...">--}}
                            {{--<span class="input-group-btn">--}}
                                {{--<button class="btn btn-default" type="button">--}}
                                    {{--<i class="fa fa-search"></i>--}}
                                {{--</button>--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--<!-- /input-group -->--}}
                    {{--</li>--}}
                    <li>
                        <a href="{{ route("admin_dashboard") }}"><i class="fa fa-dashboard fa-fw"></i> الرئيسية</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> المستخدمين<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route("admin_users") }}">العملاء</a>
                            </li>
                            <li>
                                <a href="{{ route("admin_users2") }}">الموظفين</a>
                            </li>
                            <li>
                                <a href="{{ route("admin_writings") }}">الموزعين</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{ route("admin_orders") }}"><i class="fa fa-table fa-fw"></i> الطلبات</a>
                    </li>
                    {{--<li>--}}
                        {{--<a href="{{ route("admin_content") }}"><i class="fa fa-gear fa-fw"></i> الاعدادت</a>--}}
                    {{--</li>--}}
                    <li>
                        <a href="{{ route("admin_offers") }}"><i class="fa fa-bars fa-fw"></i> العروض</a>
                    </li>
                    <li>
                        <a href="{{ route("admin_news") }}"><i class="fa fa-newspaper-o fa-fw"></i> الاخبار</a>
                    </li>

                     <li>
                        <a href="{{ route("admin_info") }}"><i class="fa fa-newspaper-o fa-fw"></i> معلومات الأتصال</a>
                    </li>

                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                @yield("content")
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery Version 1.11.0 -->
<script src="{{  asset(env("PUBLIC_ASSETS")."BackEnd/js/jquery-1.11.0.js")}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{  asset(env("PUBLIC_ASSETS")."BackEnd/js/bootstrap.min.js")}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{  asset(env("PUBLIC_ASSETS")."BackEnd/js/metisMenu/metisMenu.min.js")}}"></script>

<!-- Morris Charts JavaScript -->
<script src="{{  asset(env("PUBLIC_ASSETS")."BackEnd/js/raphael/raphael.min.js")}}"></script>
<script src="{{  asset(env("PUBLIC_ASSETS")."BackEnd/js/morris/morris.min.js")}}"></script>


<script src="{{  asset(env("PUBLIC_ASSETS")."BackEnd/js/ckeditor/ckeditor.js")}}"></script>

<script type="text/javascript">
         CKEDITOR.replace( 'messageArea',
         {
          customConfig : 'config.js',
          toolbar : 'simple'
          })
</script> 

<!-- Custom Theme JavaScript -->
<script src="{{  asset(env("PUBLIC_ASSETS")."BackEnd/js/sb-admin-2.js")}}"></script>
@yield("scripts")
<script>
    $(".confirm").click(function () {
        return confirm("هل انت متأكد من هذا الاجراء ؟ ");
    });


    $("#file_uploader_btn").click(function ( ) {
        $("#file_uploader").click();
    });


    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var viewer = $('#imagesViewer');
                viewer.attr('src', e.target.result);
                viewer.slideDown();
                $("#messageTxtArea").fadeOut();
                $("#isImage").val("yes");

            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#file_uploader").change(function() {
        readURL(this);
    });


</script>
</body>

</html>
