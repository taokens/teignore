<?php


namespace Taokens\Teignore\Api;

use Taokens\Teignore\Tools\Golive;
use Taokens\Teignore\TenantGateWay;

class TenantUserInfo extends TenantGateWay
{

    /**
     * SaaS获取租户下的用户信息
     * @param array $params
     * @return bool|string
     */
    public function get(array $params = [])
    {
        return $this->setUrl(Golive::USER_TENANT_USER_LIST)->send($params);
    }
}