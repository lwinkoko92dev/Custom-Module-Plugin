<?php
// Custom Function Modules

if (!defined('ABSPATH')) {
    exit;
}

class CustomFunctionModules {
    public function __construct() {
        add_action('init', [$this, 'init']);
    }

    public function init() {
        // Fuction Module functionality
        add_action('wp_footer', [$this, 'custom_footer_copyright_content']);
    }

    public function custom_footer_copyright_content() {
		$current_year = date("Y");
        echo '<div class="footer-copyright">Copyright © ' . $current_year . '. All Rights Reserved.</div>';
    }
}

new CustomFunctionModules();