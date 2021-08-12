<?php
if (!function_exists('check_log_in_by_child')) {
    function check_log_in_by_child()
    {
        if (!is_user_logged_in()) {
            wp_redirect(site_url('account/login'));exit;
        }
    }
}
