<?php
require 'methods/cache.php'; 
Cache::store('memcache')->get('test');
?>
