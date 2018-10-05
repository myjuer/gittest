<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Input;
use Validator;
class UserController extends Controller{
	function index(){
		$list = UserModel::all();
		return view('admin.user',['list'=>$list]);
	}
	function user_edit(Request $info,$user_id,$action){
		$data['conditions']['id']=$user_id;
		$data['callback'] = '';
		$list = UserModel::find(1)->getData($data);
		
		if($info->ismethod('post')){
		$validator = Validator::make($info->all(), [
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
			$re = UserModel::find(1)->updataData($data);
			if($re){
				$list->msg = 'ok';
				$list->url = $info->url();
				return view('admin.tips',['list'=>$list]);
			}
        }
		}
		return view('admin.user_edit',['list'=>$list]);
	}
	function ajax_method($b){
		$info = Input::get();
		if($info){
		$re='';
		if($b=='ajax_changestatus'){
			$data['conditions']['id']=$info['id'];
			$data['datas']['status']=$info['status'];
			$re = UserModel::find(1)->updataData($data);
			$data['callback'] = 'status';						 //需要返回的字段
			$status = UserModel::find(1)->getData($data);
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
