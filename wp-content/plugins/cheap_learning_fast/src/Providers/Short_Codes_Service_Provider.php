<?php


Namespace Cheap_Learning_Fast\Providers;

use Cheap_Learning_Fast\Helpers\View;


class Short_Codes_Service_Provider{
    /**
     * Registers wordpress action hooks and filters.
     *
     * @return mixed|void
     *
     * @since 1.0.0
     */
    public function register() {
        add_action( 'init', [ $this, 'run' ] );
    }

    /**
     * Callback function for the registered hooks and filters
     *woocommerce/myaccount/my-account.php.
     * @return void
     * 
     * @since 1.0.0
     */
    public function run() {
        add_shortcode('clf_user_registration', array($this, 'do'));
        // add_shortcode( 'facebook_group_buy_ads', [ $this, 'do' ] );
    }

    public function do( $atts, $content, $shortcode_tag ) {
        if ( ! is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
            View::render( 'pages.user_register' );
        }
    }
}