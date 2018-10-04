<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Support\Facades\Input;
class UserController extends Controller{
	function index(){
		$list = UserModel::all();
		return view('admin.user',['list'=>$list]);
	}
	function user_edit(){
		return view('admin.user_edit');
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
}
