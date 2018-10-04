<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>网络后台管理</title>
  <!-- Js and Css Files -->
<?php @include('pagehead.php');?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php @include('main_header.php');?>


<?php @include('pagesidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        账号列表
        <small>账号管理</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 系统信息</a></li>
        <li class="active">账号管理</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-bullhorn"></i>

              <h3 class="box-title">提示</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="alert alert-danger alert-dismissible">
                <h4><i class="icon fa fa-ban"></i> 请不要删除最后一个账号，否则系统将无法登录！</h4>
                <a href="<?php echo site_url('admin/user_edit')?>">如果页面没有自动跳转，请点击这里！</a>
              </div>
              <div class="alert alert-warning alert-dismissible">
                <h4><i class="icon fa fa-warning"></i> 操作失败！</h4>
                <a href="<?php echo site_url('admin/user_edit')?>">如果页面没有自动跳转，请点击这里！</a>
              </div>
              <div class="alert alert-success alert-dismissible">
                <h4><i class="icon fa fa-check"></i> 操作成功！</h4>
                <a href="<?php echo site_url('admin/user_edit')?>">如果页面没有自动跳转，请点击这里！</a>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php @include('pagefoot.php');?>

</body>
</html>


