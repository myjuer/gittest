
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
				if(res.isok=='ok'){
				if(typeof opss.func=='function'){
					opss.func();
					console.log(res);
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
	}
	});
})(jQuery)
$(document).ready(function(){
 $('.makeselect input[type="checkbox"]').iCheck({
     checkboxClass: 'icheckbox_minimal',
       radioClass: 'iradio_minimal',
      increaseArea: '20%' // optional
    });

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
})