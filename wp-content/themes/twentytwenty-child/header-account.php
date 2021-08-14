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
$root_for_asset = get_stylesheet_directory_uri()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Wanalearn Admin</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="" id="load-font-for-all-pages">
    <link rel="stylesheet" href="<?php echo $root_for_asset ?>/assets/css/common.css">

    <link rel="stylesheet" href="<?php echo $root_for_asset ?>/assets/vendors/feather/feather.css">
    <!-- <link rel="stylesheet" href="<?php echo $root_for_asset ?>/assets/vendors/ti-icons/css/themify-icons.css"> -->
    <!-- <link rel="stylesheet" href="<?php echo $root_for_asset ?>/assets/vendors/css/vendor.bundle.base.css"> -->
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo $root_for_asset ?>/assets/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="" />
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri() . '/assets/img/wana-icon.png' ?>">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-167Y4G26TN"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-167Y4G26TN');
    </script>
</head>

<body class="sidebar-dark">
    <div class="container-scroller">