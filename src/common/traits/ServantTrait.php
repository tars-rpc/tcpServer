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

    public $_servantName = 'PHPTest.PHPServer.obj';

    public function __construct(CommunicatorConfig $config)
    {
        try {
            $config->setServantName($this->_servantName);
            $this->_communicator = new Communicator($config);
            $this->_iVersion = $config->getIVersion();
            $this->_iTimeout = empty($config->getAsyncInvokeTimeout()) ? 2 : $config->getAsyncInvokeTimeout();
        } catch (\Exception $e) {
            throw $e;
        }
    }

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

            return $requestPacket;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
