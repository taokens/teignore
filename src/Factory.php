<?php


namespace Taokens\Teignore;

use Taokens\Teignore\Api\Auth;
use Taokens\Teignore\Api\AuthUserInfo;
use Taokens\Teignore\Api\BaseData;
use Taokens\Teignore\Api\Department;
use Taokens\Teignore\Api\DingTalk;
use Taokens\Teignore\Api\Download;
use Taokens\Teignore\Api\Product;
use Taokens\Teignore\Api\TenantUserInfo;
use Taokens\Teignore\Api\UserInfo;
use Taokens\Teignore\Api\WeChat;

/**
 * Class Factory
 * @property Auth auth
 * @property BaseData baseData
 * @property Department department
 * @property UserInfo userInfo
 * @property TenantUserInfo tenantUserInfo
 * @property AuthUserInfo authUserInfo
 * @property Product product
 * @property Download download
 * @property WeChat weChat
 * @property DingTalk dingTalk
 * @package Taokens\Teignore
 */
class Factory
{
    private $config;

    /**
     * Factory constructor.
     * @param array|null $config
     * @throws \Exception
     */
    public function __construct($config = null)
    {
        if(empty($config)){
            throw new \Exception('config no exist');
        }
        $this->config = $config;
        return $this;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function __get($method)
    {
        try {
            $classname = __NAMESPACE__ . "\\Api\\" . ucfirst($method);
            if (!class_exists($classname)) {
                throw new \Exception('method undefined');
                return false;
            }
            $obj = new $classname($this->config, $this);
            return $obj;
        } catch (\Exception $e) {
            throw new \Exception('method undefined');
        }
    }
}