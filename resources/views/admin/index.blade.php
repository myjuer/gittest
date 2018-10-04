<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>网络后台管理</title>
  <!-- Js and Css Files -->
@include('admin.com.pagehead')

</head>
@include('admin.com.main_header')
@include('admin.com.pagesidebar')

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        首页
        <small>基本信息</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 系统信息</a></li>
        <li class="active">系统首页</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><font id="WOW_TRANSLATE_121" class="WOW_TRANSLATE_STYLE" data--w-o-w_-i-n-d-e-x="121">操作系统</font></span>
              <span class="info-box-number"><font id="WOW_TRANSLATE_122" class="WOW_TRANSLATE_STYLE" data--w-o-w_-i-n-d-e-x="122">linux</font></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><font id="WOW_TRANSLATE_123" class="WOW_TRANSLATE_STYLE" data--w-o-w_-i-n-d-e-x="123">PHP版本</font></span>
              <span class="info-box-number"><font id="WOW_TRANSLATE_124" class="WOW_TRANSLATE_STYLE" data--w-o-w_-i-n-d-e-x="124">5.4</font></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><font id="WOW_TRANSLATE_125" class="WOW_TRANSLATE_STYLE" data--w-o-w_-i-n-d-e-x="125">数据库</font></span>
              <span class="info-box-number"><font id="WOW_TRANSLATE_126" class="WOW_TRANSLATE_STYLE" data--w-o-w_-i-n-d-e-x="126">MYSQL</font></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><font id="WOW_TRANSLATE_127" class="WOW_TRANSLATE_STYLE" data--w-o-w_-i-n-d-e-x="127">网站运行时间</font></span>
              <span class="info-box-number"><font id="WOW_TRANSLATE_128" class="WOW_TRANSLATE_STYLE" data--w-o-w_-i-n-d-e-x="128">5年6月6天</font></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>218</h3>

              <p>商品数量</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>55</h3>

              <p>留言数量</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>1</h3>

              <p>管理员数量</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>120</h3>

              <p>网站日志</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
@include('admin.com.pagefoot')
</body>
</html>


