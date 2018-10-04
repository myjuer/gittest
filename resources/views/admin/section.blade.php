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
        栏目管理
        <small>栏目列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 栏目信息</a></li>
        <li class="active">栏目管理</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">栏目列表</h3>
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
                  <th style="width: 50px">#</th>
                  <th>栏目名称</th>
                  <th>栏目标识</th>
                  <th>排序</th>
                  <th>操作</th>
                  <th><span class="ta-c dis-bk"><input type="checkbox"></th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td><input type="text" name="" value="解决方案" class="form-control col-sm-1"></td>
                  <td><input type="text" name="" value="solve" class="form-control col-sm-1"></td>
                  <td><input type="text" name="" value="1" class="form-control col-sm-1"></td>
                  <td><a href="{{url('admin/section_edit')}}">编辑</a><span class="line-light">-</span><a>删除</a></td>
                  <td>
                    <span class="ta-c dis-bk">
                      <input type="checkbox">
                     </span> 
                  </td>
                </tr>
                 <tr>
                  <td> ┕ 1.1</td>
                  <td><input type="text" name="" value="配电箱" class="form-control col-sm-1"></td>
                  <td><input type="text" name="" value="solve1" class="form-control col-sm-1"></td>
                  <td><input type="text" name="" value="2" class="form-control col-sm-1"></td>
                  <td><a href="{{url('admin/section_edit')}}">编辑</a><span class="line-light">-</span><a>删除</a></td>
                  <td>
                    <span class="ta-c dis-bk">
                      <input type="checkbox">
                     </span> 
                  </td>
                </tr>
                 <tr>
                  <td> ┕ 1.2</td>
                  <td><input type="text" name="" value="家庭" class="form-control col-sm-1"></td>
                  <td><input type="text" name="" value="solve2" class="form-control col-sm-1"></td>
                  <td><input type="text" name="" value="3" class="form-control col-sm-1"></td>
                  <td><a href="{{url('admin/section_edit')}}">编辑</a><span class="line-light">-</span><a>删除</a></td>
                  <td>
                    <span class="ta-c dis-bk">
                      <input type="checkbox">
                     </span> 
                  </td>
                </tr>
               <tr>
                  <td>2.</td>
                  <td><input type="text" name="" value="工程案例" class="form-control col-sm-1"></td>
                  <td><input type="text" name="" value="getcase" class="form-control col-sm-1"></td>
                  <td><input type="text" name="" value="2" class="form-control col-sm-1"></td>
                  <td><a href="{{url('admin/section_edit')}}"">编辑</a><span class="line-light">-</span><a>删除</a></td>
                  <td>
                    <span class="ta-c dis-bk">
                      <input type="checkbox">
                     </span> 
                  </td>
                </tr>
              </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="btn-group">
                  <a class="btn btn-success" href="{{url('admin/section_edit')}}">添加栏目</a>
                </div>
             <div class="btn-group">
                  <button type="button" class="btn btn-default">操作</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><i class="glyphicon glyphicon-pushpin"></i>标注</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-transfer"></i>移动到</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="glyphicon glyphicon-trash"></i> 删除</a></li>
                  </ul>
                </div>
                
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


