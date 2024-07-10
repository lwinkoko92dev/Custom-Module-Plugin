<?php

// This autoload file will load all custom module files under ../modules/

if (!defined('ABSPATH')) {
    exit;
}

class ModuleManager {
    private $modules = [];

    public function __construct() {
        $this->scan_modules();
        add_action('admin_menu', [$this, 'add_admin_menu']);
        add_action('admin_init', [$this, 'register_settings']);
        $this->load_modules();
    }

    private function scan_modules() {
        $modules_dir = plugin_dir_path(__FILE__) . '../modules/';
        foreach (glob($modules_dir . '*.php') as $file) {
            $module = basename($file, '.php');
            $this->modules[$module] = ucwords(str_replace('_', ' ', $module));
        }
    }

    public function add_admin_menu() {
        add_options_page(
            'Modular Plugin Settings',
            'Modular Plugin',
            'manage_options',
            'modular-plugin',
            [$this, 'settings_page']
        );
    }

    public function register_settings() {
        foreach ($this->modules as $module => $name) {
            register_setting('modular_plugin', 'modular_plugin_' . $module);
        }
    }

    public function settings_page() {
        ?>
        <div class="wrap">
            <h1>Modular Plugin Settings</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('modular_plugin');
                foreach ($this->modules as $module => $name) {
                    $option = get_option('modular_plugin_' . $module, 'off');
                    ?>
                    <p>
                        <input type="checkbox" id="modular_plugin_<?php echo $module; ?>" name="modular_plugin_<?php echo $module; ?>" value="on" <?php checked($option, 'on'); ?>>
                        <label for="modular_plugin_<?php echo $module; ?>"><?php echo $name; ?></label>
                    </p>
                    <?php
                }
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    private function load_modules() {
        foreach ($this->modules as $module => $name) {
            $option = get_option('modular_plugin_' . $module, 'off');
            if ($option === 'on') {
                include_once plugin_dir_path(__FILE__) . '../modules/' . $module . '.php';
            }
        }
    }
}

new ModuleManager();
