<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\productModel;
use App\Models\productcateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
class ProductController extends Controller{
			function index(Request $info){
		//$list = ProductModel::all();
		$list = ProductModel::paginate(10);
		$paginate = true;
		$kwd='';
		if($info->ismethod('post')){
			if($info->route('action')=='search'){
				$data['conditions']['title']=$info->input('keyword');
				$data['callback'] = '';
				$model = new ProductModel();
				//var_dump($data);
				$list = $model->getData($data,2);
				$kwd = $info->input('keyword');
				$paginate = false;
			}
			if($info->route('action')=='delete'){
				$ids = $info->input('ids');
				foreach ($ids as $k => $v) {
					$data['conditions']['id']=$v;
					$model = new ProductModel();
					$re = $model->deleteData($data);
				}
				if($re){
					$backs['msg'] = 'ok';
					$backs['url'] = $info->url();
				return view('admin.tips',['backs'=>$backs]);
			  }else{
			  		$backs['msg'] = 'ok';
					$backs['url'] = $info->url();    //获取当前URL
				return view('admin.tips',['backs'=>$backs]);
			  }
			}

		}
		return view('admin.product',['list'=>$list,'paginate'=>$paginate,'kwd'=>$kwd]);
	}
	function product_edit(Request $info){
			if($info->route('action')=='update'){
				$user_id = $info->route('id');
				$data['conditions']['id']=$user_id;
				$data['callback'] = '';
				$model = new ProductModel();
				$list = $model->getData($data)->first();
			if($info->ismethod('post')){
			$validator = Validator::make($info->all(), [   //创建自定义表单验证
	           	'title' => 'required',
			  	'category' => 'required',
	        ],[
	        	'required'=>':attribute 为必填项目',
				'min' => ':attribute 必须至少:min个字符',
				'same' => ':attribute 和 :other 必须相同'
	        ],[
				'title' => '产品名称',
				'category' => '分类',
				]);
	        if ($validator->fails()) {
	            return redirect($info->url())
	                        ->withErrors($validator)
	                        ->withInput();
	        }else{
	        	$data['conditions']['id']=$list->id;
				$data['datas']['title']=$info->input('title');
				$data['datas']['category']=$info->input('category');
				$data['datas']['itemtype']=$info->input('itemtype');
				$data['datas']['img']=$info->input('img');
				$data['datas']['content']=$info->input('content');
				$data['datas']['istop']=$info->input('istop');
				$model = new ProductModel();
				$re = $model->updateData($data);
				if($re){
					$backs['msg'] = 'ok';
					$backs['url'] = $info->url();
					return view('admin.tips',['backs'=>$backs]);
				}
	        }
		 }
		}
		if($info->route('action')=='add'){
			$list='';
			if($info->ismethod('post')){
			$validator = Validator::make($info->all(), [
	           	'title' => 'required',
			  	'category' => 'required',
	        ],[
	        	'required'=>':attribute 为必填项目',
				'min' => ':attribute 必须至少:min个字符',
				'same' => ':attribute 和 :other 必须相同'
	        ],[
				'title' => '产品名称',
				'category' => '分类',
				]);
	        if ($validator->fails()) {
	            return redirect($info->url())
	                        ->withErrors($validator)
	                        ->withInput();
	        }else{
				$data['datas']['title']=$info->input('title');
				$data['datas']['category']=$info->input('category');
				$data['datas']['itemtype']=$info->input('itemtype');
				$data['datas']['img']=$info->input('img');
				$data['datas']['content']=$info->input('content');
				$data['datas']['istop']=$info->input('istop');
				$model = new ProductModel();
				$re = $model->insertData($data);
				if($re){
					$backs['msg'] = 'ok';
					$backs['url'] = $info->url();
					return view('admin.tips',['backs'=>$backs]);
				}
	        }
		 }
		}
		
		return view('admin.product_edit',['list'=>$list]);
	}

/*	function category(){
		$data['conditions']['id']='';
		$data['callback'] = '';
		$model = new ProductcateModel();


		$catehtml = $this->catehtml($alist[0]['child']);
		return view('admin.product_cate',['list'=>$catehtml]);
	}*/
	function category(){
		
		$data['conditions']['id']='';
		$data['callback'] = '';
		$model = new ProductcateModel();
		$list = $model->getData($data)->toarray();
		foreach ($list as $k1 => $v1) {
			$list[$v1['id']]=$v1;   //将ID值作为健名，才能无限分级

		}
		$alist = $this->generateTree($list);
	
		$catehtml = $this->catehtml($alist[0]['child']);
		return view('admin.product_cate',['list'=>$catehtml]);
	} 
	function generateTree($result=array(),$level=5,$a=0){
		$a++;
			foreach ($result as $k => $v) {
				if($a<$level){
					if(isset($v['parent'])&&$v['parent']!='999'){
						$result[$v['parent']]['child'][$v['id']]=&$result[$v['id']];
				        $this->generateTree($result[$v['parent']]['child'],$level,$a);
					}
				
			}
				
		}
		return $result;
		/*if(isset($result[0]['child'])){
			var_dump($result[0]['child']);
		}*/
 }

 function catehtml($data=array()){
 	$html='';
 	/*foreach ($data as $k => $v) {
 		if($v['parent']==0){
 			$html .= '<li>'.$v['id'].'</li>';
 			if(isset($v['child'])){
 			$html .=$this->catehtml($v['child']);
 		  }
 		}else{
 			$html .='<li>-'.$v['id'];
 			if(isset($v['child'])){
 				$html .=$this->catehtml($v['child']);

 				//echo $k;
 			}
 			$html =$html.'</li>';
 			
 		}*/
 		foreach ($data as $k => $v) {
 		if($v['parent']==0){
 			$html .= '
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
                <span class="text input-group-sm"><input type="text" class="form-control " value="'.$v['id'].'"></span>
                <!-- Emphasis label -->
                <small class="bg-green btn badge" data-action="add-sort-item"><i class="fa fa-plus"></i> 添加子分类</small>
                <small class="bg-red btn badge" data-action="delete-sort-item"><i class="fa fa-trash-o"></i> 删除</small>
               ';if(isset($v['child'])){
 				$html .=$this->catehtml($v['child']);

 				//echo $k;
 			}

 			$html .='
              </dd>
            </dl>
     ';
 				
 		}else{
 			$html .='
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
                <span class="text input-group-sm"><input type="text" class="form-control " value="'.$v['id'].'"></span>
                <!-- Emphasis label -->
                <small class="bg-green btn badge" data-action="add-sort-item"><i class="fa fa-plus"></i> 添加子分类</small>
                <small class="bg-red btn badge" data-action="delete-sort-item"><i class="fa fa-trash-o"></i> 删除</small>';
 			if(isset($v['child'])){
 				$html .=$this->catehtml($v['child']);

 				//echo $k;
 			}
 			$html =$html.'
              </dd>
            </dl>
      ';
 			
 		}
 
/*
 		$html .= '<li style="">
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
                <span class="text input-group-sm"><input type="text" class="form-control " value="'.$v['id'].'"></span>
                <!-- Emphasis label -->
                <small class="bg-green btn badge" data-action="add-sort-item"><i class="fa fa-plus"></i> 添加子分类</small>
                <small class="bg-red btn badge" data-action="delete-sort-item"><i class="fa fa-trash-o"></i> 删除</small>
                <div class="sortable-list">';
                echo $html;
				if(isset($v['child'])){
				  $this->catehtml($v['child'],$html);
				   }
			
      			 $html .='</div>
              </dd>
            </dl>
      </li>';*/
 	}
return $html ? '<div class="sortable-list">'.$html.'</div>':$html;

 }
function test($a=0,&$result=array()){
$a++;
if ($a<50) {
    $result['child'][$a]=$a;
    $this->test($a,$result['child']);
}
echo $a;
return $result;

}
	function ajax_method(Request $info,$b){
		if($info){
		$re='';
		if($b=='ajax_changestatus'){
			$data['conditions']['id']=$info['id'];
			$data['datas']['istop']=$info['status'];
			$model = new ProductModel();
			$re = $model->updateData($data);
			$data['callback'] = 'istop';						 //需要返回的字段
			$model = new ProductModel();
			$istop = $model->getData($data);
			if($istop){
				$res = '';
				$res['isok'] = 'ok';   //ajax返回状态
				$res['list'] = $istop;  //ajax返回数据
				echo json_encode($res);
			}
		}
	}
  }
}
