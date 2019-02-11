<?php
/**
 * Created by PhpStorm.
 * User: suhanyu
 * Date: 2019-01-29
 * Time: 18:06
 */
return [
    'appName'         => 'PHPTest',
    'serverName'      => 'PHPServer',
    'objName'         => 'Obj',
    'withServant'     => true,//决定是服务端,还是客户端的自动生成
    'tarsFiles'       => array(
        './TarsService.tars'
    ),
    'dstPath'         => '../src/servant',
    'namespacePrefix' => 'Server\servant',
];