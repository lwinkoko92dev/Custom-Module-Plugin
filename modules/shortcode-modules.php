<?php
// Custom Shortcode Modules

if (!defined('ABSPATH')) {
    exit;
}

class CustomShortcodeModules {
    public function __construct() {
        add_action('init', [$this, 'init']);
    }

    public function init() {
        // Shortcode Module functionality
        $this->register_shortcode();
    }

    private function register_shortcode() {
        add_shortcode('module1_shortcode', [$this, 'shortcode_callback']);
    }

    public function shortcode_callback($atts = [], $content = null) {
        // Shortcode functionality
        $atts = shortcode_atts(
            [
                'attr1' => 'default_value1',
                'attr2' => 'default_value2',
            ], 
            $atts, 
            'module1_shortcode'
        );

        // Output the content
        return '<div>' . esc_html($atts['attr1']) . ' ' . esc_html($atts['attr2']) . '</div>';
    }
}

new CustomShortcodeModules();
