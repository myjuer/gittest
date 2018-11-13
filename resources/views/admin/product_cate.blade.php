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
                <p>删除用户后不可恢复，确定删除请点击确认！</p>
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
   <a type="button" class="btn btn-danger"><i class="fa fa-plus"></i> 保存</a>
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
/*$('body').on('click','[data-action="add-sort-item"]',function(){
  //alert();
 
  var toele = $(this).siblings('.sortable-list');
  appd_item(toele);
$('.sortable-list').sortable();
 $('[type="checkbox"]').iCheck({
     checkboxClass: 'icheckbox_minimal',
       radioClass: 'iradio_minimal',
      increaseArea: '20%' // optional
    });
})
$('body').on('click','[data-action="add-sort-outitem"]',function(){
  var toele = $('.todo-list');
  appd_item(toele);
$('.sortable-list').sortable();
 $('[type="checkbox"]').iCheck({
     checkboxClass: 'icheckbox_minimal',
       radioClass: 'iradio_minimal',
      increaseArea: '20%' // optional
    });
})
function appd_item(ele){
   var html = '<li><dl class="cate-item">';
      html +='<dd>';
      html +='<span class="handle ui-sortable-handle">';              
      html +='<i class="fa fa-ellipsis-v"></i> ';
      html +='<i class="fa fa-ellipsis-v"></i>';
      html +='</span>';
      html +='<input type="checkbox" value="">';
      html +='<span class="text input-group-sm"><input type="text" class="form-control " value="小型断路器"></span>';
      html +='<small class="bg-green btn badge" data-action="add-sort-item"><i class="fa fa-plus"></i> 添加子分类</small> ';
      html +='<small class="bg-red btn badge" data-action="delete-sort-item"><i class="fa fa-trash-o"></i> 删除</small>';
      html +='<div class="sortable-list">';
      html +='</div>';
      html +='</dd>';
      html +='</dl></li>';
  ele.append(html);
}
$('body').on('click','[data-action="delete-sort-item"]',function(){
  $(this).parent().parent().remove();
})*/
</script>



