<?php
/**
 * Created by PhpStorm.
 * User: suhanyu
 * Date: 2019-01-29
 * Time: 19:42
 */

namespace Server\services\User;

use Server\services\BaseService;

class AccessService extends BaseService
{
    /**
     * @desc 用户登录
     */
    public function userLogin():array
    {
        return [
            'status' => 1,
            'msg'    => '登录成功！',
        ];
    }
}
