<?php

namespace Cheap_Learning_Fast\Controllers;

use Cheap_Learning_Fast\Helpers\View;
use \WC_Payment_Gateway as Gate;

class Flutterwave_Controller extends Gate
{
    private static $instance = null;
    public function __construct()
    {
        $this->id = 'flutterwave';
        $this->method_title = 'Flutter Gateway';
        $this->supports = array(
            'products'
        );

        // Load the settings.
        $this->init();
        // This action hook saves the settings
        add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
    }


    public function init()
    {
        $this->init_settings();
        $this->add_settings_value();
        // Method with all the options fields
        $this->init_form_fields();
    }

    public function add_settings_value()
    {
        $this->title = $this->get_option('title');
        $this->description = $this->get_option('description');
        $this->enabled = $this->get_option('enabled');
        $this->testmode = 'yes' === $this->get_option('testmode');
        $this->sec_key = $this->private_key = $this->testmode ? $this->get_option('test_private_key') : $this->get_option('private_key');
        $this->pub_key = $this->publishable_key = $this->testmode ? $this->get_option('test_publishable_key') : $this->get_option('publishable_key');
    }
    public function get_publishable_key()
    {
        return $this->pub_key;
    }
    private function get_secret_key()
    {
        return $this->sec_key;
    }
    public function init_form_fields()
    {
        $this->form_fields = array(
            'enabled' => array(
                'title'       => 'Enable/Disable',
                'label'       => 'Enable Flutter Gateway',
                'type'        => 'checkbox',
                'description' => '',
                'default'     => 'no'
            ),
            'title' => array(
                'title'       => 'Title',
                'type'        => 'text',
                'description' => 'This controls the title which the user sees during checkout.',
                'default'     => 'Credit Card',
                'desc_tip'    => true,
            ),
            'description' => array(
                'title'       => 'Description',
                'type'        => 'textarea',
                'description' => 'This controls the description which the user sees during checkout.',
                'default'     => 'Pay with your credit card via our payment gateway.',
            ),
            'testmode' => array(
                'title'       => 'Test mode',
                'label'       => 'Enable Test Mode',
                'type'        => 'checkbox',
                'description' => 'Place the payment gateway in test mode using test API keys.',
                'default'     => 'yes',
                'desc_tip'    => true,
            ),
            'test_publishable_key' => array(
                'title'       => 'Test Publishable Key',
                'type'        => 'text'
            ),
            'test_private_key' => array(
                'title'       => 'Test Private Key',
                'type'        => 'password',
            ),
            'publishable_key' => array(
                'title'       => 'Live Publishable Key',
                'type'        => 'text'
            ),
            'private_key' => array(
                'title'       => 'Live Private Key',
                'type'        => 'password'
            )
        );
    }

    /**
     * Get current instance of plugin
     *
     * @return Flutterwave_Controller|null
     *
     * @since 1.0.0
     */
    public static function get_instance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    public function validate_payment($transaction_ref, $transaction_id)
    {

        $secret = $this->get_secret_key();
        $curl = curl_init();

        curl_setopt_array($curl, array(

            CURLOPT_URL => "https://ravesandboxapi.flutterwave.com/v3/transactions/$transaction_id/verify",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer {$secret}"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $this->set_order_status($response, $transaction_ref);
        //get order id
        //set order to paid 
        //send response back
    }
    public function set_order_status($response, $transaction_ref)
    {
        $reply =  (array)json_decode($response);
        if (empty($reply))
            return false;
        $order_id = (int) explode('_', $transaction_ref)[0];
        if ($order_id < 1)
            return false;
        $order = wc_get_order($order_id);
        $currency =  $order->get_currency();
        $amount =  $order->get_total();

        //check all data for correlation

        if ($reply['status'] == 'success' && $reply['data']->currency == $currency && $reply['data']->tx_ref == $transaction_ref && $reply['data']->amount >= $amount) {
            $order->update_status('completed');
            return true;
        } else {
            return false;
        }
    }
}
