<?php


namespace Taokens\Teignore\Api;


use Taokens\Teignore\TenantGateWay;

class AuthUserInfo extends TenantGateWay
{

    /**
     * SaaS获取租户下人员信息（信息中心数据）
     * @param array $params
     * @return bool|string
     */
    public function get(array $params = [])
    {
        return $this->setUrl(\Golive::USER_TENANT_AUTH_LIST)->send($params);
    }
}