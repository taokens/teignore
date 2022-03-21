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

    /**
     * 获取所有租户Code与租户Code对应的名称
     * @param array $params
     * @return bool|string
     */
    public function getAllTenant(array $params = [])
    {
        return $this->setUrl(Golive::PRODUCT_GET_ALL_TENANT)->send($params);
    }

    /**
     * 获取租户产品是否需要身份认证
     * @param array $params
     * @return bool|string
     */
    public function getProductAuth(array $params = [])
    {
        return $this->setUrl(Golive::PRODUCT_GET_PRODUCT_AUTH)->send($params);
    }
}