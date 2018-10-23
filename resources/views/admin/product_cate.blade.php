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
            <dl>
                <dd>
                <!-- drag handle -->
                <span class="handle ui-sortable-handle">
                  <i class="fa fa-ellipsis-v"></i>
                  <i class="fa fa-ellipsis-v"></i>
                </span>
                <!-- checkbox -->
                <input type="checkbox" value="">
                <!-- todo text -->
                <span class="text input-group-sm"><input type="text" class="form-control " value="小型断路器"></span>
                <!-- Emphasis label -->
                <small class="label label-success" data-action="add-sort-item"><i class="fa fa-plus"></i> 添加子分类</small>
                <small class="label label-danger" data-action="delete-sort-item"><i class="fa fa-trash-o"></i> 删除</small>
                <div class="sortable-list">
                </div>
              </dd>
            
            </dl>

      </li>
</ul>
</div>
<div class="box-footer clearfix no-border">
  <div class="btn-group">
   <a type="button" class="btn btn-success"><i class="fa fa-plus"></i> 添加</a>
 </div>
 <div class="btn-group">
   <a type="button" class="btn btn-danger"><i class="fa fa-plus"></i> 保存</a>
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
  var html = '<dl class="cate-item">';
      html +='<dd>';
      html +='<span class="handle ui-sortable-handle">';              
      html +='<i class="fa fa-ellipsis-v"></i>';
      html +='<i class="fa fa-ellipsis-v"></i>';
      html +='</span>';
      html +='<input type="checkbox" value="">';
      html +='<span class="text input-group-sm"><input type="text" class="form-control " value="小型断路器"></span>';
      html +='<small class="label label-success" data-action="add-sort-item"><i class="fa fa-plus"></i> 添加子分类</small>';
      html +='<small class="label label-danger" data-action="delete-sort-item"><i class="fa fa-trash-o"></i> 删除</small>';
      html +='<div class="sortable-list">';
      html +='</div>';
      html +='</dd>';
      html +='</dl>';
  $(this).siblings('.sortable-list').append(html);
$('.sortable-list').sortable();
 $('[type="checkbox"]').iCheck({
     checkboxClass: 'icheckbox_minimal',
       radioClass: 'iradio_minimal',
      increaseArea: '20%' // optional
    });
})
$('body').on('click','[data-action="delete-sort-item"]',function(){
  $(this).parent().parent().remove();
})
</script>



