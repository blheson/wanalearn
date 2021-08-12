<?php


namespace Cheap_Learning_Fast\Controllers;

use Cheap_Learning_Fast\Helpers\Middleware;

class User_Controller
{

    public static function create($data)
    {
        //         @type — int $ID User ID. If supplied, the user will be updated.

        // @type — string $user_pass The plain-text user password.

        // @type — string $user_login The user's login username.

        // @type — string $user_nicename The URL-friendly user name.

        // @type — string $user_url The user URL.

        // @type — string $user_email The user email address.

        // @type
        // string $display_name The user's display name. Default is the user's username.

        // @type
        // string $nickname The user's nickname. Default is the user's username.

        // @type
        // string $first_name The user's first name. For new users, will be used to build the first part of the user's display name if $display_name is not specified.

        // @type
        // string $last_name The user's last name. For new users, will be used to build the second part of the user's display name if $display_name is not specified.

        // @type — string $description The user's biographical description.

        // @type
        // string $rich_editing Whether to enable the rich-editor for the user. Accepts 'true' or 'false' as a string literal, not boolean. Default 'true'.

        // @type
        // string $syntax_highlighting Whether to enable the rich code editor for the user. Accepts 'true' or 'false' as a string literal, not boolean. Default 'true'.

        // @type
        // string $comment_shortcuts Whether to enable comment moderation keyboard shortcuts for the user. Accepts 'true' or 'false' as a string literal, not boolean. Default 'false'.

        // @type
        // string $admin_color Admin color scheme for the user. Default 'fresh'.

        // @type
        // bool $use_ssl Whether the user should always access the admin over https. Default false.

        // @type
        // string $user_registered Date the user registered. Format is 'Y-m-d H:i:s'.

        // @type — string $user_activation_key Password reset key. Default empty.

        // @type
        // bool $spam Multisite only. Whether the user is marked as spam. Default false.

        // @type
        // string $show_admin_bar_front Whether to display the Admin Bar for the user on the site's front end. Accepts 'true' or 'false' as a string literal, not boolean. Default 'true'.

        // @type — string $role User's role.

        // @type — string $locale User's locale. Default empty. }
        global $error_from_form, $url;
        if ($error = Middleware::registration_validation($data)) {
            $error_from_form = $error->errors;
            // return $error_from_form;
            echo json_encode(array('error' => true, 'message' => $error_from_form));
        } else {
            $id = wp_insert_user($data);
            // wp_set_current_user($id);
            $data = array(
                'user_login' => $data['user_login'],
                'user_password' => $data['user_pass'],
            );
            self::log_user($data);

            echo json_encode(array('error' => false, 'message' => $id));
        }
    }
    public static function read()
    {
        var_dump('here');
    }
    public static function log_user($data = [])
    {
        return wp_signon($data, is_ssl());
    }
    public static function login()
    {
        // var_dump($_POST);
        $result = self::log_user();
 
        if (isset($result->errors)) {
            echo json_encode(array('error' => true, 'message' => 'Password, username or email is not correct'));
        } else {
            echo json_encode(array('error' => false, 'message' => 'success'));
        }
    }
    public static function logout()
    {
        wp_logout();
        echo json_encode(array('error' => false, 'message' => true));
    }
    public static function check_if_user_is_logged_in($user, $get = null)
    {
        if (!$user->exists()) {
            $query = '';
            if (isset($get)) {
                foreach ($get as $key => $v) {
                    $query .= "{$key}={$v}&";
                }
                $query = '?' . $query;
                $query = trim($query, ' \t\n\r\0\x0B&');
            }
            wp_redirect(site_url('account/login'.$query));
            exit;
        }
    }
}
