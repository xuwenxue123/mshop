<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\OrderDetail as Authenticatable;

class OrderDetail extends Authenticatable
{
       /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'order_detail';
    /**
    * 模型的连接名称
    *
    * @var string
    */
   protected $connection = 'shop';
   /**
    * 指示模型是否自动维护时间戳
    *
    * @var bool
    */
   public $timestamps = false;
   protected $primaryKey = 'id';

}