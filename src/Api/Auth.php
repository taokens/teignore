<?php


namespace Taokens\Teignore\Api;


use Taokens\Teignore\TenantGateWay;

class Auth extends TenantGateWay
{

    /**
     * SaaS身份认证
     * @param array $params
     * @return bool|string
     */
    public function auth(array $params = [])
    {
        return $this->setUrl(\Golive::PRODUCT_GET_TENANT_INFO)->send($params);
    }
}