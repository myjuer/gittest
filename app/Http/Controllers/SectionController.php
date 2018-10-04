<?php
namespace App\Http\Controllers;
class SectionController extends Controller{
	function index(){
		return view('admin.section');
	}
	function section_edit(){
		return view('admin.section_edit');
	}
}