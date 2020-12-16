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

use Slim\Factory\AppFactory;

class RestApi {

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
			self::$instance->do_hooks();
		}

		return self::$instance;
	}

	/**
	 * Initialize the plugin by setting localization and loading public scripts
	 * and styles.
	 *
	 * @since     1.0.0
	 */
    function __construct() {
		$plugin = App::get_instance();
		$this->plugin_slug = $plugin->get_plugin_slug();
        $this->version = $plugin->get_plugin_version();
		$this->api_path = MOWP_API_PATH;
		$this->routes_path = MOWP_ROUTES_PATH;
		$this->slim = null;
	}

	/**
	 * Handle WP actions and filters.
	 *
	 * @since 	1.0.0
	 */
	private function do_hooks() {
		add_filter('rewrite_rules_array', array( $this, 'rewrite_rules' ));
		add_action('init', array( $this, 'init' ));
	}

	/**
	 * Return the plugin version.
	 *
	 * @since    1.0.0
	 *
	 * @return   RestApi api_path variable.
	 */
	public function get_api_path() {
		return $this->api_path;
	}

	public function rewrite_rules($rules) {
		$new_rules = array(
			'('.$this->api_path.')' => 'index.php',
		);
		$rules = $new_rules + $rules;
		return $rules;
	}

	public function init() {
		if (strstr($_SERVER['REQUEST_URI'], $this->api_path)) {
			$app = AppFactory::create();
			$this->slim = $app;
			$app->setBasePath($this->api_path);
			$middleware = $app->addErrorMiddleware(true,true,true);
			do_action('mowp_api_router', $app);
			
			$routes_dir = new \RecursiveDirectoryIterator($this->routes_path);
			$routes_iter = new \RecursiveIteratorIterator($routes_dir);
			$routes = new \RegexIterator($routes_iter, '/^.+\.router\.php$/', \RecursiveRegexIterator::GET_MATCH); // an Iterator, not an array
			foreach ( $routes as $route ) {
				require $route[0];
				$classname = Utils::get_string_between($route[0], $this->routes_path, '.router.php') . 'Router';
				$class = new $classname($app);
			}

			$this->slim->run();
			exit;
		}
	}

	
	
}
