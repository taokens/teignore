<?php


namespace Taokens\Teignore\Api;

use Taokens\Teignore\Tools\Golive;
use Exception;
use Taokens\Teignore\TenantGateWay;

class WeChat extends TenantGateWay
{

    /**
     * SaaS获取租户下微信 access_token
     *
     * @param array $params
     * @return bool|string
     * @throws Exception
     */
    public function getToken(array $params = [])
    {
        return $this->setUrl(Golive::WECHAT_TOKEN)->send($params);
    }

    /**
     * SaaS获取租户下微信 js-sdk
     *
     * @param array $params
     * @return bool|string
     */
    public function getJsSDK(array $params = [])
    {
        return $this->setUrl(Golive::WECHAT_JSSDK)->send($params);
    }
}