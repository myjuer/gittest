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
          新闻管理
          <small>新闻编辑</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> 系统信息</a></li>
          <li class="active">新闻管理</li>
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
                <label for="inputtitle">新闻标题</label>
                <input type="text" class="form-control" id="inputtitle" placeholder="输入新闻名称">
              </div>
              <div class="form-group">
                <label>新闻分类</label>
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option selected="selected" disabled="disabled">全部分类</option>
                  <option>企业资讯</option>
                  <option>行业资讯</option>
                </select>
              </div>
              <div class="form-group">
                <label>新闻图片</label>
                <div class="clearfix row" id="sortable">
                  <div 4iv class="connectedSortable col-lg-1 col-sm-2 col-xs-4">
                    <label class="dis-bk">
                    <a class="test-popup-link" href="/themes/admin/js/plugin/tinymce/js/tinymce/plugins/responsivefilemanager/filemanager/dialog.php?type=0&editor=mce_0&field_id=fieldID1">
                      <img class="img-thumbnail dis-bk-full" style="cursor: move;" src="/themes/admin/img/up-default.jpg">
                    </a>
                     <input type="text" id="fieldID" hidden>
                     </label>
                     <input class="form-control input-sm" type="text" placeholder="图片描述">
                  </div>

                </div>
              </div>

              <div class="formgroup">
               <label>新闻详情</label>
               <textarea id="editor1" name="editor1" rows="10" cols="80" placeholder="输入新闻详情">
               </textarea>
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
  <script src='/themes/admin/js/plugin/tinymce/js/tinymce/tinymce.min.js'></script>
  <script src='/themes/admin/js/plugin/popup/jquery.magnific-popup.min.js'></script>
  <script>
    $(document).ready(function(){
      
    tinymce.init({
    selector: "textarea",
    theme: "modern",
    language:"zh_CN",
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
    filemanager_title: "Responsive Filemanager",
    external_filemanager_path: "/themes/admin/js/plugin/tinymce/js/tinymce/plugins/responsivefilemanager/filemanager/",
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


