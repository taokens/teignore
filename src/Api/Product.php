<?php


namespace Taokens\Teignore\Api;


use Taokens\Teignore\TenantGateWay;
use Taokens\Teignore\Tools\Golive;

class Product extends TenantGateWay
{
    /**
     * 根据租户账户-获取数据权限
     * @param array $params
     * @return bool|string
     */
    public function get(array $params = [])
    {
        return $this->setUrl(Golive::DATA_PERMISSION)->send($params);
    }

    /**
     * 获取身份信息
     * @param array $params
     * @return bool|string
     */
    public function getIdentity(array $params = [])
    {
        return $this->setUrl(Golive::USER_GET_IDENTITY)->send($params);
    }
}