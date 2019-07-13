<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
     /**
     * 模型的连接名称
     *
     * @var string
     */
    protected $connection = 'shop';

    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'regter';

     /**
     * 指示模型是否自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    protected $primaryKey = 'id';

}
