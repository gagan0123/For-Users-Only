<?php
/**
 * Plugin Name: For Users Only
 * Description: Allows access to the site for logged in users only
 * Plugin URI: https://wordpress.org/plugins/for-users-only/
 * Version: 1.1
 * Author URI: https://gagan.pro
 * Author: Gagan Deep Singh
 *
 * @package For_Users_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	die; // Exit if accessed directly.
}

require_once plugin_dir_path( __FILE__ ) . 'class-for-users-only.php';

For_Users_Only::get_instance();
