<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ProductcateModel extends Model{
	protected $table = 'product_cate';
	protected $guarded=[];  //设置禁止注入字段为空
	public $timestamps = false; //去除created_at 和 updated_at 字段
public function insertData($data=array()){
		
		$maxorder = $this->max('sort');
		if($data!=''){
		$data['datas']['sort'] = $maxorder+1;
		$data['datas']['update_time'] = date('Y-m-d H:i:s',time());
		return $this->insertGetId($data['datas']);  //插入数据，获取最后一条ID
	}
}
public function updateData($data=array()){
		$rs = $this->inits($data['conditions']);
		if(isset($rs)){
		return $rs->update($data['datas']);  //更新数据
	}
}
function checkData($data=array(),$type=1){    //1为重复验证 2为存在验证
	if(isset($data['datas']['username'])){
		if($type==1){
			if($this->where('id','<>',$data['conditions']['id'])->where('username',$data['datas']['username'])->exists()){  //添加验证用户名是否存在
				return 'data_exists';
			}
		}
		if($type==2){
			if($this->where('username',$data['datas']['username'])->exists()){  //添加验证用户名是否存在
				return 'data_exists';
			}
		}
	}
}

public function getData($data,$method='1',$orders='sort'){  //1为精确查询、2为模糊查询
	if(!isset($data['conditions'])){
		return $rs->get();
	}
	//$rs = $this->inits($data['conditions'],$method);
	if(isset($rs)){
		if($data['callback']!=''){
			return $rs->pluck($data['callback'])->first();
		}else{
			return $rs->orderBy($orders,'asc')->get();
		}
	}else{
		return $this->orderBy($orders,'asc')->get();
	}
}
public function deleteData($data,$method='1'){  //1为精确查询、2为模糊查询
	$rs = $this->inits($data['conditions'],$method);
	if(isset($rs)){
		return $rs->delete();  //删除
	}
}
public function inits($conditions,$method='1'){//1为精确查询、2为模糊查询
	if(is_array($conditions)){
		if($method==1){
		$i = 0;
		foreach($conditions as $k=>$v){
			if($i==0){
				$a[$i] = $this -> where($k,$v);
				$i++;
			}else{
				$a[$i] = $a[$i-1]-> where($k,$v);
				$i++;
			}

		}
		 return $a[$i-1];  //获取筛选后的数据
		}
	 if($method==2){
	 	$i = 0;
		foreach($conditions as $k=>$v){
			if($i==0){
				$a[$i] = $this -> where($k,'LIKE','%'.$v.'%');
				$i++;
			}else{
				$a[$i] = $a[$i-1]-> where($k,'LIKE','%'.$v.'%');
				$i++;
			}

		}
		 return $a[$i-1];  //获取筛选后的数据
		}
	 }
	}
}
