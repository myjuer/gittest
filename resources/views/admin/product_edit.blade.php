<!DOCTYPE html>
<html>
<head>
@extends('admin.com.pginfo')
@section('extcss')

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
          @if ($list!='')
          <!-- form start -->
          <form role="form" action="" method="post">
            <div class="box-body">
              <div class="form-group @if ($errors->first('title')) has-error @endif">
                <label for="inputtitle">产品名称</label>
                <input type="text" name="title" value="@if(old('title')!=''){{old('title')}}@else{{$list->title}}@endif" class="form-control" id="inputtitle" placeholder="输入产品名称">
                 @if ($errors->first('title'))
                     <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$errors->first('title')}}</label>
                @endif
              </div>
              <div class="form-group">
                <label>产品分类</label>
                <select name="category" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                 <!--  <option selected="selected"  disabled="disabled">全部分类</option> -->
                  <option value="1" @if ($list->category=='1') selected="selected" @endif>小型断路器</option>
                  <option value="2" @if ($list->category=='2') selected="selected" @endif>漏电断路器</option>
                  <option value="3" @if ($list->category=='3') selected="selected" @endif>过欠压保护器</option>
                  <option value="4" @if ($list->category=='4') selected="selected" @endif>墙壁开关</option>
                  <option value="5" @if ($list->category=='5') selected="selected" @endif>防水插头</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputxinghao">产品型号</label>
                <input type="text" name="type" value="{{$list->type}}" class="form-control" id="inputxinghao" placeholder="输入产品型号">
              </div>
              <div class="form-group">
                <label>产品图片</label>
                <div class="input-group input-group-sm">
                 <input class="form-control input-sm" type="text" name="img" value="{{$list->img}}" id="fieldID"  >
                    <span class="input-group-btn">
                      <a class="btn btn-info btn-flat" data-action="open-files" href="{{CO_STYLE}}js/plugin/responsivefilemanager/filemanager/dialog.php?type=1&field_id=fieldID&multiple=10">选择图片</a>
                    </span>
               </div>
               <div class="margin"></div>
                <div class="clearfix row" id="sortable-img">
                  <div class="col-lg-1 col-sm-2 col-xs-4" id="firstpic"  @if (is_array(json_decode($list->img))) style="display:none;" @endif>
                    <label class="dis-bk">
                      <img class="img-thumbnail dis-bk-full" style="cursor: move;" src="{{AD_STYLE}}img/up-default.jpg">
                     </label>
                  </div>
                  @if (is_array(json_decode($list->img)))
                  @foreach(json_decode($list->img) as $k1=>$one)
                  <div class="connectedSortable col-lg-1 col-sm-2 col-xs-4">
                    <label class="dis-bk img-thumbnail-box pos-r">
                      <img class="img-thumbnail dis-bk-full" style="cursor: move;" src="{{$one}}">
                      <span class="hover-bottom dis-bk ta-c" data-action="delete-this-img"><i class="fa fa-trash"> </i>
                      </span>
                    </label>
                    <input class="form-control input-sm hide" type="text" value="{{$one}}">
                    <input class="form-control input-sm" type="text" placeholder="图片描述">
                  </div>
                  @endforeach
                  @endif
                </div>
              </div>
              <div class="formgroup">
               <label>产品详情</label>
               <textarea id="editor1" name="content" rows="10" cols="80" placeholder="输入产品详情">
                {{$list->content}}
               </textarea>
             </div>
             <div class="checkbox">
              <input type="checkbox" name="istop" value="1" @if ($list->istop=='1') checked="checked" @endif> <span style="vertical-align: middle;">首页推荐</span>
              <input type="text" name="_token" style="display: none;visibility: hidden;opacity: 0;" value="{{csrf_token()}}">
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">提交</button>
             <a class="btn btn-default" href="{{url('admin/product')}}">取消</a>
          </div>
        </form>
        @else
         <!-- form start -->
          <form role="form" action="" method="post">
            <div class="box-body">
              <div class="form-group @if ($errors->first('title')) has-error @endif">
                <label for="inputtitle">产品名称</label>
                <input type="text" name="title" class="form-control" id="inputtitle" placeholder="输入产品名称">
                 @if ($errors->first('title'))
                     <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{$errors->first('title')}}</label>
                @endif
              </div>
              <div class="form-group">
                <label>产品分类</label>
                <select name="category" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                 <!--  <option selected="selected"  disabled="disabled">全部分类</option> -->
                  <option value="1" selected="selected">小型断路器</option>
                  <option value="2">漏电断路器</option>
                  <option value="3">过欠压保护器</option>
                  <option value="4">墙壁开关</option>
                  <option value="5">防水插头</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputxinghao">产品型号</label>
                <input type="text" name="type" class="form-control" id="inputxinghao" placeholder="输入产品型号">
              </div>
              <div class="form-group">
                <label>产品图片</label>
                <div class="input-group input-group-sm">
                 <input class="form-control input-sm" type="text" name="img" id="fieldID"  >
                    <span class="input-group-btn">
                      <a class="btn btn-info btn-flat"  data-action="open-files" href="{{CO_STYLE}}js/plugin/responsivefilemanager/filemanager/dialog.php?type=1&field_id=fieldID&multiple=10">选择图片</a>
                    </span>
               </div>
               <div class="margin"></div>
                <div class="clearfix row" id="sortable-img">
                  <div class="col-lg-1 col-sm-2 col-xs-4" id="firstpic">
                    <label class="dis-bk">
                      <img class="img-thumbnail dis-bk-full" style="cursor: move;" src="{{AD_STYLE}}img/up-default.jpg">
                     </label>
                  </div>
                </div>
              </div>
              <div class="formgroup">
               <label>产品详情</label>
               <textarea id="editor1" name="content" rows="10" cols="80" placeholder="输入产品详情">
               </textarea>
             </div>
             <div class="checkbox">
              <input type="checkbox" name="istop" value="1"> <span style="vertical-align: middle;">首页推荐</span>
              <input type="text" name="_token" style="display: none;visibility: hidden;opacity: 0;" value="{{csrf_token()}}">
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">提交</button>
            <a class="btn btn-default" href="{{url('admin/product')}}">取消</a>
          </div>
        </form>
        @endif

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
@section('extjs')
  <!-- checkbox style pulugins -->

  <script>

    $(document).ready(function(){

})

  </script>
@endsection


