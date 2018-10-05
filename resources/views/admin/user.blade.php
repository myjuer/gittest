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
                <tbody>
                  <thead>
                  <th style="width: 10px">#</th>
                  <th>账号</th>
                  <th>状态</th>
                  <th style="width: 120px"><span class="ta-c dis-bk">操作</span></th>
                  <th style="width: 40px"><span class="ta-c dis-bk"><input type="checkbox"></th>
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
                  <td><span class="ta-c dis-bk"><a href="user_edit/{{$one->id}}/update">编辑</a><span class="line-light">-</span><a>删除</a></span></td>
                  <td>
                    <span class="ta-c dis-bk">
                      <input type="checkbox">
                     </span> 
                  </td>
                </tr>
                @endforeach
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
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
<script>
$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_minimal',
    radioClass: 'iradio_minimal',
    increaseArea: '20%' // optional
  });
  $('.changestatus').changestatus({
  	token:'{{csrf_token()}}',
  	url:'{{AI_ROOT}}/public/admin/user/ajax/ajax_changestatus'
  })
/* $().ajaxChangeData({
 	url:'{{AI_ROOT}}/public/admin/user/ajax/ajax_changestatus',
 	data:{x:'123',_token:'{{csrf_token()}}'}
 })*/
});

</script>
@endsection


