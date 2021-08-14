<?php
if (!function_exists('check_log_in_by_child')) {
    function check_log_in_by_child()
    {
        if (!is_user_logged_in()) {
            wp_redirect(site_url('account/login'));
            exit;
        }
    }
}

wp_enqueue_script('gtag', "https://www.googletagmanager.com/gtag/js?id=G-167Y4G26TN");
wp_enqueue_script('analytics', get_stylesheet_directory() . '/assets/js/g-analytics.js');
