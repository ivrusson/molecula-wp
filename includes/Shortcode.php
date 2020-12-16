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
 * @subpackage Shortcode
 */
class Shortcode {

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
	private function __construct() {
		$plugin = App::get_instance();
		$this->plugin_slug = $plugin->get_plugin_slug();
		$this->version = $plugin->get_plugin_version();

		add_shortcode( 'mowp-atomo', array( $this, 'shortcode' ) );
	}


	/**
	 * Handle WP actions and filters.
	 *
	 * @since 	1.0.0
	 */
	private function do_hooks() {
		add_action( 'wp_enqueue_scripts', array( $this, 'register_frontend_scripts' ) );
	}

	/**
	 * Register frontend-specific javascript
	 *
	 * @since     1.0.0
	 */
	public function register_frontend_scripts() {
		wp_register_script( $this->plugin_slug . '-atomo-js', plugins_url('apps/atomo-sc/dist/mowp-atomo-shortcode.js', dirname( __FILE__ ) ), array( 'jquery' ), $this->version );
		wp_register_style( $this->plugin_slug . '-atomo-css', plugins_url('apps/atomo-sc/dist/mowp-atomo-shortcode.css', dirname( __FILE__ ) ), $this->version );
	}

	public function shortcode( $atts ) {
		global $mowp_atomos;
		wp_enqueue_script( $this->plugin_slug . '-atomo-js' );
		wp_enqueue_style( $this->plugin_slug . '-atomo-css' );
		
		$atomo_id = 'mowp-atomo-' . uniqid();

		$atomo = shortcode_atts( array(
			'id'       => $atomo_id,
			'title'       => 'Hello atomo (' . $atomo_id . ')!',
		), $atts, 'mowp-atomo' );

		if (empty( $mowp_atomos )) {
			$mowp_atomos = array();
		}
		array_push($mowp_atomos, $atomo);

		wp_localize_script( $this->plugin_slug . '-atomo-js', 'mowp_atomos', $mowp_atomos );

		$shortcode = '<div class="mowp-atomo" id="' . $atomo_id . '"></div>';
		return $shortcode;
	}
}
