<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class UserModel extends Model{
	protected $table = 'user';
	protected $guarded=[];  //设置禁止注入字段为空
	public $timestamps = false; //去除created_at 和 updated_at 字段

function updataData($data=array()){
		$rs = $this->inits($data['conditions']);
		if(isset($rs)){
		return $rs->update($data['datas']);  //更新数据
	}
}

function getData($data){
	$rs = $this->inits($data['conditions']);
	if($rs){
		if($data['callback']!=''){
			return $rs->pluck($data['callback'])->first();
		}else{
			return $rs->first();
		}
	}else{
		return $this ->get();
	}
}
function inits($conditions	){
	if(isset($conditions)){
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
	}
}
