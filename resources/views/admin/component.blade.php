<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>网络后台管理</title>
  <!-- Js and Css Files -->
  <link rel="stylesheet" type="text/css" href="/themes/admin/AdminLTE/plugins/iCheck/minimal/minimal.css">
<link rel="stylesheet" type="text/css" href="/themes/admin/AdminLTE/bower_components/select2/dist/css/select2.min.css">
@include('admin.pagehead')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('admin.main_header')
@include('admin.pagesidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      组件管理
        <small>资质列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 系统信息</a></li>
        <li class="active">组件管理</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
          <div class="form-group">
                <label>组件分类</label>
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option selected="selected" disabled="disabled">全部分类</option>
                  <option>企业资讯</option>
                  <option>行业资讯</option>
                </select>
              </div>
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">组件列表</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>组件名称</th>
                  <th>组件标识</th>
                  <th>目录</th>
                  <th>状态</th>
                  <th>操作</th>
                  <th><span class="ta-c dis-bk"><input type="checkbox"></th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>带名称输入框</td>
                  <td>input_bk_n</td>
                  <td><span class="wk_brk">/root/</span></td>
                  <td><span class="badge bg-green">已安装</span><span class="badge bg-yellow">使用中</span></td>
                  <td><a href="{{url('admin/honor_edit')}}">编辑</a><span class="line-light">-</span><a>卸载</a></td>
                  <td>
                    <span class="ta-c dis-bk">
                      <input type="checkbox">
                     </span> 
                  </td>
                </tr>
                 <tr>
                  <td>2.</td>
                  <td>HTML5编辑器</td>
                  <td>edit_tinymce</td>
                  <td><span class="wk_brk">/root/themes/admin/js/plugin/tinymce/</span></td>
                  <td><span class="badge bg-green">已安装</span><span class="badge bg-yellow">使用中</span></td>
                  <td><a href="{{url('admin/honor_edit')}}">编辑</a><span class="line-light">-</span><a>卸载</a></td>
                  <td>
                    <span class="ta-c dis-bk">
                      <input type="checkbox">
                     </span> 
                  </td>
                </tr>
                  <tr>
                  <td>3.</td>
                  <td>响应式文件管理器</td>
                  <td>file_resmana</td>
                  <td><span class="wk_brk">/root/themes/admin/js/plugin/tinymce/js/tinymce/plugins/responsivefilemanager</span></td>
                  <td><span class="badge bg-green">未安装</span><span class="badge bg-yellow">未使用</span></td>
                  <td><a href="{{url('admin/honor_edit')}}">编辑</a><span class="line-light">-</span><a>安装</a></td>
                  <td>
                    <span class="ta-c dis-bk">
                      <input type="checkbox">
                     </span> 
                  </td>
                </tr>
              </tbody></table>

            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
         
               <div class="btn-group">
                  <a class="btn btn-success" href="{{url('admin/honor_edit')}}">添加组件</a>
                </div>

              <div class="btn-group">
                  <button type="button" class="btn btn-default">操作</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><i class="glyphicon glyphicon-pushpin"></i>标注</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-pushpin"></i>安装</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="glyphicon glyphicon-trash"></i> 卸载</a></li>
                  </ul>
                </div>
               <div class="btn-group pull-right"> 
                <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">«</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">»</a></li>
                </ul>
            </div>

      </div>
     
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('admin.pagefoot')
<!-- checkbox style pulugins -->
<script src="/themes/admin/AdminLTE/plugins/iCheck/icheck.js"></script>
<script src="/themes/admin/AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>

<script>
$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_minimal',
    radioClass: 'iradio_minimal',
    increaseArea: '20%' // optional
  });
   //Initialize Select2 Elements
    $('.select2').select2();

});
</script>
</body>
</html>


