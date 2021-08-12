<?php


namespace Cheap_Learning_Fast\Providers;

use Cheap_Learning_Fast\Helpers\View;
use Cheap_Learning_Fast\Controllers\Payment_Gateway_Controller;
use Cheap_Learning_Fast\Controllers\Flutterwave_Controller;


class Payment_Gateway_Service_Provider
{
    public function __construct()
    {
        $this->payment_gateway = new Payment_Gateway_Controller();
    }
    /**
     * Registers wordpress action hooks and filters.
     *
     * @return mixed|void
     *
     * @since 1.0.0
     */
    public function register()
    {
        add_action('init', [$this, 'run']);
    }

    /**
     * Callback function for the registered hooks and filters
     *woocommerce/myaccount/my-account.php.
     * @return void
     * 
     * @since 1.0.0
     */
    public function run()
    {
    
        // Make sure WooCommerce is active
        if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) return;

        /**
         * Offline Payment Gateway
         *
         * Provides an Offline Payment Gateway; mainly for testing purposes.
         * We load it later to ensure WC is loaded first since we're extending it.
         *
         * @class       WC_Gateway_Offline
         * @extends     WC_Payment_Gateway
         * @version     1.0.0
         * @package     WooCommerce/Classes/Payment
         * @author      SkyVerge
         */
        add_action('plugins_loaded', array($this,'do'));

        add_filter('woocommerce_payment_gateways',array($this->payment_gateway,'_add_gateway_class'));
     
    }

    public function do()
    {
        Flutterwave_Controller::get_instance();
    }
}

// function init_gateway_for_flutterwave()
// {
 
   
//     class Flutterwave_Controller extends \WC_Payment_Gateway
//     {
//         private static $instance = null;

//         public function __construct()
//         {
        
//             $this->id = 'flutterwave';
//             $this->method_title = 'Flutterwave Gateway';
//             $this->supports = array(
//                 'products'
//             );
//             // Load the settings.
//             $this->init();
//             // This action hook saves the settings
//             add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
//         }
//         public function process_admin_options()
//         {
//         }
//         public function flutterwave_add_gateway_class($gateways)
//         {
//             $gateways[] = 'Flutterwave_Controller'; // your class name is here
//             return $gateways;
//         }
//         public function init()
//         {
//             $this->init_settings();
//             $this->add_settings_value();
//             // Method with all the options fields
//             $this->init_form_fields();
//         }

//         public function add_settings_value()
//         {
//             $this->title = $this->get_option('title');
//             $this->description = $this->get_option('description');
//             $this->enabled = $this->get_option('enabled');
//             $this->testmode = 'yes' === $this->get_option('testmode');
//             $this->private_key = $this->testmode ? $this->get_option('test_private_key') : $this->get_option('private_key');
//             $this->publishable_key = $this->testmode ? $this->get_option('test_publishable_key') : $this->get_option('publishable_key');
//         }


//         public function init_form_fields()
//         {
//             $this->form_fields = array(
//                 'enabled' => array(
//                     'title'       => 'Enable/Disable',
//                     'label'       => 'Enable Flutter Gateway',
//                     'type'        => 'checkbox',
//                     'description' => '',
//                     'default'     => 'no'
//                 ),
//                 'title' => array(
//                     'title'       => 'Title',
//                     'type'        => 'text',
//                     'description' => 'This controls the title which the user sees during checkout.',
//                     'default'     => 'Credit Card',
//                     'desc_tip'    => true,
//                 ),
//                 'description' => array(
//                     'title'       => 'Description',
//                     'type'        => 'textarea',
//                     'description' => 'This controls the description which the user sees during checkout.',
//                     'default'     => 'Pay with your credit card via our super-cool payment gateway.',
//                 ),
//                 'testmode' => array(
//                     'title'       => 'Test mode',
//                     'label'       => 'Enable Test Mode',
//                     'type'        => 'checkbox',
//                     'description' => 'Place the payment gateway in test mode using test API keys.',
//                     'default'     => 'yes',
//                     'desc_tip'    => true,
//                 ),
//                 'test_publishable_key' => array(
//                     'title'       => 'Test Publishable Key',
//                     'type'        => 'text'
//                 ),
//                 'test_private_key' => array(
//                     'title'       => 'Test Private Key',
//                     'type'        => 'password',
//                 ),
//                 'publishable_key' => array(
//                     'title'       => 'Live Publishable Key',
//                     'type'        => 'text'
//                 ),
//                 'private_key' => array(
//                     'title'       => 'Live Private Key',
//                     'type'        => 'password'
//                 )
//             );
//         }

//         /**
//          * Get current instance of plugin
//          *
//          * @return Plugin|null
//          *
//          * @since 1.0.0
//          */
//         public static function get_instance()
//         {
//             if (self::$instance == null) {
//                 self::$instance = new self();
//             }

//             return self::$instance;
//         }
//     }
// }
