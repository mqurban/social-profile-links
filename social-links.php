<?php
/*
Plugin Name: Social Profile Link
Description: Adds social icons with link to profiles
Author: Muhammad Qurban
Author URI: https://www.linkedin.com/in/mr-qurban/
Version: 1.0
*/


// Exit if Accessed Directly
if (!defined('ABSPATH')) {
    exit;
}


// Load Scripts
require_once(plugin_dir_path(__FILE__) . '/includes/social-links-scripts.php');

// Load Class
require_once(plugin_dir_path(__FILE__) . '/includes/social-links-class.php');


// Register Widget 
function register_social_links_widget()
{
    register_widget('social_links_widget');
}

add_action('widgets_init', 'register_social_links_widget');
