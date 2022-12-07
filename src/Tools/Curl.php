<?php

namespace Taokens\Teignore\Tools;

use Swoole\Coroutine\Http\Client;
use function curl_init;
use function curl_setopt;
use function parse_url;

class Curl
{

    /**
     * 发送get
     * @param $url
     * @param array $header
     * @return bool|string
     */
    public static function curl_get($url, $header = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        // https请求 不验证证书和hosts
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);// 要求结果为字符串且输出到屏幕上
        if (!empty($header)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        } else {
            curl_setopt($ch, CURLOPT_HEADER, 0); // 不要http header 加快效率
        }
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    /**
     * 发送post
     * @param $url
     * @param $post_data
     * @param array $header
     * @return bool|string
     */
    public static function curl_post($url, $post_data, $header = [], $isFileUpload = false)
    {
        if (!extension_loaded('swoole')) {
            $output = self::fpm_curl_post($url, $post_data, $header);
        } else {
            if (PHP_SAPI == 'cli') {
                $urlsInfo = parse_url($url);
                $queryUrl = $urlsInfo['path'];
                if (isset($urlsInfo['query'])) {
                    $queryUrl .= '?' . $urlsInfo['query'];
                }
                $domain = $urlsInfo['host'];
                if (isset($urlsInfo['port'])) {
                    $port = $urlsInfo['port'];
                } else {
                    $port = ($urlsInfo['scheme'] == 'https' ? 443 : 80);
                }
                $isSsl = $urlsInfo['scheme'] == 'https' ? true : false;
                $cli = new Client($domain, $port, $isSsl);
                $cli->setHeaders($header);
                $cli->set(['timeout' => 15]);
                if ($isFileUpload) {
                    $cli->addFile($post_data['file'], $post_data['name']);
                }
                $cli->post($queryUrl, $post_data);
                $output = $cli->body;
                $cli->close();
            } else {
                $output = self::fpm_curl_post($url, $post_data, $header);
            }
        }
        return $output;
    }

    /**
     * fpm-发送post
     * @param $url
     * @param $post_data
     * @param array $header
     * @return bool|string
     */
    public static function fpm_curl_post($url, $post_data, $header = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        // https请求 不验证证书和hosts
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);// 要求结果为字符串且输出到屏幕上
        if (!empty($header)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        } else {
            curl_setopt($ch, CURLOPT_HEADER, 0); // 不要http header 加快效率
        }
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}