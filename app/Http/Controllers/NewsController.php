<?php
namespace App\Http\Controllers;
class NewsController extends Controller{
	function index(){
		return view('admin.news');
	}
	function news_edit(){
		return view('admin.news_edit');
	}
}