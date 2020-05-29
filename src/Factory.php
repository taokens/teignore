<?php


namespace Taokens\Teignore;

use Taokens\Teignore\Api\Auth;
use Taokens\Teignore\Api\BaseData;

/**
 * Class Factory
 * @property Auth auth
 * @property BaseData baseData
 * @package Taokens\Teignore
 */
class Factory
{
    private $config;

    /**
     * Factory constructor.
     * @param array|null $config
     * @throws \Exception
     */
    public function __construct($config = null)
    {
        if(empty($config)){
            throw new \Exception('config no exist');
        }
        $this->config = $config;
        return $this;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function __get($method)
    {
        try {
            $classname = __NAMESPACE__ . "\\Api\\" . ucfirst($method);
            if (!class_exists($classname)) {
                throw new \Exception('method undefined');
                return false;
            }
            $obj = new $classname($this->config, $this);
            return $obj;
        } catch (\Exception $e) {
            throw new \Exception('method undefined');
        }
    }
}