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
if (!isset($get_template_part)) {
    $get_template_part = false;
}
?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=isset($_ttl)?$_ttl:'Wanalearn Online'?></title>
    <link rel="stylesheet" href="" id="load-font-for-all-pages">
    <link rel="stylesheet" defer href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
         
            margin: auto;
            font-family: 'Varela';
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
        }

        .flex-space-end {
            display: flex;
            justify-content: space-between;
        }

        header {
            padding-top: 48px;
        }

        .checkout-btn {
            margin-top: 32px;
            background: #ff226a;
            border: none;
            width: 100%;
            padding: 15px;
            border-radius: 4px;
            color: #fff;
        }

        input:not([type="image"]),
        select,
        input:not([type="image"]):focus-visible {
            height: 50px;
            border: none;
            padding: 13px;
            border-bottom: 1px solid #929292;
            outline: none;
            background-color: #fbfbfb;
            min-width: 250px;
            width: 100%;
            border-radius: 5px;
        }

     

        #payment-form {
            width: 100%
        }

        .emphasis {
            font-weight: bold;
        }

        .subsec-wrapper {
            width: 100%;
        }

        .summary-box {
            padding: 15px;
            border: 1px dashed #969696;
            background-color: #f0f0f0;
            margin: 10px;
            border-radius: 5px;
        }


        .title {
            font-size: 25px;
            font-weight: 700;
        }

        .big-title {
            background: #0ec7ad;
            padding: 11px;
            color: #fff;
            margin: 22px auto;
        }

        .contain {
            margin: 15px;
        }

        @media (max-width:480px) {
            .flex-space-end.mobile {
                flex-direction: column;
            }

            header {
                text-align: center;
            }

            input:not([type="image"]),
            select {
                margin: auto;

            }
        }
    </style>
     <link rel="icon" href="<?php echo get_stylesheet_directory_uri().'/assets/img/wana-icon.png'?>">
</head>
   
</head>

<body <?php body_class(); ?>>

    <div id="page" class="site">
        <?php if (is_array($get_template_part)) {
            get_template_part($get_template_part['head']);
        } ?>

        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">