<?php


namespace Taokens\Teignore\Api;


use Taokens\Teignore\TenantGateWay;
use Taokens\Teignore\Tools\Golive;

class Download extends TenantGateWay
{
    /**
     * 创建下载任务
     * @param array $params
     * @return bool|string
     */
    public function create(array $params = [])
    {
        return $this->setUrl(Golive::DC_CREATE)->send($params);
    }

    /**
     * 更新下载任务进度
     * @param array $params
     * @return bool|string
     */
    public function progress(array $params = [])
    {
        return $this->setUrl(Golive::DC_PROGRESS)->send($params);
    }

    /**
     * 下载结果通知
     * @param array $params
     * @return bool|string
     */
    public function close(array $params = [])
    {
        return $this->setUrl(Golive::DC_CLOSE)->send($params);
    }
}