<?php

// Sample for testing the refactored PHP cache engine.
require_once('cache-engine.php');

// Cache expires in 2 hours.
$cache_expire_time = 60 * 60 * 2;

// Create a new cache engine instance.
$cache_engine = new PHP_Cache_Engine($cache_expire_time, $_SERVER['REQUEST_URI'], true);

// Start the cache.
$cache_engine->start();

?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP Cache Engine Test</title>
</head>

<body>

    <h1>Sample HTML with PHP Code for PHP Cache Engine</h1>

    <p>This is a sample page to test the functionality of the PHP Cache Engine.</p>
    <p>The current time is: <?php echo date('Y-m-d H:i:s'); ?></p>

</body>

</html>
<?php

// Complete the cache.
$cache_engine->complete();
