<?php
// This Class is Simple Cache Engine For PHP page Serving Develop By Amin Zayeromali :> https://aminzayer.ir
class PHP_Cache_Engine
{
    // Properties
    public bool $show_log;   // Show Cache Log on End of the cached Page
    public $uri_cache_file;  // Address of cached file
    public $expire_time;     // Expire Time For Cached file
    private $time_start;     // Time of Caching Start 
    private $cache_folder_Path;   // Cache Folder Adress
    private $cache_file_name;    // Cache File Name
    private $root_dir;       // Root Address of PHP File


    //__construct
    function __construct($cache_expire_time, $show_cache_log)  // initializing Cache Engine
    {
        // show log on end of cached files
        $this->show_log = $show_cache_log;
        // get Root dir
        $this->root_dir = basename(__DIR__);
        // create cache folder
        $this->cache_folder_Path = $this->current_dir . "/cache/";
        if (!is_dir($this->cache_folder_Path))  // check cache folder exist
        {
            mkdir($this->cache_folder_Path, 0777, true);
        }
        $this->cache_file_name = md5($_SERVER['REQUEST_URI']); // create unique name for cached file in cache folder
        $this->uri_cache_file = $this->cache_folder_Path . "/" . $this->cache_file_name . ".html";   // Create Page Address For Caching on
        $this->expire_time = $cache_expire_time; // set Expire time for cache engine
    }

    // Methods
    function Set_Show_Cache_Log($show_cache_log)
    {
        $this->show_log = $show_cache_log; // set time star
    }
    function Set_Expire_Time($cache_expire_time)
    {
        $this->expire_time = $cache_expire_time;
    }
    function Cache_Start() // Caching Start ---> when this method called, cached file checking & refreshing again
    {
        $this->time_start = microtime();
        if (file_exists($this->uri_cache_file) && (time() - $this->expire_time < filemtime($this->uri_cache_file))) {
            include($this->uri_cache_file);
            exit;
        }
        ob_start();
    }
    function Cache_Complete() // Caching Complete & log in cached file
    {
        // open the cache file for writing
        $fp = fopen($this->uri_cache_file, 'w');
        // save the contents of output buffer to the file
        if ($this->show_log) {
            echo "<!-- Cached By Cache Engine at " . date('jS F Y H:i', filemtime($this->uri_cache_file)) . " and Refresh on " . date('jS F Y H:i', filemtime($this->uri_cache_file) + $this->expire_time) . " - Page Made Time : " . (microtime() - $this->time_start) . " Seconds  // this engine Coded By Amin Zayeromali - https://aminzayer.ir -->";
        }
        fwrite($fp, ob_get_contents());
        // close the file
        fclose($fp);
        // Send the output to the browser
        ob_end_flush();
    }
}
