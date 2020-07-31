<?php


namespace Taokens\Teignore\Api;


use Taokens\Teignore\TenantGateWay;

class Department extends TenantGateWay
{
    /**
     * 具体业务请求URL
     */
    const QUERY_URL = '/api/open-api/department/get-data';

    /**
     * SaaS获取组织架构
     * @param array $params
     * @return bool|string
     */
    public function get(array $params = [])
    {
        return $this->send($params);
    }
}