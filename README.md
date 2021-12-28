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

## Authors

Amin Zayeromali

![Profile views](https://visitor-badge.glitch.me/badge?page_id=aminzayer.aminzayer)

[![Github](https://img.shields.io/github/followers/aminzayer?label=Follow&style=social)](https://github.com/aminzayer)

Twitter: [@AminZayeromali](https://twitter.com/aminzayeromali)

Instagram: [aminzayer](https://www.instagram.com/aminzayer/)

Linkedin: [aminzayeromali](https://ir.linkedin.com/in/aminzayeromali)

Google Scolar: [Amin Zayeromali](https://scholar.google.com/citations?user=IDR8QvcAAAAJ&hl=en)

Email : [Amin {dot} zayeromali {At} gmail {dot} com](&#109;&#097;&#105;&#108;&#116;&#111;:&#097;&#109;&#105;&#110;&#046;&#122;&#097;&#121;&#101;&#114;&#111;&#109;&#097;&#108;&#105;&#064;&#103;&#109;&#097;&#105;&#108;&#046;&#099;&#111;&#109;)


<h2> Connect with me </h2>
<a href = 'https://www.linkedin.com/in/aminzayeromali'> <img width = '32px' align= 'center' src="https://raw.githubusercontent.com/rahulbanerjee26/githubAboutMeGenerator/main/icons/linked-in-alt.svg"/></a> 
<a href = 'https://twitter.com/AminZayeromali'> <img width = '32px' align= 'center' src="https://raw.githubusercontent.com/rahulbanerjee26/githubAboutMeGenerator/main/icons/twitter.svg"/></a> 
<a href = 'https://aminzayer.ir/'> <img width = '32px' align= 'center' src="https://raw.githubusercontent.com/rahulbanerjee26/githubAboutMeGenerator/main/icons/portfolio.png"/></a> 
<a href = 'https://www.github.com/aminzayer'> <img width = '32px' align= 'center' src="https://raw.githubusercontent.com/rahulbanerjee26/githubAboutMeGenerator/main/icons/github.svg"/></a>
<br>


## License

This project is licensed under the MIT License - see the LICENSE.md file for details
