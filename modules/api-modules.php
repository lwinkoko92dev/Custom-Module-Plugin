<?php
// Custom API Modules

if (!defined('ABSPATH')) {
    exit;
}

class ApiModules {
    public function __construct() {
        add_action('init', [$this, 'init']);
    }

    public function init() {
        // API Module initialization functionality
		add_action('rest_api_init', [$this, 'register_api_endpoints']);
    }

    public function register_api_endpoints() {
        register_rest_route('custom-plugin/v1', '/example-endpoint', [
            'methods' => 'GET',
            'callback' => [$this, 'example_endpoint_callback'],
        ]);
    }

    public function example_endpoint_callback(WP_REST_Request $request) {
        return new WP_REST_Response(['message' => 'Hello, this is an example endpoint!'], 200);
    }
}

new ApiModules();
