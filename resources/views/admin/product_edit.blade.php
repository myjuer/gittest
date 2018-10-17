<!DOCTYPE html>
<html>
<head>
@extends('admin.com.pginfo')
@section('extcss')
<link rel="stylesheet" type="text/css" href="{{AD_STYLE}}AdminLTE/plugins/iCheck/minimal/minimal.css">
<link rel="stylesheet" type="text/css" href="{{AD_STYLE}}AdminLTE/bower_components/select2/dist/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="{{CO_STYLE}}js/plugin/popup/magnific-popup.css">
@endsection
@section('pgtitle','产品编辑')   <!-- 设置页面标题 -->
@section('content')
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
                <label for="inputtitle">产品名称</label>
                <input type="text" class="form-control" id="inputtitle" placeholder="输入产品名称">
              </div>
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
              <div class="form-group">
                <label for="inputxinghao">产品型号</label>
                <input type="text" class="form-control" id="inputxinghao" placeholder="输入产品型号">
              </div>
              <div class="form-group">
                <label>产品图片</label>
                <div class="input-group input-group-sm">
                 <input class="form-control input-sm" type="text" id="fieldID"  >
                    <span class="input-group-btn">
                      <a class="btn btn-info btn-flat test-popup-link" href="{{CO_STYLE}}js/plugin/responsivefilemanager/filemanager/dialog.php?type=1&field_id=fieldID&multiple=10">选择图片</a>
                    </span>
               </div>
               <div class="margin"></div>
                <div class="clearfix row" id="sortable">
                  <div class="col-lg-1 col-sm-2 col-xs-4" id="firstpic">
                    <label class="dis-bk">
                      <img class="img-thumbnail dis-bk-full" style="cursor: move;" src="{{AD_STYLE}}img/up-default.jpg">
                     </label>
                  </div>
                </div>
              </div>
              <div class="formgroup">
               <label>产品详情</label>
               <textarea id="editor1" name="editor1" rows="10" cols="80" placeholder="输入产品详情">
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
@endsection
@section('extjs')
  <!-- checkbox style pulugins -->
  <script src="{{AD_STYLE}}AdminLTE/plugins/iCheck/icheck.js"></script>
  <script src="{{AD_STYLE}}AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>
  <script src='{{CO_STYLE}}js/plugin/tinymce/tinymce.min.js'></script>
  <script src='{{CO_STYLE}}js/plugin/popup/jquery.magnific-popup.min.js'></script>
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
    external_filemanager_path: "{{CO_STYLE}}js/plugin/responsivefilemanager/filemanager/",
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
        "filemanager": "../responsivefilemanager/tinymce/plugins/responsivefilemanager/plugin.min.js?<?php echo time()?>"
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
window.parent.responsive_filemanager_callback = function(field_id){
      var html = '';
      var imgurl = '{{AD_STYLE}}img/up-default.jpg';
      var url=jQuery('#'+field_id).val();
      console.log(typeof url)
      if(isJsonString(url)){
     for(var i = 0;i<JSON.parse(url).length;i++){
       imgurl = JSON.parse(url)[i];
       html += '<div class="connectedSortable col-lg-1 col-sm-2 col-xs-4">';
       html += '<label class="dis-bk img-thumbnail-box pos-r">';
       html += '<img class="img-thumbnail dis-bk-full" style="cursor: move;" src="'+imgurl+'?'+i+'">';
       html += '<span class="hover-bottom dis-bk ta-c" data-action="delete-this-img"><i class="fa fa-trash"> </i></span>';
       html += '</label>';
       html += '<input class="form-control input-sm hide" type="text" value="'+imgurl+'">';
       html += '<input class="form-control input-sm" type="text" placeholder="图片描述">';
       html += '</div>';
      }
    }else{
       imgurl = url;
       html += '<div class="connectedSortable col-lg-1 col-sm-2 col-xs-4">';
       html += '<label class="dis-bk img-thumbnail-box pos-r">';
       html += '<img class="img-thumbnail dis-bk-full" style="cursor: move;" src="'+imgurl+'">';
       html += '<span class="hover-bottom dis-bk ta-c" data-action="delete-this-img"><i class="fa fa-trash"> </i></span>';
       html += '</label>';
       html += '<input class="form-control input-sm hide" type="text" value="'+imgurl+'">';
       html += '<input class="form-control input-sm" type="text" placeholder="图片描述">';
       html += '</div>';
      
    }
     $('#firstpic').hide();
       $('#sortable').append(html);
        $('span[data-action="delete-this-img"]').click(function(){
          $(this).parent().parent('.connectedSortable').remove();
         if($('#sortable').find('.connectedSortable').length<1) {
            $('#firstpic').show();
          }
       }); 
    }
function isJsonString(str) {
        try {
            if (typeof JSON.parse(str) == "object") {
                return true;
            }
        } catch(e) {
        }
        return false;
    }
 $('span[data-action="delete-this-img"]').click(function(){
    alert()
 });   
    });

  </script>
@endsection


