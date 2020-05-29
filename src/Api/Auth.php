<?php


namespace Taokens\Teignore\Api;


use Taokens\Teignore\TenantGateWay;

class Auth extends TenantGateWay
{
    /**
     * 具体业务请求URL
     */
    const QUERY_URL = '/api/open-api/product/get-tenant';

    /**
     * SaaS身份认证
     * @param array $params
     * @return bool|string
     */
    public function auth(array $params = [])
    {
        return $this->send($params);
    }
}