<?php
class Redis extends Cache{
	public $config; 
	function __construct($config) {
        $this->config = $config;
    }
	public function get($key){}
	public function put($key, $value){}
	public function has($key){}
}
?>