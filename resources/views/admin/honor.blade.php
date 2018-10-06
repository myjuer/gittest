@extends('admin.com.pginfo')
@section('extcss')
  <link rel="stylesheet" type="text/css" href="{{AD_STYLE}}AdminLTE/plugins/iCheck/minimal/minimal.css">
<link rel="stylesheet" type="text/css" href="{{AD_STYLE}}AdminLTE/bower_components/select2/dist/css/select2.min.css">
@endsection
@section('pgtitle','账号管理')   <!-- 设置页面标题 -->
@section('content')
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
          <div class="form-group">
                <label>资质分类</label>
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option selected="selected" disabled="disabled">全部分类</option>
                  <option>企业资讯</option>
                  <option>行业资讯</option>
                </select>
              </div>
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">资质列表</h3>
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
                  <th>图片</th>
                  <th>资质名称</th>
                  <th>资质分类</th>
                  <th>标注</th>
                  <th>操作</th>
                  <th><span class="ta-c dis-bk"><input type="checkbox"></th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td><img src="http://127.0.0.1/themes/admin/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle default-tb-pic" alt="User Image" width="100" height="100"></td>
                  <td>DZ47-63小型断路器</td>
                  <td>小型/微型断路器</td>
                  <td><span class="badge bg-green">首页推荐</span><span class="badge bg-yellow">新品</span></td>
                  <td><a href="{{url('admin/honor_edit')}}">编辑</a><span class="line-light">-</span><a>删除</a></td>
                  <td>
                    <span class="ta-c dis-bk">
                      <input type="checkbox">
                     </span> 
                  </td>
                </tr>
                 <tr>
                  <td>2.</td>
                  <td><img src="http://127.0.0.1/themes/admin/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle default-tb-pic" alt="User Image" width="60" height="60"></td>
                  <td>DZ47-63小型断路器</td>
                  <td>小型/微型断路器</td>
                  <td><span class="badge bg-green">首页推荐</span><span class="badge bg-yellow">新品</span></td>
                  <td><a href="{{url('admin/honor_edit')}}">编辑</a><span class="line-light">-</span><a>删除</a></td>
                  <td>
                    <span class="ta-c dis-bk">
                      <input type="checkbox">
                     </span> 
                  </td>
                </tr>
                  <tr>
                  <td>3.</td>
                  <td><img src="http://127.0.0.1/themes/admin/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle default-tb-pic" alt="User Image" width="60" height="60"></td>
                  <td>DZ47-63小型断路器</td>
                  <td>小型/微型断路器</td>
                  <td><span class="badge bg-green">首页推荐</span><span class="badge bg-yellow">新品</span></td>
                  <td><a href="{{url('admin/honor_edit')}}">编辑</a><span class="line-light">-</span><a>删除</a></td>
                  <td>
                    <span class="ta-c dis-bk">
                      <input type="checkbox">
                     </span> 
                  </td>
                </tr>
                  <tr>
                  <td>4.</td>
                  <td><img src="http://127.0.0.1/themes/admin/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle default-tb-pic" alt="User Image" width="60" height="60"></td>
                  <td>DZ47-63小型断路器</td>
                  <td>小型/微型断路器</td>
                  <td><span class="badge bg-green">首页推荐</span><span class="badge bg-yellow">新品</span></td>
                  <td><a href="{{url('admin/honor_edit')}}">编辑</a><span class="line-light">-</span><a>删除</a></td>
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
                  <a class="btn btn-success" href="{{url('admin/honor_edit')}}">添加产品</a>
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
@endsection
@section('extjs')
<!-- checkbox style pulugins -->
<script src="{{AD_STYLE}}AdminLTE/plugins/iCheck/icheck.js"></script>
<script src="{{AD_STYLE}}AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>

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
@endsection

