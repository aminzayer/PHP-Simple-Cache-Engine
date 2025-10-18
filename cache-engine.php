<?php

declare(strict_types=1);

/**
 * A simple file-based cache engine for PHP.
 *
 * @author Amin Zayeromali
 * @link https://aminzayer.ir
 */
class PHP_Cache_Engine
{
    /**
     * @var bool Determines whether to show cache logs at the end of the cached page.
     */
    private bool $show_log;

    /**
     * @var int The cache expiration time in seconds.
     */
    private int $expire_time;

    /**
     * @var float The start time of the caching process.
     */
    private float $time_start;

    /**
     * @var string The full path to the cache folder.
     */
    private string $cache_folder_path;

    /**
     * @var string The full path to the cached file.
     */
    private string $cache_file_path;

    /**
     * Initializes the Cache Engine.
     *
     * @param int    $cache_expire_time The cache expiration time in seconds.
     * @param string $request_uri       The request URI to be cached.
     * @param bool   $show_cache_log    Whether to show cache logs.
     */
    public function __construct(int $cache_expire_time, string $request_uri, bool $show_cache_log = false)
    {
        $this->expire_time = $cache_expire_time;
        $this->show_log = $show_cache_log;

        $this->cache_folder_path = __DIR__ . '/cache/';
        if (!is_dir($this->cache_folder_path)) {
            mkdir($this->cache_folder_path, 0777, true);
        }

        $cache_file_name = md5($request_uri);
        $this->cache_file_path = $this->cache_folder_path . $cache_file_name . '.html';
    }

    /**
     * Starts the caching process.
     *
     * If a valid cache file exists, it is served directly. Otherwise, output
     * buffering is started to capture the new content.
     *
     * @return void
     */
    public function start(): void
    {
        $this->time_start = microtime(true);

        if (file_exists($this->cache_file_path) && (time() - $this->expire_time < filemtime($this->cache_file_path))) {
            readfile($this->cache_file_path);
            exit;
        }

        ob_start();
    }

    /**
     * Completes the caching process.
     *
     * The captured output buffer is saved to the cache file.
     *
     * @return void
     */
    public function complete(): void
    {
        $content = ob_get_contents();
        $cache_creation_time = time();

        if ($this->show_log) {
            $log_message = sprintf(
                "<!-- Cached By Cache Engine at %s and Refresh on %s - Page Made Time : %.5f Seconds -->",
                date('Y-m-d H:i:s', $cache_creation_time),
                date('Y-m-d H:i:s', $cache_creation_time + $this->expire_time),
                microtime(true) - $this->time_start
            );
            $content .= "\n" . $log_message;
        }

        file_put_contents($this->cache_file_path, $content);
        ob_end_flush();
    }

    /**
     * Clears the entire cache directory.
     *
     * @return void
     */
    public function clear_cache(): void
    {
        $files = glob($this->cache_folder_path . '*.html');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }
}
