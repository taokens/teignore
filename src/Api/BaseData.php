<?php


namespace Taokens\Teignore\Api;


use Taokens\Teignore\TenantGateWay;

class BaseData extends TenantGateWay
{

    /**
     * 获取SaaS基础数据
     * @param array $params
     * @return bool|string
     */
    public function query(array $params = [])
    {
        return $this->setUrl(\Golive::PRODUCT_GET_BASE_DATA)->send($params);
    }
}