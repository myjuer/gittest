@extends('admin.com.pginfo')
@section('extcss')
<link rel="stylesheet" type="text/css" href="{{AD_STYLE}}AdminLTE/plugins/iCheck/minimal/minimal.css">
@endsection
@section('pgtitle','产品管理')   <!-- 设置页面标题 -->
@section('content')

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
          <div class="form-group">
                <label>产品分类</label>
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option selected="selected" disabled="disabled">全部分类</option>
                  <option>小型断路器</option>
                  <option>漏电断路器</option>
                  <option>过欠压保护器</option>
                  <option>墙壁开关</option>
                  <option>防水插头</option>
                </select>
              </div>
          
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">产品列表</h3>
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
                  <th>产品名称</th>
                  <th style="width: 20px">排序</th>
                  <th>产品分类</th>
                  <th>标注</th>
                  <th style="width: 120px">操作</th>
                  <th style="width: 40px"><span class="ta-c dis-bk makeselect"><input type="checkbox" class="checkbox-toggle"></th>
                </tr>
                @foreach($list as $k1=>$one)
                <tr>
                   <td>{{$k1+1}}.</td>
                  <td><img src="AdminLTE/dist/img/user2-160x160.jpg" class="img-circle default-tb-pic" alt="User Image" width="100" height="100"></td>
                  <td>{{$one->title}}</td>
                   <td>{{$one->sort}}</td>
                  <td>{{$one->category}}</td>
                  <td class="changestatus">
                  	<span class="btn badge bg-green @if ($one->istop!=1) hide @endif" data-status="1" data-id="{{$one->id}}">置顶</span>
                   <span class="btn badge bg-red @if ($one->istop==1) hide @endif" data-status="2" data-id="{{$one->id}}">不置顶</span>
                   <span class="btn badge bg-yellow @if ($one->isnew!=1) hide @endif" data-status="1" data-id="{{$one->id}}">新品</span>
                   <span class="btn badge bg-red @if ($one->isnew==1) hide @endif" data-status="2" data-id="{{$one->id}}">非新品</span>
                  </td>
                  <td><a href="{{url('admin/product_edit')}}">编辑</a><span class="line-light">-</span><a>删除</a></td>
                  <td>
                   <span class="ta-c dis-bk makeselect selitems">
                      <input name="ids[]" type="checkbox" value="{{$one->id}}">
                     </span>
                  </td>
                </tr>
                @endforeach
              </tbody></table>
   			<div class="modal modal-default fade" id="modal-default" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">确认删除？</h4>
              </div>
              <div class="modal-body">
                <p>删除用户后不可恢复，确定删除请点击确认！</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary"  data-dismiss="modal" data-action="delete">确认</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
            </div>

           
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="btn-group">
                  <a class="btn btn-success" href="{{url('admin/product_edit/add')}}">添加产品</a>
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
            	<ul class="pagination-sm no-margin pull-right">
            		@if ($paginate) {{$list->links('vendor.pagination.default')}} @endif
            	</ul>
            </div>
      </div>
     
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
@section('extjs')
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
@endsection


