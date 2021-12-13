# PHP-Simple-Cache-Engine
PHP Simple Cache Engine

# Introduction
PHP Coding is a simple object-oriented page caching system with a class that can be added to a PHP application.

# How To Use
First we add the engine cache class file to the page and declare it
//sample for testing php cache engine
```php
require_once('cache-engine.php');  // add class to codes
$Cache_Expire_Time = 60 * 60 * 2; // Cache Expire Time is 2 Hours
$My_Cache_Engine = new PHP_Cache_Engine($Cache_Expire_Time, true); // create cache engine class with loging
```
Then with start and complete methods we can drag the code between them as follows
```php
$My_Cache_Engine->Cache_Start(); // cache started

// All Code & html codes between cache start and cache complete cached in file
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1>Sample Html With PHP Code For PHP Cache Engine</h1>
    <p>My first paragraph.</p><br>
    <?php echo "<p> This is output of PHP Codes.</p>"; ?>
</body>
</html>
<?php
$My_Cache_Engine->Cache_Complete(); // cache complete
?>
```
