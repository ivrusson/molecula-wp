<?php
/**
* molecula-wp
*
*
* @package   molecula-wp
* @author    Ivrusson
* @license   GPL-3.0
* @link      https://github.com/ivrusson
*/

namespace MoleculaWP;

 /**
  * Autoloader
  *
  * @param string $class The fully-qualified class name.
  * @return void
  *
  *  * @since 1.0.0
  */
 spl_autoload_register(function ($class) {
     $prefix = __NAMESPACE__;
     $base_dir = __DIR__ . '/';
     $len = strlen($prefix);
     if (strncmp($prefix, $class, $len) !== 0) {
         return;
     }
     $relative_class = substr($class, $len);
     $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

     // if the file exists, require it
     if (file_exists($file)) {
         require $file;
     }
 });

 /**
  * Initialize Plugin
  *
  * @since 1.0.0
  */
 function init() {
 	App::get_instance();
    AppLoader::get_instance();
 	RestApi::get_instance();
 	Shortcode::get_instance();
 }
 add_action( 'plugins_loaded', 'MoleculaWP\\init' );

/**
 * Register activation and deactivation hooks
 */
register_activation_hook( __FILE__, array( 'MoleculaWP\\App', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'MoleculaWP\\App', 'deactivate' ) );