<?php

/**
 * Template Name: Home
 * Template Post Type: page
 *
 * The template for displaying all single products
 * 
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     Templates
 * @version     1.6.4
 */
$_ttl = $post->post_title;
get_header('complex');

?>
<style>
    section {
        padding: 1rem 0 4rem;
    }

    .hero-bg {

        height: 50vh;
        display: flex;
        background-repeat: no-repeat;
        align-items: center;
        justify-content: center;
        background-size: auto;
        background-position-y: -92px;
        background-attachment: fixed;
    }

    .hero-lay {
        background: #334046d9;
        height: 50vh;
        width: 100%;
        background-blend-mode: multiply;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .hero-title {
        text-align: center;
        font-size: 66px;
        font-weight: bold;
        color: #fff
    }

    .get-started,
    .get-started:hover {

        display: block;
        color: #ffffff;
        font-size: 14px;
        text-decoration: none;
        padding: 1rem;
        margin: 1rem;
        background: #e91e63;
    }

    section.perks {
        padding: 0;
        height: 350px;
        overflow: hidden;
    }

    .left-content {
        margin: 6rem 7rem 10rem 1rem;
    }

    .faq-box {
        padding: 1rem;
        background-color: #fff;
        margin: 10px
    }

    @media (max-width:480px) {
        .left-content {
            margin: 2rem;
        }
    }
</style>
<section style="padding-top: 0;">
    <div class="hero-bg">
        <div class="hero-lay">
            <div class="text-center">
                <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/wana-logo-white.png'; ?>" alt="" width="130px">
            </div>
            <h2 class="hero-title text-center text-white">Learn Anything</h2>
            <div>
                <a class="get-started" href="<?php echo site_url() ?>/account">GET STARTED </a>
            </div>
        </div>
    </div>
</section>
<section>
    <div>
        <h2 class="text-center">WHAT WE DO</h2>
        <div>
            <div class="text-center" style="margin:auto;max-width:500px;font-size:25px;color:dimgray">
                We teach basic things that has the potential to change your life for good
            </div>
        </div>
    </div>
</section>
<section style="background: #e7edee;">
    <div class="">
        <h2 class="text-center">OUR PRODUCTS</h2>
        <div class="container">
            <?php

            $query = new WC_Product_Query(array(
                'limit' => 10,
                'orderby' => 'date',
                'order' => 'DESC',

            ));
            $products = $query->get_products();
            if (is_array($products)) :
                get_template_part('template-parts/product-list', null, compact('products'));
            endif;
            ?>
        </div>
    </div>
</section>
<section class="perks">
    <div class="" style="width: 100%;">
        <div class="row">
            <div class="col-lg-6 hidden-sm hidden-xs">
                <div style="border-radius: 5px;overflow:hidden">
                    <img src="https://images.unsplash.com/photo-1521790361543-f645cf042ec4?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" alt="" loading="lazy" width="100%">
                </div>

            </div>
            <div class="col-lg-6">
                <div class="left-content">
                    <h3 style="font-size: 30px;">Get Paid As You Promote High Quality Products</h3>
                    <div style="font-size: 17px;color:darkgray">


                        <p>You just need to sign up, get a link and start promoting with that link. We have high value digital products on Wanalearn that you can promote. </p>
                        <p>We have a robust tracking system that will track all your sales.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<section style="background-color: #e7edee;">
    <div>
        <h2 class="text-center">
            Frequently Asked Questions
        </h2>
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-lg-4 col-xs-6 col-sm-6">
                    <div class="faq-box">
                        <h4>What Happens If a Product I Bought does not Meet My Expectation?</h4>
                        <p>
                            Products on Wanalearn are backed by our 30-day money back guarantee.

                            This means that if you are not satisfied with the product, you can ask for a full refund within 30 days of purchase and you will be refunded.</p>
                        <p>

                            However, if we find out that you take advantage of this to get free access to products, you will be banned from the platform.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xs-6 col-sm-6">

                    <div class="faq-box">
                        <h4>Can I List Physical Knowledge Products?</h4>
                        <p>
                            No. The Wanalearn platform is strictly for the sales and distribution of digital products only.
                        </p>


                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xs-6 col-sm-6">

                    <div class="faq-box">
                        <h4> What Happens If I am Not Satisfied With a Product I Purchased on Wanalearn?</h4>
                        <p>
                            Majority of the products on Wanalearn (except otherwise stated) are backed by our 30-day money back guarantee.
                        </p>
                        <p>
                            What this means is that if you are not satisfied with the product you purchased from Wanalearn, you can ask for a full refund within 30 days of purchase and we will send you the refund.
                        </p>
                        <p>
                            However, we also take note of serial "refunders" and such people are banned from the platform.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xs-6 col-sm-6">

                    <div class="faq-box">
                        <h4> What Happens If I am Not Satisfied With a Product I Purchased on Wanalearn?</h4>
                        <p>
                            Majority of the products on Wanalearn (except otherwise stated) are backed by our 30-day money back guarantee.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelector('.hero-bg').style.cssText = 'background: url(https://images.unsplash.com/photo-1600195077909-46e573870d99?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80);'
    })
</script>
<?php
get_footer('complex');
