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
    protected $randStr;

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
     * @param int $length
     */
    protected function getRandStr($length = 16)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        $this->randStr = $str;
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
            'randStr'   => $this->randStr
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
        $this->getRandStr();
        $header =  [
            'appKey:'    . $this->appKey,
            'timestamp:' . $this->getTimestamp(),
            'randStr:'   . $this->randStr,
            'sign:'      . $this->getToSign(),
            'encryptionType:' . self::ENCRYPTION_TYPE
        ];
        return $header;
    }

    /**
     * 发送请求
     * @param $params
     * @return bool|string
     */
    protected function send($params)
    {
        $result = Curl::curl_post($this->url, $params ,$this->setParameter());
        return $result;
    }

}