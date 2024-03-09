<?php

function spl_scripts()
{
    wp_enqueue_style('spl-style', plugins_url('/social-profile-links/css/styles.css'));
    wp_enqueue_script('spl-script', plugins_url('social-profile-links/js/main.js'), array('jquery'), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'spl_scripts');
