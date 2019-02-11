<?php
/**
 * Created by PhpStorm.
 * User: suhanyu
 * Date: 2019-01-29
 * Time: 19:16
 */

namespace Server\common\traits;

use Tars\client\CommunicatorConfig;
use Tars\client\Communicator;
use Tars\client\RequestPacket;

trait ServantTrait
{
    protected $_communicator;

    protected $_iVersion;

    protected $_iTimeout;

    protected $paramstr = '';

    protected $serviceInstance = null;

    protected $serviceName = '';

    protected $methodName = '';

    protected $data = [];

    public $_servantName = 'PHPTest.PHPServer.Obj';

    /**
     * @desc rpc调用前的准备
     */
    public function setCaller():RequestPacket
    {
        try {
            $requestPacket = new RequestPacket();
            $requestPacket->_iVersion = $this->_iVersion;
            $requestPacket->_funcName = __FUNCTION__;
            $requestPacket->_servantName = $this->_servantName;
            //获取调用的方法和service
            $paramstr = $this->paramstr;
            $paramArr = json_decode($paramstr, true);
            if (!isset($paramArr['_service'])) {
                throw new \Exception("缺少调用参数：service。\n", 300);
            }
            $this->serviceName = $paramArr['_service'];
            //_service形如：`User.AccessService@userLogin`
            $this->parseServiceName();


            return $requestPacket;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @desc 解析请求中的 _service 参数
     */
    public function parseServiceName()
    {
        $serviceName = $this->serviceName;
        $paramArr = explode('@', $serviceName);
        $this->methodName =
        $methodName = array_pop($paramArr);
        $servicePath = $paramArr[0];
        $servicePath = str_replace('.','\\', $servicePath);
        $className = sprintf("Server\services\\%s", $servicePath);
        if (!class_exists($className)) {
            throw new \Exception("调用类不存在！", 301);
        }
        $this->serviceInstance = new $className;
        if (!($this->serviceInstance instanceof $className)) {
            throw new \Exception("调用类异常！", 302);
        }
    }
}
