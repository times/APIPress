<?php
/**
 * Plugin Name: APIPress
 * Description: Sets up required properties for the APIPress functionality
 * Author: Chris Hutchinson
 * Author URI: http://www.chrishutchinson.me
 * Version: 0.0.1
 * Plugin URI: https://timesdev.tools
 */

class APIPress {

	function __construct() {
		// Setup defaults
		$this->plugin = new StdClass;
		$this->plugin->title = 'APIPress';
		$this->plugin->name = 'apipress';
        $this->plugin->folder = WP_PLUGIN_DIR . '/' . $this->plugin->name;
        $this->plugin->url = WP_PLUGIN_URL . '/' . str_replace(basename( __FILE__), "", plugin_basename(__FILE__));
		$this->plugin->version = '0.0.1';

		// Filters
		add_filter( 'json_query_vars', array( $this, 'filterJsonQueryVars' ) );
	}
	
	/**
	 * Adds values to the JSON Query Vars property, allowing for meta to be searched
	 */
	function filterJsonQueryVars($vars) {
		$vars[] = 'meta_key';
		$vars[] = 'meta_value';
		return $vars;
	}

}

$APIPress = new APIPress();