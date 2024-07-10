# Custom Modules Plugin

A WordPress plugin with a modular structure. Easily enable or disable modules through the WordPress admin panel.

## Features

- Modular structure: Each module can be enabled or disabled independently.
- Easy to manage settings via the WordPress admin panel.
- Automatically detects and loads new modules without code changes.

## Installation

1. Download the plugin files and place them in the `wp-content/plugins/custom-modules-plugin` directory of your WordPress installation.
2. Activate the plugin through the 'Plugins' menu in WordPress.

## Usage

### Enabling/Disabling Modules

1. Go to `Settings > Modular Plugin` in the WordPress admin panel.
2. Check or uncheck the modules you want to enable or disable.
3. Save your changes.

### Adding a New Module

1. Create a new PHP file in the `modules` directory. For example, `modules/module3.php`.
2. Define your module class in the new file. Make sure to follow the structure used in other modules.
3. The plugin will automatically detect and include the new module.

Example module file (`modules/module3.php`):

```php
<?php

if (!defined('ABSPATH')) {
    exit;
}

class Module3 {
    public function __construct() {
        add_action('init', [$this, 'init']);
    }

    public function init() {
        // Module 3 functionality
    }
}

new Module3();
