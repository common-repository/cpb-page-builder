<?php
/**
 * Plugin Name: CPB(Custom Page Builder)
 * Description: Custom Page Builder Plugin.
 * Version: 1.0.0
 * Author: Farhan Girach
 * Author URI: http://fg-webdesigner.com/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @author 
 * @copyright Copyright (c) 2017, Farhan Girach
**/

/* Do not access this file directly */
if ( ! defined( 'WPINC' ) ) { die; }

/* Constants
------------------------------------------ */

/* Set plugin version constant. */
define( 'CPBBASE_VERSION', '1.0.0' );

/* Set constant path to the plugin directory. */
define( 'CPBBASE_PATH', trailingslashit( plugin_dir_path(__FILE__) ) );

/* Set the constant path to the plugin directory URI. */
define( 'CPBBASE_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );


/* Includes
------------------------------------------ */

/* Functions */
require_once( CPBBASE_PATH . 'includes/functions.php' );

/* Page Builder */
if( is_admin() ){
	require_once( CPBBASE_PATH . 'includes/main.php' );
}

/* Functions */
require_once( CPBBASE_PATH . 'includes/front.php' );

