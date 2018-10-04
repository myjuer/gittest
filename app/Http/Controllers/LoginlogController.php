<?php
namespace App\Http\Controllers;
class LoginlogController extends Controller{
	function index(){
		return view('admin.loginlog');
	}
	function loginlog_edit(){
		return view('admin.loginlog_edit');
	}
}