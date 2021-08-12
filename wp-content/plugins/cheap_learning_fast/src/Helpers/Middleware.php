<?php

namespace Cheap_Learning_Fast\Helpers;

class Middleware
{
    public static function registration_validation($data)
    {
        global $reg_errors;
        $reg_errors = new \WP_Error;
        $username = $data['user_login'];
        $password = $data['user_pass'];
        $email = $data['user_email'];
        $status = false;
        if (empty($username) || empty($password) || empty($email)) {
            $reg_errors->add('field', 'Required form field is missing');
            $status = true;
        }
        if (4 > strlen($username)) {
            $reg_errors->add('username_length', 'Username too short. At least 4 characters is required');
            $status = true;
        }
        if (username_exists($username)) {
            $reg_errors->add('user_name', 'Sorry, that username already exists!');
            $status = true;
        }
        if (!validate_username($username)) {
            $reg_errors->add('username_invalid', 'Sorry, the username you entered is not valid');
            $status = true;
        }
        if (5 > strlen($password)) {
            $reg_errors->add('password', 'Password length must be greater than 5');
            $status = true;
        }
        if (email_exists($email)) {
            $reg_errors->add('email', 'Email Already in use');
            $status = true;
        }
        if ($status) {
            return $reg_errors;
        }
        return $status;
    }
}
