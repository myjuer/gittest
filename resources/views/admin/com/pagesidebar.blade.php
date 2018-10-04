
  <aside class="main-sidebar">

    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">
          <img src="/themes/admin/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">后台管理系统</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>系统信息</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="admin"><i class="fa fa-circle-o"></i> 系统首页</a></li>
            <li><a href="{{url('admin/user')}}"><i class="fa fa-circle-o"></i> 账号管理</a></li>
            <li><a href="{{url('admin/loginlog')}}"><i class="fa fa-circle-o"></i> 登录日志</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>栏目设置</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/product')}}"><i class="fa fa-circle-o"></i> 产品中心</a></li>
            <li><a href="{{url('admin/news')}}"><i class="fa fa-circle-o"></i> 新闻中心</a></li>
            <li><a href="{{url('admin/honor')}}"><i class="fa fa-circle-o"></i> 资质证书</a></li>
            <li><a href="{{url('admin/message')}}"><i class="fa fa-circle-o"></i> 留言管理</a></li>
            <li><a href="{{url('admin/section')}}"><i class="fa fa-circle-o"></i> 栏目管理</a></li>
            <li><a href="{{url('admin/component')}}"><i class="fa fa-circle-o"></i> 组件管理</a></li>
          </ul>
        </li>
        <li>
          <a href="{{url('admin/statistics')}}')">
            <i class="fa fa-th"></i> <span>访问统计</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
         <li class="treeview">
          <a href="{{url('admin/setseo')}}">
            <i class="fa fa-pie-chart"></i>
            <span>SEO设置</span>
            <span class="pull-right-container">
               <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        
        </li>
      </ul>
    </section>

  </aside>
