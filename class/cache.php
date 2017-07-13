<?php
abstract class Cache{

	static function store($type){
		// this would be in a config.ini file
		$config = array(
			'types' => array(
				'filecache' => array(
					"class_name" => "Filecache",
					"class_path" => "/cache/filecache.php",
					"cache_config" => array(
						"file_path" => "/path_to_store_file/"
					)

				),
				'memcache' => array(
					"class_name" => "Memcache",
					"class_path" => "/cache/memcache.php",
					"cache_config" => array(
						"file_path" => "/path_to_store_file/"
					)
				),
				'redis' => array(
					"class_name" => "Redis",
					"class_path" => "/cache/redis.php",
					"cache_config" => array(
						'client' => 'predis',
					    'default' => array(
					        'host' =>  'localhost',
					        'password' =>'REDIS_PASSWORD',
					        'port' => 6379,
					        'database' => 0,
					    ),

					)
				) 
			)
		);
		// load the class
		require dirname(__FILE__)."/".$config['types'][$type]['class_path'];
		//initiate and return the class
		return new $config['types'][$type]['class_name']($config['types'][$type]['cache_config']);
	}
	abstract function get($key);
	abstract function put($key, $value);
	abstract function has($key);
}
?>