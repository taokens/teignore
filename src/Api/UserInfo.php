<?php


namespace Taokens\Teignore\Api;


use Taokens\Teignore\TenantGateWay;

class UserInfo extends TenantGateWay
{
    /**
     * 具体业务请求URL
     */
    const QUERY_URL = '/api/open-api/user-center/user-info';

    /**
     * SaaS获取用户信息
     * @param array $params
     * @return bool|string
     */
    public function getUserInfo(array $params = [])
    {
        return $this->send($params);
    }
}