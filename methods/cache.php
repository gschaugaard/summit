<?php
abstract class Cache{

	static function store($type){
		// this would be in a config.ini file
		$config = array(
			'types' => array(
				'filecache' => array(
					"method_name" => "Filecache",
					"method_path" => "/cache/filecache.php",
					"cache_config" => array(
						"file_path" => "/path_to_store_file/"
					)

				),
				'memcache' => array(
					"method_name" => "Memcache",
					"method_path" => "/cache/memcache.php",
					"cache_config" => array(
						"file_path" => "/path_to_store_file/"
					)
				),
				'redis' => array(
					"method_name" => "Redis",
					"method_path" => "/cache/redis.php",
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
		//var_dump($type);
		//var_dump($config['types'][$type]);
		require dirname(__FILE__)."/".$config['types'][$type]['method_path'];
		//var_dump($config['types'][$type]['method_name']); 
		return new $config['types'][$type]['method_name']($config['types'][$type]['cache_config']);
	}
	abstract function get($key);
	abstract function put($key, $value);
	abstract function has($key);
}
?>