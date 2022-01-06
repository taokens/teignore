<?php

namespace Taokens\Teignore\Api;

use Taokens\Teignore\TenantGateWay;
use Taokens\Teignore\Tools\Golive;

class DingTalk extends TenantGateWay
{
    /**
     * 钉工牌付款码解析
     *
     * @param array $params
     * @return bool|string
     */
    public function getCodeInfo(array $params = [])
    {
        return $this->setUrl(Golive::DING_TALK)->send($params);
    }
}