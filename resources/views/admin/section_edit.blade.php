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
          <small>栏目编辑</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> 系统信息</a></li>
          <li class="active">栏目管理</li>
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
                <label for="inputtitle">栏目名称</label>
                <input type="text" class="form-control" id="inputtitle" placeholder="解决方案">
              </div>
              <div class="form-group">
                <label for="inputtitle">栏目标识</label>
                <input type="text" class="form-control" id="inputtitle" placeholder="solve">
              </div>
              <div class="form-group">
                <label for="inputtitle">排序</label>
                <input type="text" class="form-control" id="inputtitle" placeholder="1">
              </div>
            </div>
                <div class="box box-solid ">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">布局-组件列表</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box" style="position: relative;">
          
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <ul class="todo-list ui-sortable">
                
                <li>
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="">
                  <span class="text">分类组件</span>
                  <small class="label label-info"><i class="fa fa-clock-o"></i> 组件ID：111</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li class="">
                  <!-- drag handle -->
                  <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <!-- checkbox -->
                  <input type="checkbox" value="">
                  <!-- todo text -->
                  <span class="text">编辑器组件</span>
                  <!-- Emphasis label -->
                  <small class="label label-info"><i class="fa fa-clock-o"></i> 组件ID：222</small>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="">
                  <span class="text">单选框</span>
                  <small class="label label-info"><i class="fa fa-clock-o"></i> 组件ID：333</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="">
                  <span class="text">关联产品组件</span>
                  <small class="label label-info"><i class="fa fa-clock-o"></i> 组件ID：444</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="">
                  <span class="text">关联新闻组件</span>
                  <small class="label label-info"><i class="fa fa-clock-o"></i> 组件ID：555</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="">
                  <span class="text">关联下载组件</span>
                  <small class="label label-info"><i class="fa fa-clock-o"></i> 组件ID：666</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
               <div class="btn-group">
                  <button type="button" class="btn btn-default">操作</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><i class="glyphicon glyphicon-pushpin"></i>预览选中</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-transfer"></i>预览全部</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="glyphicon glyphicon-trash"></i> 删除</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-undo"></i>恢复</a></li>
                  </ul>
                </div>
              <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> 添加更多</button>
            </div>
          </div>
            </div>
            <!-- /.box-body -->
           
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">提交</button>
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
  <script src='/themes/admin/js/plugin/tinymce/js/tinymce/tinymce.min.js'></script>
  <script src='/themes/admin/js/plugin/popup/jquery.magnific-popup.min.js'></script>
  <script>
    $(document).ready(function(){
    tinymce.init({
    selector: "textarea",
    theme: "modern",
    language:'zh_CN',
    link_list: [{
        title: '前台',
        value: '../../'
    }, {
        title: '后台',
        value: 'admin'
    }],
    plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak",
       "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
        "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"],
    relative_urls: false,
    browser_spellcheck: true,
    filemanager_title: "文件管理",
    external_filemanager_path: "http://<?php echo base_url()?>/themes/admin/js/plugin/tinymce/js/tinymce/plugins/responsivefilemanager/filemanager/",
    file_picker_types: 'file image media',
    file_picker_callback: function(cb, value, meta) {
        var width = window.innerWidth - 30;
        var height = window.innerHeight - 60;
        if (width > 1800) width = 1800;
        if (height > 1200) height = 1200;
        if (width > 600) {
            var width_reduce = (width - 20) % 138;
            width = width - width_reduce + 10;
        }
        var urltype = 2;
        if (meta.filetype == 'image') {
            urltype = 1;
        }
        if (meta.filetype == 'media') {
            urltype = 3;
        }
        var title = "RESPONSIVE FileManager";
        if (typeof this.settings.filemanager_title !== "undefined" && this.settings.filemanager_title) {
            title = this.settings.filemanager_title;
        }
        var akey = "key";
        if (typeof this.settings.filemanager_access_key !== "undefined" && this.settings.filemanager_access_key) {
            akey = this.settings.filemanager_access_key;
        }
        var sort_by = "";
        if (typeof this.settings.filemanager_sort_by !== "undefined" && this.settings.filemanager_sort_by) {
            sort_by = "&sort_by=" + this.settings.filemanager_sort_by;
        }
        var descending = "false";
        if (typeof this.settings.filemanager_descending !== "undefined" && this.settings.filemanager_descending) {
            descending = this.settings.filemanager_descending;
        }
        var fldr = "";
        if (typeof this.settings.filemanager_subfolder !== "undefined" && this.settings.filemanager_subfolder) {
            fldr = "&fldr=" + this.settings.filemanager_subfolder;
        }
        var crossdomain = "";
        if (typeof this.settings.filemanager_crossdomain !== "undefined" && this.settings.filemanager_crossdomain) {
            crossdomain = "&crossdomain=1";
            if (window.addEventListener) {
                window.addEventListener('message', filemanager_onMessage, false);
            } else {
                window.attachEvent('onmessage', filemanager_onMessage);
            }
        }
        tinymce.activeEditor.windowManager.open({
            title: title,
            file: this.settings.external_filemanager_path + 'dialog.php?type=' + urltype + '&descending=' + descending + sort_by + fldr + crossdomain + '&lang=' + this.settings.language + '&akey=' + akey,
            width: width,
            height: height,
            resizable: true,
            maximizable: true,
            inline: 1
        }, {
            setUrl: function(url) {
                cb(url);
            }
        });
    },
    external_plugins: {
        "filemanager": "plugins/responsivefilemanager/plugin.min.js?<?php echo time()?>"
    },
    codemirror: {
        indentOnInit: true,
        path: 'CodeMirror'
    },
    image_advtab: true,
     toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | print preview",
    toolbar2: "| responsivefilemanager | image | media | link unlink anchor | code",
});

      $('input').iCheck({
    checkboxClass: 'icheckbox_minimal',
    radioClass: 'iradio_minimal',
    increaseArea: '20%' // optional
  });

      $('.select2').select2();
      $( "#sortable" ).sortable();  //img sort
     $('.test-popup-link').magnificPopup({
      type:'iframe',
    });
    });

  </script>
</body>
</html>


