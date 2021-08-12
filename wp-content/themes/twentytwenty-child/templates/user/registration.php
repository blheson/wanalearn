<?php
/**
 * Template Name: Registration
 * Template Post Type: post, page, product
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


$post = $result  = '';
if (isset($_POST['user_login'])) {
    $post = $_POST;
    $result = User_Controller::create($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela">
    <link rel="stylesheet" defer href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        * {
            box-sizing: border-box;
            letter-spacing: -1px;
        }

        body {
            max-width: 600px;
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

        .form-group {
            padding-bottom: 16px;
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

        .text-center {
            text-align: center;
        }

        .title {
            font-size: 20px;
            font-weight: 700;
        }

        .big-title {
            background: #0ec7ad;
            padding: 11px;
            color: #fff;
            margin: 22px auto;
        }

        .container {
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
</head>

<body>

    <section>
        <div>
            <?php
            if (is_array($result)) {

                foreach ($result as $error => $val) {

                    echo '<p style="color:red">' . $val[0] . '</p>';
                }
            } else if ($result == 'no error') {
            ?>
                <a href="<?= wp_login_url() ?>">Login to your dashboard</a>
            <?php
            }
            ?>
        </div>
        <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
            <div>
                <label for="username">Username <strong>*</strong></label>
                <input type="text" name="user_login" value="<?php echo (isset($post['user_login']) ? $post['user_login'] : null) ?>">
            </div>
            <div>

                <label for="username">First Name <strong>*</strong></label>
                <input type="text" name="first_name" value="<?php echo (isset($post['first_name']) ? $post['first_name'] : null) ?>">
            </div>
            <div>

                <label for="username">Last Name <strong>*</strong></label>
                <input type="text" name="last_name" value="<?php echo (isset($post['last_name']) ? $post['last_name'] : null) ?>">
            </div>
            <div>
                <label for="password">Password <strong>*</strong></label>
                <input type="password" name="user_pass" value="">
            </div>

            <div>
                <label for="email">Email <strong>*</strong></label>
                <input type="email" name="user_email" value="<?php echo (isset($post['user_email']) ? $post['user_email'] : null) ?>">
            </div>
            <div>
                <label for="type">Type <strong>*</strong></label>
                <select name="custom_role" id="">
                    <option value="customer">Customer</option>
                    <option value="affiliate">Affiliate</option>
                    <option value="vendor">Vendor</option>
                </select>

            </div>
            <div>
                <button type="submit">Submit</button>
            </div>

        </form>
    </section>

</body>

</html>