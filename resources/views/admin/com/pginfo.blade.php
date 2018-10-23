<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>网络后台管理</title>
  <!-- Js and Css Files -->
@include('admin.com.comhead')
@yield('extcss')   <!-- extcss -->
</head>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('admin.com.main_header')
@include('admin.com.pagesidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <section class="content-header">
      <h1>
        @yield('pgtitle')
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 系统信息</a></li>
        <li class="active">  @yield('pgtitle')</li>
      </ol>
    </section>
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
@include('admin.com.pagefoot')
@yield('extjs')<!-- extjs -->
</body>
</html>


