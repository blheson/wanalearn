<?php

/**
 * Template Name: Login
 * Template Post Type: page
 *
 * The template for displaying all single products
 * 
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     Templates
 * @version     1.6.4
 */

use Cheap_Learning_Fast\Plugin;
use Cheap_Learning_Fast\Controllers\User_Controller;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$data = $result  = '';
if (isset($_POST['user_login'])) {
    $data = $_POST;
    $result = User_Controller::create($_POST);
}
if (is_user_logged_in()) {
    header('Location: ' . site_url('account/dashboard'));
}
$_ttl = $post->post_title;
$options = array('load_style' => true);
get_header('simple', compact('options'));
get_template_part('template-parts/account/login', null, compact('result', 'data'));
get_footer('simple');
