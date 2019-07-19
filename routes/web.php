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

// Route::get('login/login_add', 'admin\LoginController@login_add');//后台登录
// Route::post('login_add_do', 'admin\LoginController@login_add_do');//后台登录


//微商城前台
Route::get('home/index_add', 'home\IndexController@index_add');//前台显示
Route::get('home/register', 'home\LoginController@register');//前台注册
Route::post('do_register', 'home\LoginController@do_register');//前台注册执行
Route::get('login', 'home\LoginController@login');//前台登录
Route::post('do_login', 'home\LoginController@do_login');//前台登录执行
Route::get('home/index_add', 'home\IndexController@index');//前台列表
Route::get('goods_detail', 'home\GoodsController@goods_detail');//全部商品
Route::get('wish', 'home\IndexController@wish');//全部商品
Route::get('buyCart', 'home\IndexController@buyCart');//加入购物车
Route::get('do_buyCart', 'home\IndexController@do_buyCart');//加入购物车入库
Route::get('order','home\IndexController@order'); // 订单
Route::get('do_order','home\IndexController@do_order'); // 订单
Route::get('order_tk','home\IndexController@order_tk'); // 订单
Route::get('order_list','home\IndexController@order_list'); // 订单列表
Route::get('order_list_do','home\IndexController@order_list_do'); // 订单列表
Route::get('pay','Pay\AliPayController@pay');//支付宝支付
Route::get('return_url','Pay\AliPayController@return_url');//同步
Route::post('notify_url','Pay\AliPayController@notify_url');//异步
//后台
Route::get('goods_add', 'admin\GoodsController@goods_add');//后台商品显示
Route::post('goods_add_do', 'admin\GoodsController@goods_add_do');//后台商品入库
Route::get('goods_list', 'admin\GoodsController@goods_list');//后台商品列表展示
Route::get('goods_delete', 'admin\GoodsController@goods_delete');//后台商品列表删除
Route::get('goods_edit', 'admin\GoodsController@goods_edit');//后台商品修改
Route::post('goods_edit_do', 'admin\GoodsController@goods_edit_do');//后台商品修改
Route::get('cargo_add', 'admin\CargoController@cargo_add');//后台货物显示
Route::post('cargo_add_do', 'admin\CargoController@cargo_add_do');//后台货物入库
Route::get('cargo_list', 'admin\CargoController@cargo_list');//货物列表展示
Route::get('cargo_delete', 'admin\CargoController@cargo_delete');//或误删除
Route::get('cargo_edit', 'admin\CargoController@cargo_edit');//货物修改显示
Route::post('cargo_edit_do', 'admin\CargoController@cargo_edit_do');//货物修改显示入库
// Route::get('login', 'admin\LoginController@login');//后台登录
// Route::post('login_add', 'admin\LoginController@login_add');//后台登录

//调用中间件
Route::group(['middleware'=>['login']],function(){
    Route::get('home/login', 'home\LoginController@login');//前台登录
});

//调用中间件
Route::group(['middleware'=>['cargo']],function(){
    Route::get('cargo_edit', 'admin\CargoController@cargo_edit');
    Route::post('cargo_edit_do', 'admin\CargoController@cargo_edit_do');
});
