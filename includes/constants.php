<?php

    defined('APP_NAME') || define('APP_NAME',(getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'Queue App'));
   
    $page = explode('/', substr($_SERVER['REQUEST_URI'], 1), 2);

    if(is_file($_SERVER['DOCUMENT_ROOT'] .'/vars.json') === false)
        if(empty($page[0]))
            $path = file_get_contents(dirname(dirname(__FILE__)) . '/vars.json');
        else
            $path = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/'.str_replace("-"," ", $page[0]) .'/vars.json');
    else
        $path = file_get_contents($_SERVER['DOCUMENT_ROOT'] .'/vars.json');

    $vars = json_decode($path, false, 512, false);

    if($vars->downtime == 1 and $vars->app_env !== 'testing'){
        header('Location:downtime.php');
    }
    
    define( 'BASE_URL', siteURL(). $vars->app_root );
    (defined('DB_HOST')) ? null : define('DB_HOST', $vars->database_host);
    (defined('DB_PORT')) ? null : define('DB_PORT', $vars->database_port->{APP_NAME});
    (defined('DB_USER')) ? null : define('DB_USER', $vars->database_user);
    (defined('DB_PASSWORD')) ? null : define('DB_PASSWORD', $vars->database_password->{APP_NAME});
    (defined('DB_NAME')) ? null : define('DB_NAME', $vars->database_name->{APP_NAME});
    (defined('APP_ENV')) ? null : define('APP_ENV', $vars->app_env);
    ini_set('display_errors', $vars->ini_display_errors);
    ini_set('error_repporting', $vars->ini_error_reporting);
    
    function siteURL()
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'];
        return $protocol.$domainName;
    }
?>