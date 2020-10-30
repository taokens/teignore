<?php


namespace Taokens\Teignore\Api;


use Taokens\Teignore\TenantGateWay;

class AuthUserInfo extends TenantGateWay
{
    /**
     * 具体业务请求URL
     */
    const QUERY_URL = '/api/open-api/user-center/tenant/auth-user-info';

    /**
     * SaaS获取租户下人员信息（信息中心数据）
     * @param array $params
     * @return bool|string
     */
    public function get(array $params = [])
    {
        return $this->send($params);
    }
}