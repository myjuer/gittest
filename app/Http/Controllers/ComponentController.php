<?php
namespace App\Http\Controllers;
class ComponentController extends Controller{
	function index(){
		return view('admin.component');
	}
	function component_edit(){
		return view('admin.component_edit');
	}
}