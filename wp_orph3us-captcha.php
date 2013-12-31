<?php
/*
Plugin Name: WP orph3us Captcha Plugin
Plugin URI: https://github.com/0rph3us/wp_orph3us-captcha
Description: A alternative free Captcha Plugin
Version: 0.1
Author: Michael Rennecke
Author URI: http://0rph3us.net/
License: GPL2
*/
/*
Copyright 2014  Michael Rennecke  (email : michael.rennecke@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if(!class_exists('WP_Orpheus_Captcha'))
{
	class WP_Orpheus_Captcha
	{
		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{
        	// Initialize Settings
            require_once(sprintf("%s/settings.php", dirname(__FILE__)));
            $WP_Orpheus_Captcha_Settings = new WP_Orpheus_Captcha_Settings();
        	
        	// Register custom post types
            require_once(sprintf("%s/post-types/post_type_template.php", dirname(__FILE__)));
            $Post_Type_Template = new Post_Type_Template();
		} // END public function __construct
	    
		/**
		 * Activate the plugin
		 */
		public static function activate()
		{
			// Do nothing
		} // END public static function activate
	
		/**
		 * Deactivate the plugin
		 */		
		public static function deactivate()
		{
			// Do nothing
		} // END public static function deactivate
	} // END class WP_Orpheus_Captcha
} // END if(!class_exists('WP_Orpheus_Captcha'))

if(class_exists('WP_Orpheus_Captcha'))
{
	// Installation and uninstallation hooks
	register_activation_hook(__FILE__, array('WP_Orpheus_Captcha', 'activate'));
	register_deactivation_hook(__FILE__, array('WP_Orpheus_Captcha', 'deactivate'));

	// instantiate the plugin class
	$wp_orpheus_captcha = new WP_Orpheus_Captcha();
	
    // Add a link to the settings page onto the plugin page
    if(isset($wp_orpheus_captcha))
    {
        // Add the settings link to the plugins page
        function plugin_settings_link($links)
        { 
            $settings_link = '<a href="options-general.php?page=wp_orph3us-captcha">Settings</a>'; 
            array_unshift($links, $settings_link); 
            return $links; 
        }

        $plugin = plugin_basename(__FILE__); 
        add_filter("plugin_action_links_$plugin", 'plugin_settings_link');
    }
}
