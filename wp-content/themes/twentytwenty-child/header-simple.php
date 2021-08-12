<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
/**
 * @param array get_template_part is an array of template link
 * @type string 'head' - link to template part at the head
 * @type string 'foot' - link to template part at the foot
 */
$load_style  = false;
$root_for_asset = get_stylesheet_directory_uri();
// var_dump($args['options'])
if (isset($args['options']))
    $load_style = $args['options']['load_style'];


?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($_ttl) ? $_ttl : 'Wanalearn Online' ?></title>
    <link rel="stylesheet" href="" id="load-font-for-all-pages">


    <?php
    if ($load_style) {
        //load this for account dashboard pages

        echo '<link rel="stylesheet" href="' . $root_for_asset . '/assets/css/vertical-layout-light/style.css">';

        echo '<link rel="stylesheet" href="' . $root_for_asset . '/assets/vendors/feather/feather.css">';
        echo '<link rel="stylesheet" defer href="' . $root_for_asset . '/assets/css/common.css">';
    } else {
        //load this for other pages
        echo '<link rel="stylesheet" defer href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">';
        echo '<link rel="stylesheet" defer href="' . $root_for_asset . '/assets/css/common.css">';
        echo '<link rel="stylesheet" href="' . $root_for_asset . '/assets/css/simple.css">';
    }
    ?>
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri() . '/assets/img/wana-icon.png' ?>">
</head>


<body <?php body_class(); ?>>

    <div id="page" class="site">


        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <?php
                    if (isset($args['get_template_part']))
                        get_template_part($args['get_template_part']['head']);
                    ?>