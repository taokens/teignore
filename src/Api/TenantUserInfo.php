<?php


namespace Taokens\Teignore\Api;


use Taokens\Teignore\TenantGateWay;

class TenantUserInfo extends TenantGateWay
{
    /**
     * 具体业务请求URL
     */
    const QUERY_URL = '/api/open-api/user-center/tenant/user-info';

    /**
     * SaaS获取租户下的用户信息
     * @param array $params
     * @return bool|string
     */
    public function get(array $params = [])
    {
        return $this->send($params);
    }
}