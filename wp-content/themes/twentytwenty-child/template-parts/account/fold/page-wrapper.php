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
$user = $args['user'];
//----page wrapper------
echo '  <div class="main-panel">
<div class="content-wrapper">
';

//main page content
get_template_part('template-parts/account/' . strtolower($args['_ttl']), null, compact('user'));

echo '</div>';// end content wrapper

get_template_part('template-parts/account/partials/footer');

echo '</div>';//end main panel
//----page wrapper------