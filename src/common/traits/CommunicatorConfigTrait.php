<?php
/**
 * Created by PhpStorm.
 * User: suhanyu
 * Date: 2019-02-11
 * Time: 15:09
 */

namespace Server\common\traits;

use Tars\client\CommunicatorConfig;
use Tars\client\Communicator;
use Server\conf\CommunicateConf;

trait CommunicatorConfigTrait
{
    protected $_communicator;

    protected $_iVersion;

    protected $_iTimeout;

    public $moduleName = 'PHPTest.PHPServer';

    public $_servantName = 'PHPTest.PHPServer.Obj';

    public function __construct(CommunicatorConfig $config)
    {
        try {
            $config->setServantName($this->_servantName);
            $this->_communicator = new Communicator($config);
            $this->_iVersion = $config->getIVersion();
            $this->_iTimeout = empty($config->getAsyncInvokeTimeout()) ? CommunicateConf::$communicateTimeout : $config->getAsyncInvokeTimeout();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}