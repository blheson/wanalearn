<?php

/**
 * Template Name: Account
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

use function Automattic\Jetpack\Extensions\Eventbrite\get_current_url;

$user = wp_get_current_user();
$get=isset($_GET['order_id'])?$_GET:null;
User_Controller::check_if_user_is_logged_in($user,$get);
// if (!$user->exists()) {
//     if
//     wp_redirect(site_url('account/login?order_id='.(int)$_GET['order_id']));
//     exit;
// }
$_ttl = $post->post_title;
if (strtolower($_ttl) == 'account')
    $_ttl = 'dashboard';
get_header('account');

// partial:partials/navbar
get_template_part('template-parts/account/partials/navbar');
// end partial:partials/navbar
echo '<div class="container-fluid page-body-wrapper">';
// partial:partials/sidebar
get_template_part('template-parts/account/partials/sidebar');
// end partial:partials/sidebar

get_template_part('template-parts/account/fold/page-wrapper', null, compact('_ttl','user'));

get_footer('account');
