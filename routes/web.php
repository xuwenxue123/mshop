<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//学生管理系统
Route::get('student/student_add', 'admin\StudentController@student_add');//学生添加
Route::post('student_add_do', 'admin\StudentController@student_add_do');//学生添加入库
Route::get('student_list', 'admin\StudentController@student_list');//学生列表信息
Route::get('student_del', 'admin\StudentController@student_del');//学生删除
Route::get('student_edit', 'admin\StudentController@student_edit');//学生删除
Route::post('student_edit_do', 'admin\StudentController@student_edit_do');//学生修改
Route::get('aa', 'admin\StudentController@aa');//数组处理
Route::get('bb', 'admin\StudentController@bb');//数组处理
Route::get('cc', 'admin\StudentController@cc');//数组处理
Route::get('dd', 'admin\StudentController@dd');//数组处理
Route::get('ee', 'admin\StudentController@ee');//数组处理

Route::get('login/login_add', 'admin\LoginController@login_add');//后台登录
Route::post('login_add_do', 'admin\LoginController@login_add_do');//后台登录


//微商城前台
Route::get('home/index_add', 'home\IndexController@index_add');//前台显示
Route::get('home/register', 'home\LoginController@register');//前台注册
Route::post('do_register', 'home\LoginController@do_register');//前台注册执行
Route::get('home/login', 'home\LoginController@login');//前台登录
Route::post('do_login', 'home\LoginController@do_login');//前台登录执行
Route::get('home/index_add', 'home\IndexController@index');//前台列表
Route::get('goods_detail', 'home\GoodsController@goods_detail');//全部商品
Route::get('wish', 'home\IndexController@wish');//全部商品


//后台
Route::get('goods_add', 'admin\GoodsController@goods_add');//后台商品显示
Route::post('goods_add_do', 'admin\GoodsController@goods_add_do');//后台商品入库
Route::get('goods_list', 'admin\GoodsController@goods_list');//后台商品列表展示
Route::get('goods_delete', 'admin\GoodsController@goods_delete');//后台商品列表删除
Route::get('goods_edit', 'admin\GoodsController@goods_edit');//后台商品修改
Route::post('goods_edit_do', 'admin\GoodsController@goods_edit_do');//后台商品修改


//调用中间件
Route::group(['Middleware'=>['login']],function(){
    Route::get('home/login', 'home\LoginController@login');//前台登录
});
