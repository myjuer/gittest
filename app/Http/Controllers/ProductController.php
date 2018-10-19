<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\productModel;
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
				$data['datas']['type']=$info->input('type');
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
				$data['datas']['type']=$info->input('type');
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
	function category(){
		return view('admin.product_cate');
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
