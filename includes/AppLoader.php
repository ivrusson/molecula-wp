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
 * @subpackage AppLoader
 */
class AppLoader
{

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
    public static function get_instance()
    {

        // If the single instance hasn't been set, set it now.
        if (null == self::$instance) {
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
    private function __construct()
    {
        $plugin = App::get_instance();
        $this->plugin_slug = $plugin->get_plugin_slug();
        $this->version = $plugin->get_plugin_version();
    }


    /**
     * Handle WP actions and filters.
     *
     * @since 	1.0.0
     */
    private function do_hooks()
    {
        add_filter('rewrite_rules_array', array($this, '_rewrite_rules'));
        add_filter('query_vars', array($this, '_query_vars'));
        add_action('redirect_canonical', array($this, '_redirect_canonical'), 10, 2);
        add_filter('template_include', array($this, 'main_app'));
        add_action('template_include', array($this, 'atomo'));
        // add_action('parse_request', array($this, 'atomo'));
        add_action('init', array($this, 'add_endpoint'), 0);
    }


    /**
     * Add needed rewrite rules
     *
     * @since     1.0.0
     */
    public function _rewrite_rules($rules)
    {

        $newrules = array();
        // $newrules['demo/([^/])?$'] = 'index.php?pagename=demo&fr1=$matches[1]';
        // $newrules['demo/([^/])/([^/])?$'] = 'index.php?pagename=demo&fr1=$matches[1]&fr2=$matches[2]';
        return $newrules + $rules;
    }

    public function add_endpoint()
    {
        add_rewrite_rule('^demo/([^/]*)$', 'index.php?pagename=demo&fr1=$matches[1]', 'top');
        add_rewrite_rule('^demo/([^/]*)/([^/]*)$', 'index.php?pagename=demo&fr1=$matches[1]&fr2=$matches[2]', 'top');
        add_rewrite_rule('^demo/([^/]*)/([^/]*)/([^/]*)$', 'index.php?pagename=demo=1&fr1=$matches[1]&fr2=$matches[2]&fr3=$matches[3]', 'top');

        add_rewrite_rule('^moapp/([^/]*)$', 'index.php?__mowpatomo=1&mowp_app=$matches[1]', 'top');
        add_rewrite_rule('^moapp/([^/]*)/([^/]*)$', 'index.php?__mowpatomo=1&mowp_app=$matches[1]&fr1=$matches[2]', 'top');
        add_rewrite_rule('^moapp/([^/]*)/([^/]*)/([^/]*)$', 'index.php?__mowpatomo=1&mowp_app=$matches[1]&fr1=$matches[2]&fr2=$matches[3]', 'top');

        //////////////////////////////////
        //flush_rewrite_rules( false ); //// <---------- REMOVE THIS WHEN DONE
        //////////////////////////////////
    }


    /**
     * Add needed rewrite rules
     *
     * @since     1.0.0
     */
    public function _query_vars($vars)
    {
        $vars[] = '__mowpatomo';
        $vars[] = 'mowp_app';
        return $vars;
    }


    /**
     * Prevent wordpress from redirect to trailing slash form apps pages
     *
     * @since     1.0.0
     */
    public function _redirect_canonical($redirect_url, $requested_url)
    {
        if (preg_match('|/demo|', $requested_url)) {
            return $requested_url;
        }
        if (preg_match('|/moapp|', $requested_url)) {
            return $requested_url;
        }
        return $redirect_url;
    }


    /**
     * Main app template render
     *
     * @since     1.0.0
     */
    public function main_app($template)
    {
        global $post, $wp_query;
        // var_dump('--------------------');
        // var_dump($post);
        // var_dump('--------------------');
        if(isset($post->post_name)) {
            if ($post->post_name === 'demo') {
                return MOWP_DIR . 'includes/templates/main.php';
            }
        }        
        return $template;
    }


    /**
     * Atomo app template render
     *
     * @since     1.0.0
     */
    public function atomo($template)
    {
        global $post, $wp;
        if (isset($wp->query_vars['mowp_app'])) {
            $GLOBALS['mowp_app'] = $wp->query_vars['mowp_app'];
            // var_dump('--------------------');
            // var_dump($wp->query_vars);
            // var_dump($post);
            // var_dump('--------------------');
            return MOWP_DIR . 'includes/templates/atomo.php';
        }
        return $template;
    }

}
