<?php

/**
 * Template Name: Product,Post
 * Template Post Type: product
 *
 * The template for displaying all single products
 * 
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     Templates
 * @version     1.6.4
 */

use Cheap_Learning_Fast\Plugin;
use Cheap_Learning_Fast\Controllers\Flutterwave_Controller;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// get_header('head');  
$id = $post->ID;
$product = wc_get_product($id);

if ($logged_in = is_user_logged_in()) {
    $user = wp_get_current_user();
    $email = $user->user_email;
    $first_name = $user->user_firstname;
    $phone = $user->user_phone;
    $user_id = $user->ID;
}

if (is_bool($product))
    return;

$price = $product->get_price();
$name = $product->get_name();
$sub_title = $product->get_short_description();
$root_for_asset = get_stylesheet_directory_uri();
$site_url = site_url();
$rest_api = $site_url . '/wp-json/' . Plugin::get_instance()->get_api_route_namespace();
$_ttl = 'Product Order';

$get_template_part = array('head' => 'template-parts/partials/head');
get_header('simple', compact('get_template_part'));

?>
<style>
    body {
        max-width: 600px;
        margin: auto;
    }

    ul.account {
        border: 2px dashed #5c6c68;
        padding: 20px;
        border-radius: 7px;
        background: #f0f0f0
    }

    ul.account li {
        font-weight: 600;
        display: block;
        padding-bottom: 10px;
        color: #405959;
    }

    .fadeOut {
        animation-name: fadeOut;
        animation-duration: 2000ms;
        transition-timing-function: ease-in;
        animation-fill-mode: both;
    }

    @keyframes fadeOut {
        0% {
            opacity: 1;
        }

        80% {
            opacity: 1
        }

        100% {
            opacity: 0
        }
    }

    .info-to-product {
        text-align: center;
        font-weight: 500;
        z-index: 10000;
    }

    .info-to-product.error,
    .info-to-product.success {
        position: fixed;
        bottom: 33%;
        padding: 1rem 0.5rem;
        box-shadow: 3px 3px 8px 3px #17353630;
        color: #fff
    }

    .error {
        background: #cc207f
    }

    .success {
        background: #2e979b
    }

    #flutter_wave_info {
        text-align: center;
        font-size: 17px;
        font-weight: 700;
    }

    button[disabled],
    html input[disabled] {
        cursor: not-allowed;
        opacity: 0.5;
    }

    .disabled_form {
        opacity: 0.6;
    }
</style>
<section class="payment_details_section">
    <div>
        <h2 class="text-center big-title">Order Process</h2>
        <div class="contain">
            <div class="flex-space-end mobile">
                <div class="subsec-wrapper">
                    <h3 class="text-center">Order Summary</h3>
                    <div class="summary-box">
                        <p class="title">Product Name: <?= $name ?></p>
                        <hr style="width: 200px;">
                        <p>
                            <span style="font-size: 19px;color: #989898;"> <?= $sub_title; ?></span>
                        </p>

                        <p class="flex-space-end"><span>Price:</span> <span class="price emphasis"> <?= 'N ' . number_format((float)$price); ?></span></p>
                    </div>
                </div>

                <div class="subsec-wrapper" id="order_processing" style="padding: 10px;">
                    <h3>Step 1 : Login/Register</h3>

                    <?php
                    if ($logged_in) {

                    ?>

                        <p style="font-weight: 700;
    color: #178a7a;">You are logged in</p>
                    <?php
                    } else {
                        get_template_part('template-parts/account/template-parts/register_login', null);
                    }
                    ?>
                    <form action="" id="payment-form" method="POST" name="payment-form" class="<?php echo $logged_in ? '' : 'disabled_form' ?>">
                        <input type="hidden" name="rest" value="<?= $rest_api ?>">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <input type="hidden" name="user_id" value="<?= isset($user_id) ? $user_id : '' ?>">
                        <input type="hidden" name="currency" value="NGN">
                        <input type="hidden" name="amount" value="<?php echo $price ?>">
                        <div>
                            <h3>Step 2 : Your Contact Details</h3>
                            <div class="form-group">
                                <div class="input-wrapper"><input type="text" class="input-text form-control " name="first_name" id="first_name" placeholder="First Name*" value="<?php echo isset($first_name) ? $first_name : '' ?>" autocomplete="given-name" required></div>

                            </div>
                            <div class="form-group">
                                <div class="input-wrapper"><input type="text" class="input-text form-control" name="last_name" id="" placeholder="Last Name" value="" autocomplete="last_name"></div>
                            </div>
                            <div class="form-group">
                                <div class="input-wrapper"><input type="email" class="input-text form-control" name="email" id="email" placeholder="Email*" value="<?php echo isset($email) ? $email : '' ?>" autocomplete="email username" required></div>

                            </div>
                            <div class="form-group">
                                <div class="input-wrapper"><input type="tel" class="input-text form-control" name="phone" id="phone" placeholder="Phone Number*" value="<?php echo isset($phone) ? $phone : '' ?>" autocomplete="phone number" required></div>
                            </div>
                        </div>
                        <div>
                            <h3>Step 3: Select Payment Method</h3>
                            <div class="custom-box">
                                <select name="payment" class="custom-select form-control">
                                    <option value="vbank">V-Bank</option>
                                    <option value="flutterwave-ngn">Flutterwave (NGN)</option>
                                    <!--   <option value="f-usd">Flutterwave (USD)</option> -->
                                </select>
                            </div>

                        </div>
                        <button type="submit" id="checkout-button" class="checkout-btn" <?php echo $logged_in ? '' : 'disabled' ?>><?php echo $logged_in ? 'PLACE ORDER' : 'PLEASE LOG IN TO CONTINUE' ?></button>
                    </form>
                </div>
            </div>
            <div class="" id="thank_you" style="display: none;">
                <h3 class="text-center" style="color: #21a0a0;font-weight: 700;">
                    Your Order was Successful
                </h3>
                <p class="text-center">Your order ID is <span class="order_id">...</span></p>
                <div id="thank_you_info">
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="site_url" value="<?= $site_url ?>">
</section>
<?php
$site_url = site_url();
$public_key = Flutterwave_Controller::get_instance()->get_publishable_key();
$rest_route = $site_url . '/wp-json/' . Plugin::get_instance()->get_api_route_namespace();
?>

<script defer src="https://checkout.flutterwave.com/v3.js" id="flutterwave-js"></script>
<!-- get helper object -->
<script src="<?php echo $root_for_asset ?>/assets/js/helper.js">

</script>
<script>
    const selector = document.querySelector;
    (function() {
        let rest_route = '<?php echo $rest_route ?>';

        const $ = selector => document.querySelector(selector);
        const data = {
            order_id: null,
            url: $('input[name=rest]').value
        }

        $('form#payment-form').addEventListener('submit', e => {
            e.preventDefault();
            submitForm(e.target)
            // verifyTestFlutterwaveTransaction()
        })

        function submitForm(form_dom) {
            helper.sort_btn($('button.checkout-btn'), 'Processing...   <i class="icon-loader menu-icon rotate"></i>');
            let form_data = new FormData(form_dom);
            placeOrder(form_data);
        }

        function placeOrder(form_data) {
            fetch(`${data.url}order`, {
                method: 'POST',
                body: form_data
            }).then(response => {
                return response.json();
            }).then(result => {
                console.log(result)
                if (!result.error) {
                    data.order_id = result.message
                    helper.sort_btn($('button.checkout-btn'), 'Order Placed, wait for Payment', true);
                    processPaymentMethod() //sort out the payment option chosen
                } else {
                    middleware.info('There was an error placing your order');
                }
            }).catch(error => {
                console.log(error)
                helper.sort_btn($('button.checkout-btn'), 'PLACE ORDER', false)
                middleware.info('There was an error placing your order');
            })
        }

        function processPaymentMethod() {
            switch ($('select[name=payment]').value) {
                case 'vbank':
                    helper.show_thankyou(data.order_id);
                    break;
                case 'flutterwave-ngn':
                    middleware.info('Order has been placed, wait for payment.', 'success');
                    makeFlutterWavePayment()
                    break;
                default:
                    break;
            }
        }

        function makeFlutterWavePayment() {
            const options = {
                public_key: "<?php echo $public_key ?>",
                tx_ref: `${data.order_id}_${Math.random()}`,
                amount: $('input[name=amount]').value,
                currency: $('input[name=currency]').value,
                country: "NG",
                customer: {
                    email: $('input[name=email]').value,
                    phone_number: $('input[name=phone]').value,
                    name: $('input[name=first_name]').value,
                },
                callback: function(response) {
                    console.log(response)
                    if (response.status == 'successful') {
                        middleware.info('Payment has been sent, please wait while we confirm', 'success', false);
                        console.log('notfini', 'waiting')
                        $('.payment_details_section').style.opacity = '0.3'
                        verifyFlutterwaveTransaction(response)
                    } else {
                        middleware.info('Error: payment was not successful')
                    }
                },
                onclose: function() {
                    helper.sort_btn($('button.checkout-btn'), 'Order has been saved', false)
                    console.log('modal closed');
                }
            }
            FlutterwaveCheckout(options);
        }


        function verifyTestFlutterwaveTransaction() {
            fetch(`${data.url}pay?tx_ref=106_0.2762324674891816&transaction_id=2382023`).then(response => response.json()).then(result => {
                helper.sort_btn($('button.checkout-btn'), 'Payment successful', false);
                helper.show_thankyou(106, 'flutterwave');
                middleware.info('payment was successful', 'success')
            }).catch(error => {
                console.log(error)
                middleware.info('Error')
            })
        }

        function verifyFlutterwaveTransaction(response) {
            fetch(`${data.url}pay?tx_ref=${response.tx_ref}&transaction_id=${response.transaction_id}`).then(response => response.json()).then(result => {
                console.log('payment result: ', result);
                helper.sort_btn($('button.checkout-btn'), 'Payment successful', false);
                middleware.info('Payment was verified', 'success')

                helper.show_thankyou(data.order_id, 'flutterwave');
            }).catch(error => {
                middleware.info('Error in verifying payment')
            })
        }
        if (document.getElementById('signin')) {
            document.forms['signin'].addEventListener('submit', (e) => {
                e.preventDefault();

                helper.sort_btn(e.target.querySelector('button.auth-form-btn-in'), 'processing... <i class="icon-loader menu-icon rotate"></i>')
                let fd = new FormData(e.target);
                fetch(`${rest_route}user/login`, {
                    method: 'POST',
                    body: fd
                }).then(response => {
                    if (response.status !== 200) 
                        throw new Error();
                    return response.json();
                }).then(result => {
                    if (result.error == true) {
                        helper.show_error(result.message)
                        message = 'SIGN IN'
                        disabled = false
                    } else {
                        message = 'redirecting...'
                        disabled = true
                        window.location.reload()
                    }
                    helper.sort_btn(e.target.querySelector('button.auth-form-btn-in'), message, disabled)
                }).catch(error => {
                    helper.sort_btn(e.target.querySelector('button.auth-form-btn-in'), 'SIGN IN', false)
                })
            })
            document.forms['register'].addEventListener('submit', (e) => {
                e.preventDefault();
                helper.sort_btn(e.target.querySelector('button.auth-form-btn-register'), 'Please wait...   <i class="icon-loader menu-icon rotate"></i>')

                let fd = new FormData(e.target);
                fetch(`${rest_route}user`, {
                    method: 'POST',
                    body: fd
                }).then(response => {
                    if (response.status !== 200) {
                        throw new Error;
                    }
                    return response.json();
                }).then(result => {
                    if (result.error == true) {
                        helper.show_error(result.message)
                        message = 'SIGN IN'
                        disabled = false
                    } else {
                        message = 'redirecting...'
                        disabled = true
                        window.location.reload()
                    }
                    helper.sort_btn(e.target.querySelector('button.auth-form-btn-register'), message, disabled)
                }).catch(error => {
                    helper.show_error(error.message)
                    helper.sort_btn(e.target.querySelector('button.auth-form-btn-register'), 'SIGN IN', false)
                })
            })
        }
    })(selector);
</script>
<?php
get_footer('simple');
/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
