<?php
namespace App\Http\Controllers;
class ProductController extends Controller{
	function index(){
		return view('admin.product');
	}
	function product_edit(){
		return view('admin.product_edit');
	}
}