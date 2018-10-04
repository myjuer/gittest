<?php
namespace App\Http\Controllers;
class UserController extends Controller{
	function index(){
		return view('admin.user');
	}
	function user_edit(){
		return view('admin.user_edit');
	}
}