
;(function($){
	$.fn.extend({
	"border":function(options){
		options=$.extend({
			width:"1px",
			line:"solid",
			color:"#f00"
		},options);
		this.css("border",options.width+' '+options.line+' '+options.color);
		return this;
		},
	"changestatus":function(ops){
		ops=$.extend({
			'c':'span',
			'token':'',
			'url':''
		},ops)
		var ele = $(this).find(ops.c);
		ele.each(function(i,j){
			var _that = $(this);
			_that.on('click',function(){
				
				var obj = _that.siblings();
				 $().ajaxChangeData({
				 	url:ops.url,
				 	data:{x:'123',_token:ops.token,status:obj.attr('data-status'),id:obj.attr('data-id')},
				 	func:function(){
				 		_that.addClass('hide').siblings().removeClass('hide');
				 	}
				 })

			})
		})
	},
	'ajaxChangeData':function (opss){
		opss=$.extend({
			url:'',
			func:'',
			type:'post',
			data:'',
		},opss)
		$.ajax({
			url:opss.url,
			dataType:'json',
			data:opss.data,
			type:'POST',
			error:function(e){
				console.log(e.status);
			},
			success:function(res){
				console.log(res);
				if(res.isok=='ok'){
				if(typeof opss.func=='function'){
					opss.func();
					
				}
			}
			},
			timeout:1000
		})
	},
	'checkpwdconfirm':function(){
		console.log('aa');
		if($('.check-pwd').find('input').val()==$('.check-pwd-confirm').find('input').val()){
			$('.check-pwd-confirm').find('.msg').removeClass('fa-remove');
			$('.check-pwd-confirm').find('.msg').removeClass('fc-red');
			$('.check-pwd-confirm').find('.msg').addClass('fa-check');
			$('.check-pwd-confirm').find('.msg').addClass('fc-green');
			$('.check-pwd-confirm').find('.msg').html(' 密码一致');
			return true;
		}else{
			$('.check-pwd-confirm').find('.msg').removeClass('fa-check');
			$('.check-pwd-confirm').find('.msg').removeClass('fc-green');
			$('.check-pwd-confirm').find('.msg').addClass('fa-remove');
			$('.check-pwd-confirm').find('.msg').addClass('fc-red');
			$('.check-pwd-confirm').find('.msg').html(' 密码不一致');
			return false;
		}
	},
	'deleteData':function(ops){

		  ops=$.extend({
		  	'pg':'',
		  	'csrf_token':''
		  },ops)
		    $('[data-action="deletethis"]').click(function(){
            $(this).closest('.selparent').find('.selitems').find('input[type="checkbox"]').iCheck("check");
			  })
        $('[data-action="cancelselect"]').click(function(){
           $('.selparent').find('.selitems').find('input[type="checkbox"]').iCheck("uncheck");
        })
		  $('[data-action="delete"]').click(function(){

		  	if($('.selitems input[type="checkbox"]:checked').length>0){
		  			 var form = $('<form action=\"'+ops.pg+'\"></form>');
					  form.attr('class','hide');
					  form.attr('method','post');
					  $('.selitems input[type="checkbox"]:checked').each(function(i,j){
					  		form.append($(this));
					  })
					  form.append('<input type="text" name="_token" value="'+ops.csrf_token+'">');
					$('body').append(form);
					form.submit();
		  	}else{
		  		//alert();
		  	}
  })
	}
	});
})(jQuery)
$(document).ready(function(){
 $('[type="checkbox"]').iCheck({
     checkboxClass: 'icheckbox_minimal',
       radioClass: 'iradio_minimal',
      increaseArea: '20%' // optional
    });
$('.select2').select2(); 
 $('.test-popup-link').magnificPopup({
      type:'iframe',
});
 $('.sortable-list').sortable();
//Enable check and uncheck all functionality
$(".checkbox-toggle").on('ifChanged',function () {
  var clicks = $(this).data('clicks');
  if (clicks) {
    //Uncheck all checkboxes
  $(".makeselect input[type='checkbox']").iCheck("uncheck");
  } else {
    //Check all checkboxes
   $(".makeselect input[type='checkbox']").iCheck("check");
  }
  $(this).data("clicks", !clicks);
});
 $('[data-action="open-files"]').on('click',function(){
  layer.open({
  type: 2,
  content: this.href,
  maxmin:true,
  skin: 'layui-ext-class',
  area:['50%','50%']
   })
  return false;
    });

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
        "table contextmenu directionality emoticons paste textcolor responsivefilemanager code fullscreen"],
    relative_urls: false,
    browser_spellcheck: true,
    filemanager_title: "文件管理",
    external_filemanager_path: "/resources/assets/common/js/plugin/responsivefilemanager/filemanager/",
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
        "filemanager": "/resources/assets/common/js/plugin/responsivefilemanager/plugin.min.js?<?php echo time()?>"
    },
    codemirror: {
        indentOnInit: true,
        path: 'CodeMirror'
    },
    image_advtab: true,
     toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | fullscreen",
    toolbar2: "| responsivefilemanager | image media | link unlink anchor | print preview | code",
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
     $('#sortable-img').append(html);
      upd_imgurl();
    }
$('body').on('click','[data-action="delete-this-img"]',function(){
  $(this).parents('#sortable-img .connectedSortable').remove();
  upd_imgurl();
}) 
$( "#sortable-img" ).sortable({
   stop: function( event, ui ) {
      console.log();
     upd_imgurl();
    }
  });  //img sort
function upd_imgurl(){
        var imgurl = new Array();
      var imgboxes = $('#sortable-img').find('.connectedSortable');
      for(var i=0;i<imgboxes.length;i++){
          imgurl[i] = $(imgboxes[i]).find('img').attr('src');
      }
      console.log(imgurl);
          $('#fieldID').val(JSON.stringify(imgurl));
         if($(imgboxes).length<1) {
            $('#firstpic').show();
          }
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
})