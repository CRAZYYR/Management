<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
class IndexController extends Controller
{
    function index(){
    	return view('index');
    }
    function login(){
    	echo session(array('uid'=>'false'));
    	return view('welcome');
    }
}













?>