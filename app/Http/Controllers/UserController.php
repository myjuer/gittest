<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
class UserController extends Controller{
	function index(Request $info){
		//$list = UserModel::all();
		$list = UserModel::paginate(10);
		$paginate = true;
		$kwd='';
		if($info->ismethod('post')){
			if($info->route('action')=='search'){
				$data['conditions']['username']=$info->input('keyword');
				$data['callback'] = '';
				$model = new UserModel();
				$list = $model->getData($data,2);
				$kwd = $info->input('keyword');
				$paginate = false;
			}
			if($info->route('action')=='delete'){
				$ids = $info->input('ids');
				foreach ($ids as $k => $v) {
					$data['conditions']['id']=$v;
					$model = new UserModel();
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
		return view('admin.user',['list'=>$list,'paginate'=>$paginate,'kwd'=>$kwd]);
	}
	function user_edit(Request $info){
			if($info->route('action')=='update'){
				$user_id = $info->route('id');
				$data['conditions']['id']=$user_id;
				$data['callback'] = '';
				$model = new UserModel();
				$list = $model->getData($data)->first();
			if($info->ismethod('post')){
			$validator = Validator::make($info->all(), [   //创建自定义表单验证
	           	'username' => 'required|min:5',
			  	'role' => 'required',
	        ],[
	        	'required'=>':attribute 为必填项目',
				'min' => ':attribute 必须至少:min个字符',
				'same' => ':attribute 和 :other 必须相同'
	        ],[
				'username' => '用户名',
				'newpassword' => '新密码',
				]);
	        if ($validator->fails()) {
	            return redirect($info->url())
	                        ->withErrors($validator)
	                        ->withInput();
	        }else{
	        	if($info->input('newpassword')!=''){
	        		$data['datas']['password']=md5($info->input('newpassword'));
	        	}
	        	$data['conditions']['id']=$list->id;
				$data['datas']['username']=$info->input('username');
				$data['datas']['role']=$info->input('role');
				$data['datas']['status']=$info->input('status');
				$model = new UserModel();
				if($model->checkData($data,1)=='data_exists'){  //检查是否存在相同的用户
					    $validator->errors()->add('data_exists', '用户名已存在!');
						return redirect($info->url())
	                        ->withErrors($validator)
	                        ->withInput();
					}else{
						$re = $model->updateData($data);
					}
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
	           	'username' => 'required|min:5',
			  	'newpassword' => 'required',
	        ],[
	        	'required'=>':attribute 为必填项目',
				'min' => ':attribute 必须至少:min个字符',
				'same' => ':attribute 和 :other 必须相同'
	        ],[
				'username' => '用户名',
				'newpassword' => '密码',
				]);
	        if ($validator->fails()) {
	            return redirect($info->url())
	                        ->withErrors($validator)
	                        ->withInput();
	        }else{
	        	if($info->input('newpassword')!=''){
	        		$data['datas']['password']=md5($info->input('newpassword'));
	        	}
				$data['datas']['username']=$info->input('username');
				$data['datas']['role']=$info->input('role');
				$data['datas']['status']=$info->input('status');
				$model = new UserModel();
				if($model->checkData($data,2)=='data_exists'){    //检查是否存在相同的用户
					$validator->errors()->add('data_exists', '用户名已存在!');
						return redirect($info->url())
	                        ->withErrors($validator)
	                        ->withInput();
				}else{
					$re = $model->insertData($data);
				}
				
				if($re){
					$backs['msg'] = 'ok';
					$backs['url'] = $info->url();
					return view('admin.tips',['backs'=>$backs]);
				}
	        }
		 }
		}
		
		return view('admin.user_edit',['list'=>$list]);
	}
	function ajax_method(Request $info,$b){
		if($info){
		$re='';
		if($b=='ajax_changestatus'){
			$data['conditions']['id']=$info['id'];
			$data['datas']['status']=$info['status'];
			$model = new UserModel();
			$re = $model->updateData($data);
			$data['callback'] = 'status';						 //需要返回的字段
			$model = new UserModel();
			$status = $model->getData($data);
			if($status){
				$res = '';
				$res['isok'] = 'ok';   //ajax返回状态
				$res['list'] = $status;  //ajax返回数据
				echo json_encode($res);
			}
		}
	}
  }
  function badwordcheck(){
  	$badwords = array('<script','<style','<a','<lin','{{','}}','<?php','<%');
   $info='';
			foreach ($info as $k => $v) {
				if($v!==''){
					foreach ($badwords as $i => $j) {
						if(strstr($v,$j)){
							$msg = '输入的字符不合法（包含脚本、链接或其他禁止字符），请重新输入！';
							return $msg;
						}else{
							$msg = 'ok';
						}
					}

				}else{
					$msg = '请填写所有必填项目';
				}
			}
  }
}
