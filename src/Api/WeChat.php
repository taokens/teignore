<?php


namespace Taokens\Teignore\Api;

use Exception;
use Taokens\Teignore\TenantGateWay;

class WeChat extends TenantGateWay
{
    /**
     * 具体业务请求URL
     */
    const QUERY_URL = '/api/open-api/wechat/js/sdk';

    /**
     * SaaS获取租户下微信 access_token
     *
     * @param array $params
     * @return bool|string
     * @throws Exception
     */
    public function getToken(array $params = [])
    {
        if (!isset($params['baseUrl'])) {
            throw new Exception("传入参数必须 携带所请求平台的基础域名");
        }
        $params['url'] = rtrim($params['baseUrl'], '/') . '/api/open-api/wechat/token';
        unset($params['baseUrl']);
        return $this->send($params);
    }

    /**
     * SaaS获取租户下微信 js-sdk
     *
     * @param array $params
     * @return bool|string
     */
    public function getJsSDK(array $params = [])
    {
        return $this->send($params);
    }
}