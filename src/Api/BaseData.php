<?php


namespace Taokens\Teignore\Api;


use Taokens\Teignore\TenantGateWay;

class BaseData extends TenantGateWay
{
    /**
     * 具体业务请求URL
     */
    const QUERY_URL = '/api/open-api/product/base-data/get';

    /**
     * 获取SaaS基础数据
     * @param array $params
     */
    public function query(array $params = [])
    {
        return $this->send($params);
    }
}