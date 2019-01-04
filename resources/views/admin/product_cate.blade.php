@include('admin.com.comhead')
<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="box">
    <!-- /.box-header -->
    <div class="box-header ui-sortable-handle" style="cursor: move;">
      <i class="ion ion-clipboard"></i>

      <h3 class="box-title">产品分类</h3>


    </div>




    <div class="box-body">
      <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
      <ul class="todo-list sortable-list">
<li style="">

      	<?php echo $list;?>
   </li>

</ul>
 <div class="modal modal-default fade" id="modal-default" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">确认删除？</h4>
              </div>
              <div class="modal-body">
                <p>删除分类后不可恢复，确定删除请点击确认！</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-action="cancelselect">取消</button>
                <button type="button" class="btn btn-success"  data-dismiss="modal" data-action="delete">确认</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</div>
<div class="box-footer clearfix no-border">
  <div class="pull-right">
  <div class="btn-group">
   <a type="button" class="btn btn-success" data-action="add-sort-outitem"><i class="fa fa-plus"></i> 添加</a>
 </div>
 <div class="btn-group">
   <a type="button" class="btn btn-danger" data-action="save-sort-all"><i class="fa fa-save"></i> 保存</a>
 </div>
 </div>
</div>


<!-- /.box-body -->
</div>

<!-- /.row -->
</section>
<!-- /.content -->

<!-- checkbox style pulugins -->
@include('admin.com.comfoot')

<script>



$().deleteData({
  	'pg':"{{url('admin/product_cate/delete')}}",
  	'csrf_token':"{{csrf_token()}}",
  });
$('body').on('click','[data-action="add-sort-item"]',function(){
  //alert();
  //console.log('55');
 if($(this).siblings('.sortable-list').length<=0){
 	$(this).parent().append('<div class="sortable-list"></div>');
 }
 var toele = $(this).siblings('.sortable-list');
 var pid = $(this).siblings().find('input[type=text]').attr('data-id');
 //console.log(pid);
appd_item(toele,pid);
  
/*$('.sortable-list').sortable();
 $('[type="checkbox"]').iCheck({
     checkboxClass: 'icheckbox_minimal',
       radioClass: 'iradio_minimal',
      increaseArea: '20%' // optional
    });*/
})
$('body').on('click','[data-action="add-sort-outitem"]',function(){
	$('.todo-list').append('<li><div class="sortable-list ac"></div></li>');
  var toele = $('.ac');
  appd_item(toele,0);
  $('.sortable-list').removeClass('ac');
/*$('.sortable-list').sortable();
 $('[type="checkbox"]').iCheck({
     checkboxClass: 'icheckbox_minimal',
       radioClass: 'iradio_minimal',
      increaseArea: '20%' // optional
    });*/
})
function appd_item(ele,pid){
   var html = '<dl class="cate-item">';
      html +='<dd>';
      html +='<span class="handle ui-sortable-handle">';              
      html +='<i class="fa fa-ellipsis-v"></i> ';
      html +='<i class="fa fa-ellipsis-v"></i>';
      html +='</span>';
      html +='<input type="checkbox" value="">';
      html +='<span class="text input-group-sm"><input type="text" class="form-control " value="" data-parent='+pid+'></span>';
      html +='<small class="bg-green btn badge"></small> ';
     // html +='<small class="bg-green btn badge" data-action="add-sort-item"><i class="fa fa-plus"></i> 添加子分类</small> ';
      html +='<small class="bg-red btn badge" data-action="delete-sort-item"><i class="fa fa-trash-o"></i> 删除</small>';
      html +='<div class="sortable-list">';
      html +='</div>';
      html +='</dd>';
      html +='</dl>';
  ele.append(html);
}
$('body').on('click','[data-action="delete-sort-item"]',function(){
  $(this).parent().parent().remove();
})
$('body').on('click','[data-action="save-sort-all"]',function(){
	var catelist={};
	//var catelist =new Array();
	var cateitem=$('.todo-list').find('input[type=text]');
	cateitem.each(function(i,ele){
		catelist[i]={};
		catelist[i]['id']=$(ele).attr('data-id')?$(ele).attr('data-id'):'';
		catelist[i]['parent']=$(ele).attr('data-parent');
		catelist[i]['title']=$(ele).val();
		catelist[i]['sort']=i+1;
	 	//catelist.i.id=cateitem.attr('data-id');
	 	//catelist.i.parent=cateitem.attr('data-parent');
	 	//catelist.i.title=cateitem.val();
	})
 	

 	console.log(typeof catelist);

 	 $().ajaxChangeData({
	 	url:'{{url("admin/product/ajax/ajax_changescates")}}',
	 	data:{x:'123',_token:'{{csrf_token()}}',cates:catelist},
	 	func:function(){
	 		console.log(catelist);
	 		//_that.addClass('hide').siblings().removeClass('hide');
	 	}
	 })
})
</script>



