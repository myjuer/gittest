
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
				//console.log(typeof res);
				/*function(){
					console.log(res);
				}*/
			},
			timeout:1000
		})
		//console.log(ops.url)
		//return this;
	}
	});
})(jQuery)