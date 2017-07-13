<?php
class Memcache extends Cache{
	public $config; 
	function __construct($config) {
        $this->config = $config;
        var_dump($this->config);
    }
	public function get($key){
		return 'get';
	}
	public function put($key, $value){}
	public function has($key){}
}
?>