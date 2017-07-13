# summit
Test for Summit

for easier reading
https://docs.google.com/document/d/1q5VyX94wy9BA1lLJEnpkhJUQQARaI32ZRgPezy8uaok/edit?usp=sharing


Question 1 Cache
For the cache question I had to make a few quick classes to make sure I had everything correct.
These are in the git repo under methods/cache.php and  methods/cache/*
 
I would make a cache.ini file that allows developers to store the important config parameters so that these variables are not in the code can be updated and potentially ignored by git so that config files are not on a git repo for security purposes. An example of the config file is in /class/cache.php $config =... I put it there to simplify things

I would make an abstract class Cache so I can define the important methods that all the children classes need. For the example I chose get(), put(), and has() as methods that every child needs to implement. 

I then created a static method store in Cache so Cache::store(‘memcache’) can be called to get the child class memcache and returns it so you can chain other methods off of it. I feel this is easier to remember one method to call and pass in the type. The call loads from the config the info for the child classes and lazy loads the child methods. I would also passed part of the config parameters called cache_config when i initialize the class. This is where developers can pass in the specific parameters for their cache classes. This should give structure and flexibility for other methods.
See methods/cache.php for implementation.
http://schaugaard.com/summit/index.php -- is calling Cache::store('memcache')->get('test');

Question 2 Extend
I would use dependency injection to past then needed class such as passing a database object  into the class so that the class can use it. If only one method would use the other classes I would just pass the class in as a parameter to that method. 

MYSQL 
Question 1 
I would add indexes to “city” for sure it would definitely be faster as an index and would outweigh the overhead in other functions. I don’t think “type” has enough different cardinality to make a difference in query time, but it would add time to insert, update and delete to have it indexed. I would not index this one unless it grew and had more options or testing the index proved to be better. 

Question 2 
I think think as long as you are not joining tables this should be able to work. I would definitely cache the result if possible to cut down on time of re-query. 

Code Exercise:

Load 
To see the code in action see http://schaugaard.com/summit/responsive.html 








