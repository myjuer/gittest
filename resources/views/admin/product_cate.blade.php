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
@foreach ($list as $k1=>$one)
        <li style="">
            <dl  class="cate-item">
                <dd>
                <!-- drag handle -->
                <span class="handle ui-sortable-handle">
                  <i class="fa fa-ellipsis-v"></i>
                  <i class="fa fa-ellipsis-v"></i>
                </span>
                <!-- checkbox -->
                <input type="checkbox" value="">
                <!-- todo text -->
                <span class="text input-group-sm"><input type="text" class="form-control " value="{{$one['id']}}"></span>
                <!-- Emphasis label -->
                <small class="bg-green btn badge" data-action="add-sort-item"><i class="fa fa-plus"></i> 添加子分类</small>
                <small class="bg-red btn badge" data-action="delete-sort-item"><i class="fa fa-trash-o"></i> 删除</small>
                <div class="sortable-list">
            
              
                </div>
              </dd>
            
            </dl>

      </li>
@endforeach
</ul>
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
<script src="{{CO_STYLE}}js/plugin/bootstrap-treeview/js/bootstrap-treeview.js"></script>
<script>
 var defaultData = [
 {
  text: 'Parent 1',
  href: '#parent1',
  tags: ['4'],
  nodes: [
  {
    text: 'Child 1',
    href: '#child1',
    tags: ['2'],
    nodes: [
    {
      text: 'Grandchild 1',
      href: '#grandchild1',
      tags: ['0']
    },
    {
      text: 'Grandchild 2',
      href: '#grandchild2',
      tags: ['0']
    }
    ]
  },
  {
    text: 'Child 2',
    href: '#child2',
    tags: ['0']
  }
  ]
},
{
  text: 'Parent 2',
  href: '#parent2',
  tags: ['0']
},
{
  text: 'Parent 3',
  href: '#parent3',
  tags: ['0']
},
{
  text: 'Parent 4',
  href: '#parent4',
  tags: ['0']
},
{
  text: 'Parent 5',
  href: '#parent5'  ,
  tags: ['0']
}
];
$('.treeview1').treeview({
  data: defaultData
});
$('body').on('click','[data-action="add-sort-item"]',function(){
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
})
</script>



