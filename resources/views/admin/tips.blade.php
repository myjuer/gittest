@extends('admin.com.pginfo')
@section('pgtitle','操作提示')   <!-- 设置页面标题 -->
@section('content')

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
           @if ($list->msg=='ok')
                <div class="alert alert-success alert-dismissible">
                  <h4><i class="icon fa fa-check"></i> 操作成功！</h4>
                  <a href="{{$list->url}}">如果页面没有自动跳转，请点击这里！ <span class="showsecond"></span></a>
                </div>
            @elseif ($list->msg=='failed')
                <div class="alert alert-warning alert-dismissible">
                <h4><i class="icon fa fa-warning"></i> 操作失败！</h4>
                <a href="{{$list->url}}">如果页面没有自动跳转，请点击这里！ <span class="showsecond"></span></a>
              </div>
             @elseif ($list->msg=='other')
                 <div class="alert alert-danger alert-dismissible">
                <h4><i class="icon fa fa-ban"></i> {{$list->text}}</h4>
                <a href="{{$list->url}}">如果页面没有自动跳转，请点击这里！ <span class="showsecond"></span></a>
              </div>
             @endif 

            </div>
            <!-- /.box-body -->
          </div>
    </section>

    <!-- /.content -->
@endsection
@section('extjs')
 <script type="text/javascript">
  var i = 6;
  setInterval(function(){
    i--;
    $('.showsecond').html(i+'秒后跳转');
    if(i<2){
    window.location.href="{{$list->url}}";
   }
  },1000) 
</script> 
@endsection



