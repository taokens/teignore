<?php


namespace Taokens\Teignore;


use Taokens\Teignore\Tools\Curl;

class TenantGateWay
{
    /**
     * SaaS开放平台配置参数
     * @var mixed
     */
    protected $appKey;
    protected $appSecret;
    protected $url;

    const ENCRYPTION_TYPE = 'md5';

    public function __construct(array $config)
    {
        $this->appKey = $config['appKey'];
        $this->appSecret = $config['appSecret'];
        $this->url = $config['baseUrl'] . static::QUERY_URL;
    }

    /**
     * 获取Unix时间戳
     * @return int|void
     */
    protected function getTimestamp()
    {
        return time();
    }

    /**
     * 获取随机字符串
     * @return string|void
     */
    protected function getRandStr()
    {
        return md5(time(), true);
    }

    /**
     * 生成签名
     * @return string|void
     */
    protected function getToSign()
    {
        $parameter = [
            'appSecret' => $this->appSecret,
            'timestamp' => $this->getTimestamp(),
            'randStr'   => $this->getRandStr()
        ];
        sort($parameter, SORT_STRING);
        return md5(implode($parameter));
    }

    /**
     * 组合系统参数
     * @return array
     */
    protected function setParameter()
    {
        $header =  [
            'appKey:'    . $this->appKey,
            'timestamp:' . $this->getTimestamp(),
            'randStr:'   . $this->getRandStr(),
            'sign:'      . $this->getToSign(),
            'encryptionType:' . self::ENCRYPTION_TYPE
        ];
        return $header;
    }

    /**
     * 发送请求
     */
    protected function send($params)
    {
        $result = Curl::curl_post($this->url, $params ,$this->setParameter());
        return $result;
    }

}