<?php
/*
  Plugin Name: Only for Users
  Description: Allows access to the site for logged in users only
  Version: 1.0
  Author URI: http://gagan.pro
  Author: Gagan Deep Singh
 */

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

require_once plugin_dir_path( __FILE__ ) . 'class-only-for-users.php';

add_action( 'plugins_loaded', array( 'Only_For_Users', 'get_instance' ) );