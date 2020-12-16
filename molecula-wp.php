<?php
/**
* molecula-wp
*
*
* @package   molecula-wp
* @author    Ivrusson
* @license   GPL-3.0
* @link      https://github.com/ivrusson
*
* @wordpress-plugin
* Plugin Name:       Molecula WP
* Plugin URI:        https://github.com/ivrusson/molecula-wp
* Description:       React boilerplate for WordPress plugins
* Version:           1.0.2
* Author:            ivrusson
* Author URI:        https://github.com/ivrusson
* Text Domain:       molecula-wp
* License:           GPL-3.0
* License URI:       https://www.gnu.org/licenses/gpl-3.0.txt
* Domain Path:       /languages
*/

 // If this file is called directly, abort.
 if (!defined('WPINC')) {
 	die;
 }

 define('MOWP_VERSION', '1.0.0');
 define('MOWP_DIR', plugin_dir_path( __FILE__ ));
 define('MOWP_URL', plugin_dir_url( __FILE__ ));
 define('MOWP_ASSETS', plugins_url('/', __FILE__));
 define('MOWP_ROUTES_PATH', plugin_dir_path( __FILE__ ) . '/includes/Routes/');
 define('MOWP_API_PATH', '/mo/api');
 

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/includes/_autoload.php';

