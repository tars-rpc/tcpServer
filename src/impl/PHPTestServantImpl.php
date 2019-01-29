<?php
/**
 * Created by PhpStorm.
 * User: suhanyu
 * Date: 2019-01-29
 * Time: 18:59
 */

namespace Server\impl;

use Tars\client\TUPAPIWrapper;
use Server\common\traits\ServantTrait;
use Tars\App;

class PHPTestServantImpl
{
    use ServantTrait;

    /**
     * @param string $paramstr
     * 调用参数形如将此数组json化： [
     *  '_service'=>'User.AccessService@userLogin'
     *  'param1'=>[],
     *  'param2'=>'',
     *  'param3'=>3,
     *  'param4'=>true,
     *  ...
     * ]
     *
     * @param string $result =out=
     * @return int
     * @throws \Exception
     */
    public function apply($paramstr, &$result):int
    {
        try {
            $this->paramstr = $paramstr;
            $paramArr = json_decode($paramstr, true);

            App::getLogger()->info("function 'apply' is called...\n");
            $requestPacket = $this->setCaller();
            $encodeBufs = [];
            $__buffer = TUPAPIWrapper::putStruct('paramstr', 1, $paramstr, $this->_iVersion);
            $encodeBufs['tags'] = $__buffer;
            $requestPacket->_encodeBufs = $encodeBufs;

            $sBuffer = $this->_communicator->invoke($requestPacket, $this->_iTimeout);

            $ret = TUPAPIWrapper::getStruct('result', 2, $result, $sBuffer, $this->_iVersion);

            return TUPAPIWrapper::getInt32('', 0, $sBuffer, $this->_iVersion);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param string $paramstr
     * @param string $result =out=
     * @return int
     * @throws \Exception
     */
    public function get($paramstr,&$result):int
    {
        try {
            $requestPacket = $this->setCaller();
            $encodeBufs = [];
            $__buffer = TUPAPIWrapper::putStruct('paramstr', 1, $paramstr, $this->_iVersion);
            $encodeBufs['tags'] = $__buffer;
            $requestPacket->_encodeBufs = $encodeBufs;

            $sBuffer = $this->_communicator->invoke($requestPacket, $this->_iTimeout);

            $ret = TUPAPIWrapper::getStruct('result', 2, $result, $sBuffer, $this->_iVersion);

            return TUPAPIWrapper::getInt32('', 0, $sBuffer, $this->_iVersion);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param string $paramstr
     * @param string $result =out=
     * @return int
     * @throws \Exception
     */
    public function put($paramstr,&$result):int
    {
        try {
            $requestPacket = $this->setCaller();
            $encodeBufs = [];
            $__buffer = TUPAPIWrapper::putStruct('paramstr', 1, $paramstr, $this->_iVersion);
            $encodeBufs['tags'] = $__buffer;
            $requestPacket->_encodeBufs = $encodeBufs;

            $sBuffer = $this->_communicator->invoke($requestPacket, $this->_iTimeout);

            $ret = TUPAPIWrapper::getStruct('result', 2, $result, $sBuffer, $this->_iVersion);

            return TUPAPIWrapper::getInt32('', 0, $sBuffer, $this->_iVersion);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
