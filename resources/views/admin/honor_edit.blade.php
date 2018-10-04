<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>网络后台管理</title>
  <!-- Js and Css Files -->
  <link rel="stylesheet" type="text/css" href="/themes/admin/AdminLTE/plugins/iCheck/minimal/minimal.css">
  <link rel="stylesheet" type="text/css" href="/themes/admin/AdminLTE/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" type="text/css" href="/themes/admin/js/plugin/popup/magnific-popup.css">
  <link rel="stylesheet" type="text/css" href="/themes/admin/js/plugin/layui-v2.3.0/layui/css/layui.css">
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
          资质管理
          <small>资质编辑</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> 系统信息</a></li>
          <li class="active">资质管理</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">信息编辑</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form">
            <div class="box-body">
              <div class="form-group">
                <label for="inputtitle">资质标题</label>
                <input type="text" class="form-control" id="inputtitle" placeholder="输入资质名称">
              </div>
              <div class="form-group">
                <label>资质分类</label>
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option selected="selected" disabled="disabled">全部分类</option>
                  <option>企业资讯</option>
                  <option>行业资讯</option>
                </select>
              </div>
              <div class="form-group">
                <label>资质图片</label>
                <div class="clearfix row" id="sortable">
                  <div 4iv class="connectedSortable col-lg-1 col-sm-2 col-xs-4">
                    <label class="dis-bk">
                    <a class="test-popup-link" data-url="/themes/admin/js/plugin/tinymce/js/tinymce/plugins/responsivefilemanager/filemanager/dialog.php?type=4&editor=mce_0&field_id=fieldID1">
                      <img class="img-thumbnail dis-bk-full" style="cursor: move;" src="/themes/admin/img/up-default.jpg">
                    </a>
                     <input type="text" id="fieldID" hidden>
                     </label>
                     <input class="form-control input-sm" type="text" placeholder="图片描述">
                  </div>
                   <div 4iv class="connectedSortable col-lg-1 col-sm-2 col-xs-4">
                    <label class="dis-bk">
                    <a class="test-popup-link" data-url="/themes/admin/js/plugin/tinymce/js/tinymce/plugins/responsivefilemanager/filemanager/dialog.php?type=0&editor=mce_0&field_id=fieldID1">
                      <img class="img-thumbnail dis-bk-full" style="cursor: move;" src="/themes/admin/img/up-default.jpg">
                    </a>
                     <input type="text" id="fieldID" hidden>
                     </label>
                     <input class="form-control input-sm" type="text" placeholder="图片描述">
                  </div>
                   <div 4iv class="connectedSortable col-lg-1 col-sm-2 col-xs-4">
                    <label class="dis-bk">
                    <a class="test-popup-link" data-url="/themes/admin/js/plugin/tinymce/js/tinymce/plugins/responsivefilemanager/filemanager/dialog.php?type=0&editor=mce_0&field_id=fieldID1">
                      <img class="img-thumbnail dis-bk-full" style="cursor: move;" src="/themes/admin/img/up-default.jpg">
                    </a>
                     <input type="text" id="fieldID" hidden>
                     </label>
                     <input class="form-control input-sm" type="text" placeholder="图片描述">
                  </div>
                   <div 4iv class="connectedSortable col-lg-1 col-sm-2 col-xs-4">
                    <label class="dis-bk">
                    <a class="test-popup-link" data-url="/themes/admin/js/plugin/tinymce/js/tinymce/plugins/responsivefilemanager/filemanager/dialog.php?type=0&editor=mce_0&field_id=fieldID1">
                      <img class="img-thumbnail dis-bk-full" style="cursor: move;" src="/themes/admin/img/up-default.jpg">
                    </a>
                     <input type="text" id="fieldID" hidden>
                     </label>
                     <input class="form-control input-sm" type="text" placeholder="图片描述">
                  </div>
                   <div 4iv class="connectedSortable col-lg-1 col-sm-2 col-xs-4">
                    <label class="dis-bk">
                    <a class="test-popup-link" data-url="/themes/admin/js/plugin/tinymce/js/tinymce/plugins/responsivefilemanager/filemanager/dialog.php?type=0&editor=mce_0&field_id=fieldID1">
                      <img class="img-thumbnail dis-bk-full" style="cursor: move;" src="/themes/admin/img/up-default.jpg">
                    </a>
                     <input type="text" id="fieldID" hidden>
                     </label>
                     <input class="form-control input-sm" type="text" placeholder="图片描述">
                  </div>
                </div>
              </div>

             <div class="checkbox">
              <input type="checkbox"> <span style="vertical-align: middle;">首页推荐</span>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
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
  <script src='/themes/admin/js/plugin/popup/jquery.magnific-popup.min.js'></script>
  <script type="text/javascript" src="/themes/admin/js/plugin/layui-v2.3.0/layui/layui.js"></script>
  <script>
    $(document).ready(function(){

      $('input').iCheck({
    checkboxClass: 'icheckbox_minimal',
    radioClass: 'iradio_minimal',
    increaseArea: '20%' // optional
  });

      $('.select2').select2();
      $( "#sortable" ).sortable();  //img sort
    //  $('.test-popup-link').magnificPopup({
    //   type:'iframe',
    // });
    // 

    });

  </script>
  <script type="text/javascript">
  $('.test-popup-link').on('click',function(){
    var that = this;
     layui.use(['layer', 'form'], function(){
     var layer = layui.layer
      layer.open({
       type: 2, 
     content: $(that).attr('data-url'),
      area:['80%','80%'],
      title:'文件管理',
     maxmin:true,
      });
    })
    })</script>
</body>
</html>


