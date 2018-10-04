<?php
namespace App\Http\Controllers;
class HonorController extends Controller{
	function index(){
		return view('admin.honor');
	}
	function honor_edit(){
		return view('admin.honor_edit');
	}
}