<?php


namespace Taokens\Teignore\Api;


use Taokens\Teignore\TenantGateWay;

class Department extends TenantGateWay
{

    /**
     * SaaS获取组织架构
     * @param array $params
     * @return bool|string
     */
    public function get(array $params = [])
    {
        return $this->setUrl(\Golive::PRODUCT_GET_DEPARTMENT)->send($params);
    }
}