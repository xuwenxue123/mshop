<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Index extends Model
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
    protected $table = 'regster';

     /**
     * 指示模型是否自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    protected $primaryKey = 'id';

}
