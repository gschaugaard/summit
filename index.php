<?php
require 'class/cache.php'; 
Cache::store('memcache')->get('test');
?>
