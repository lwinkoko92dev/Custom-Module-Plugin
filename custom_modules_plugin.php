<?php
/*
 * Plugin Name: Custom Modules Plugin
 * Plugin URI: https://wordpress.org
 * Description: A custom plugin development with modular structure.
 * Version: 1.0
 * Author: Lwin Ko Ko
 * Author URI: https://wordpress.org
 * License: GPL2+
 *
 * @package WP_Test
*/

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Include module manager
include_once plugin_dir_path(__FILE__) . 'includes/module-manager-autoload.php';