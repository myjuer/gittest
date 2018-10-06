@extends('admin.com.pginfo')
@section('extcss')
<link rel="stylesheet" type="text/css" href="{{AD_STYLE}}AdminLTE/plugins/iCheck/minimal/minimal.css">
@endsection
@section('pgtitle','账号管理')   <!-- 设置页面标题 -->
@section('content')
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">后台账号列表</h3>
              <div class="box-tools">
              	<form method="post" action="{{url('admin/user/search')}}">
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
                <tbody>
                  <thead>
                  <th style="width: 10px">#</th>
                  <th>账号</th>
                  <th>状态</th>
                  <th style="width: 120px"><span class="ta-c dis-bk">操作</span></th>
                  <th style="width: 40px"><span class="ta-c dis-bk makeselect"><input type="checkbox" class="checkbox-toggle"></th>
                </thead>
                @foreach($list as $k1=>$one)
                <tr>
                  <td>{{$k1+1}}.</td>
                  <td>{{$one->username}}</td>
                  <td>
                  	<a class="changestatus">
                  	<span class="btn badge bg-green @if ($one->status!=1) hide @endif" data-status="1" data-id="{{$one->id}}">正常</span>
                   <span class="btn badge bg-red @if ($one->status==1) hide @endif" data-status="2" data-id="{{$one->id}}">禁止</span>
                  </a>
                  </td>
                  <td><span class="ta-c dis-bk"><a href="{{url('admin/user_edit/'.$one->id.'/update')}}">编辑</a><span class="line-light">-</span><a href="#" data-toggle="modal" data-target="#modal-default">删除</a></span></td>
                  <td>
                    <span class="ta-c dis-bk makeselect selitems">
                      <input name="users[]" type="checkbox" value="{{$one->id}}">
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
                  <a class="btn btn-success" href="{{url('admin/honor_edit')}}">添加用户</a>
                </div>

              <div class="btn-group">
                  <button type="button" class="btn btn-default">批量操作</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><i class="glyphicon glyphicon-pushpin"></i>标注</a></li>
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
<script src="{{AD_STYLE}}AdminLTE/plugins/iCheck/icheck.js"></script>
<script>
$(document).ready(function(){
  $('.changestatus').changestatus({
  	token:'{{csrf_token()}}',
  	url:'{{AI_ROOT}}/public/admin/user/ajax/ajax_changestatus'
  })
  $('button[data-action="delete"]').click(function(){
  	if($('.selitems input[type="checkbox"]:checked').length>0){
  			 var form = $('<form action=\"{{url("admin/user/delete")}}\"></form>');
			  form.attr('class','hide');
			  form.attr('method','post');
			  $('.selitems input[type="checkbox"]:checked').each(function(i,j){
			  		form.append($(this));
			  })
			  form.append('<input type="text" name="_token" value="{{csrf_token()}}">');
			$('body').append(form);
			form.submit();
  	}else{
  		//alert();
  	}
  })
 
});
</script>
@endsection


