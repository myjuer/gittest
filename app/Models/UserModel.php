<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class UserModel extends Model{
	protected $table = 'user';
	protected $guarded=[];  //设置禁止注入字段为空
	public $timestamps = false; //去除created_at 和 updated_at 字段

public function updateData($data=array()){
		$rs = $this->inits($data['conditions']);
		if(isset($rs)){
		return $rs->update($data['datas']);  //更新数据
	}
}
public function getData($data,$method='1'){  //1为精确查询、2为模糊查询
	$rs = $this->inits($data['conditions'],$method);
	if($rs){
		if($data['callback']!=''){
			return $rs->pluck($data['callback'])->first();
		}else{
			return $rs->get();
		}
	}else{
		return $this ->get();
	}
}
public function deleteData($data,$method='1'){  //1为精确查询、2为模糊查询
	$rs = $this->inits($data['conditions'],$method);
	if(isset($rs)){
		return $rs->delete();  //删除
	}
}
public function inits($conditions,$method='1'){//1为精确查询、2为模糊查询
	if(isset($conditions)){
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
