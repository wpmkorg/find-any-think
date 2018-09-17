<?php
/*
Plugin Name: WPMK Finder
Plugin URI: https://wpmk.org/
Description: This free Plugin Provide You find any think in you post, by title of post or content of post word by word with Ajax and much more....
Version: 1.0.1
Author: WPMKORG
Author URI: https://wpmk.org/
License: GPLv2 or later
*/

    // Define Plugin Dir Paht.
    define('CP_URL_PATH', plugin_dir_url(__FILE__));
    define('CP_URL', CP_URL_PATH . "inc/");
    
    // It is Plugin Configration File.
    include_once('inc/config/create-plugin-config.php');

    // Plugin FrountEnd File.
    include_once('inc/config/create-plugin-frountend.php');
    
    // Plugin Admin File.
    include_once('inc/config/create-plugin-admin.php');
    
?>