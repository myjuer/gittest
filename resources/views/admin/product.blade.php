@extends('admin.com.pginfo')
@section('extcss')
<link rel="stylesheet" type="text/css" href="{{AD_STYLE}}AdminLTE/plugins/iCheck/minimal/minimal.css">
<link rel="stylesheet" type="text/css" href="{{AD_STYLE}}AdminLTE/bower_components/select2/dist/css/select2.min.css">
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
              	<form method="post" action="{{url('admin/product/search')}}">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="keyword" value="{{$kwd}}" class="form-control pull-right" placeholder="Search">
                  <input type="text" name="_token" value="{{csrf_token()}}" style="display: none;">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                  </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>图片</th>
                  <th>产品名称</th>
                  <th style="width: 60px">排序</th>
                  <th>产品分类</th>
                  <th style="width: 80px">标注</th>
                  <th style="width: 120px">操作</th>
                  <th style="width: 40px"><span class="ta-c dis-bk makeselect"><input type="checkbox" class="checkbox-toggle"></th>
                </tr>
                @foreach($list as $k1=>$one)
                <tr>
                   <td>{{$k1+1}}.</td>
                  <td><img src="@if (is_array(json_decode($one->img))) {{json_decode($one->img)[0]}} @else {{AD_STYLE}}img/up-default.jpg @endif" class="" alt="User Image" width="50" height="50"></td>
                  <td>{{$one->title}}</td>
                   <td>{{$one->sort}}</td>
                  <td>{{$one->category}}</td>
                  <td class="changestatus">
                  	<span class="btn badge bg-green @if ($one->istop!=1) hide @endif" data-status="1" data-id="{{$one->id}}">置顶</span>
                   <span class="btn badge bg-red @if ($one->istop==1) hide @endif" data-status="2" data-id="{{$one->id}}">不置顶</span>
                  </td>
                  <td><a href="{{url('admin/product_edit/update/'.$one->id)}}">编辑</a><span class="line-light">-</span><a href="#" data-toggle="modal" data-target="#modal-default" data-action="deletethis">删除</a></td>
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
                    <li><a href="#" data-toggle="modal" data-target="#modal-default"><i class="glyphicon glyphicon-trash"></i> 删除</a></li>
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
<script src="{{AD_STYLE}}AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>

<script>
$(document).ready(function(){
	 $().deleteData({
  	'pg':"{{url('admin/product/delete')}}",
  	'csrf_token':"{{csrf_token()}}",
  });
   //Initialize Select2 Elements
    $('.select2').select2();
  $('.changestatus').changestatus({
  	token:'{{csrf_token()}}',
  	url:'{{url("admin/product/ajax/ajax_changestatus")}}'
  })

 
 

});
</script>
@endsection


