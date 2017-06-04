<?php

/**
 * Plugin Name: WP Pug
 * Plugin URI: https://github.com/sourceboat/wp-pug/
 * Description: Use Pug template engine in WordPress.
 * Version: 1.0.1
 * Author: Sourceboat
 * Author URI: https://sourceboat.com/
 * License: MIT License
 */

add_action('plugins_loaded', function () {
    // add plugin namespace to autoloader
    $autoloader = \Sourceboat\WordPress\Autoloader\Psr4Loader::getInstance();
    $autoloader->addNamespace('WpPug', __DIR__ . '/src');

    // include API functions
    require_once 'api.php';

    // add WP-CLI commands
    if (class_exists('WP_CLI')) {
        WP_CLI::add_command('pug cache clear', WpPug\CLI\Cache\ClearCommand::class);
        WP_CLI::add_command('pug cache warmup', WpPug\CLI\Cache\WarmupCommand::class);
    }
});
