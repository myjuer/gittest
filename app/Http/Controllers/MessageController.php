<?php
namespace App\Http\Controllers;
class MessageController extends Controller{
	function index(){
		return view('admin.message');
	}
	function message_edit(){
		return view('admin.message_edit');
	}
}