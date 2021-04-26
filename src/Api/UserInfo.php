<?php


namespace Taokens\Teignore\Api;

use Taokens\Teignore\Tools\Golive;
use Taokens\Teignore\TenantGateWay;

class UserInfo extends TenantGateWay
{

    /**
     * SaaS获取用户信息
     * @param array $params
     * @return bool|string
     */
    public function getUserInfo(array $params = [])
    {
        return $this->setUrl(Golive::USER_GET_DETAIL)->send($params);
    }

    /**
     * SaaS获取钉钉用户信息
     * @param array $params
     * @return bool|string
     */
    public function getDingUserInfo(array $params = [])
    {
        return $this->setUrl(Golive::DING_USER_GET_DETAIL)->send($params);
    }

    /**
     * 根据手机号获取用户信息接口
     * @param array $params
     * @return bool|string
     */
    public function getUserPhoneInfo(array $params = [])
    {
        return $this->setUrl(Golive::USER_GET_PHONE_DETAIL)->send($params);
    }

    /**
     * 用户人脸信息获取接口
     * @param array $params
     * @return bool|string
     */
    public function getUserFaceInfo(array $params = [])
    {
        return $this->setUrl(Golive::USER_FACE_GET)->send($params);
    }

    /**
     * 获取用户组织架构
     * @param array $params
     * @return bool|string
     */
    public function getUserDepInfo(array $params = [])
    {
        return $this->setUrl(Golive::USER_DEP_GET)->send($params);
    }
}