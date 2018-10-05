@extends('admin.com.pginfo')
@section('extcss')
@endsection
@section('pgtitle','账号管理')   <!-- 设置页面标题 -->
@section('content')

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

      <div class="col-sm-12 col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">账号编辑</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="checksubmit" action="" method="post">
              <div class="box-body">
                <div class="form-group @if ($errors->first('username')) has-error @endif">
                  <label for="inputEmail3" class="col-sm-2 control-label">账号名称</label>
                  <div class="col-sm-10">
                    <input type="text" name="username" value="@if(old('username')!=''){{old('username')}}@else{{$list->username}}@endif" class="form-control"  placeholder="用户名">
                     @if ($errors->first('username'))
                     <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$errors->first('username')}}</label>
					@endif
                  </div>

                </div>
               <div class="form-group">
               <label for="inputEmail3" class="col-sm-2 control-label">角色</label>
               <div class="col-sm-10">
               	 	<select class="form-control" name="role">
	               		<option value="1" @if ($list->role==1) selected @endif>高级管理员</option>
	               		<option value="2" @if ($list->role==2) selected @endif>系统使用者</option>
               		</select>
               </div>
               </div>
                <div class="form-group">
               <label for="inputEmail3" class="col-sm-2 control-label">状态</label>
               <div class="col-sm-10">
               	 	<select class="form-control" name="status">
	               		<option value="1" @if ($list->status==1) selected @endif>正常</option>
	               		<option value="2" @if ($list->status==2) selected @endif>禁用</option>
               		</select>
               </div>
               </div>
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">旧密码</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" value="{{$list->password}}" disabled class="form-control"  placeholder="旧密码">
                  </div>
                </div>
              <div class="form-group @if ($errors->first('newpassword1')) has-error @endif">
                  <label for="inputEmail3" class="col-sm-2 control-label">新密码</label>
                  <div class="col-sm-10 check-pwd">
                  	<input type="password" name="newpassword" value="{{ old('newpassword') }}" class="form-control"  placeholder="新密码" onkeyup="checkpwdconfirm()">
                  	 @if ($errors->first('newpassword'))
                     <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$errors->first('newpassword')}}</label>
					@endif
                  </div>
                </div>
             <div class="form-group @if ($errors->first('newpassword2')) has-error @endif">
                  <label for="inputEmail3" class="col-sm-2 control-label">确认新密码</label>
                  <div class="col-sm-10 check-pwd-confirm">
                  	<div class="input-group"><input type="password" class="form-control"  placeholder="确认新密码" onkeyup="checkpwdconfirm()">
                    <span class="input-group-addon"><i class="fa msg"></i></span></div>
                     @if ($errors->first('newpassword2'))
                     <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$errors->first('newpassword2')}}</label>
					@endif
                  </div>
                  <input type="text" name="_token" style="display: none;visibility: hidden;opacity: 0;" value="{{csrf_token()}}">
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="pull-right">
                <a class="btn btn-default" href="{{url('admin/user')}}">取消</a>
                <button type="submit" class="btn btn-info">确认修改</button>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection

@section('extjs')
 <script type="text/javascript">
	function checkpwdconfirm(){
		$().checkpwdconfirm();
	}
$('#checksubmit').submit(function(){
	if($().checkpwdconfirm()){
		return true;
	}else{
		return false;
	}
})	
</script> 
@endsection

