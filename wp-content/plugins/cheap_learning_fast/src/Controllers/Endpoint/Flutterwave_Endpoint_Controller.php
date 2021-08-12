<?php

namespace Cheap_Learning_Fast\Controllers\Endpoint;

use Cheap_Learning_Fast\Plugin;
use Cheap_Learning_Fast\Controllers\Flutterwave_Controller;

use Cheap_Learning_Fast\Controllers\Endpoint\Base_Endpoint_Controller;



class Flutterwave_Endpoint_Controller extends Base_Endpoint_Controller
{
    public function __construct()
    {
        /**
         * @var Cheap_Learning_Fast\Controllers\Flutterwave_Controller
         */
    }

    public function init()
    {
        if (is_admin()) {
            return;
        }
        $this->create_endpoint();
    }
    public function create_endpoint()
    {
        //confirm flutterwave payment
        register_rest_route(
            Plugin::get_instance()->get_api_route_namespace(),
            'pay',
            array(
                'methods' => \WP_REST_Server::READABLE,
                'callback' => array($this, 'process_sent_payment'),
                'permission_callback' => '__return_true'
            )
        );
    }
    /**
     * Check if payment is successful
     */
    public function process_sent_payment()
    {       
        if (!isset($_GET['transaction_id']) || !isset($_GET['tx_ref'])) {
            echo json_encode(array('error' => true, 'message' => 'Payment is not confirmed'));
            return;
        }
        $transaction_ref =  $_GET['tx_ref'];
       
         //avoid calling undefined WC_Payment_Gateway by abstracting the validation
        $response = Flutterwave_Controller::get_instance()->validate_payment($transaction_ref, (int)$_GET['transaction_id']);

        if ($response) {
            echo json_encode(array('error' => false, 'message' => 'Payment is confirmed'));
        } else {
            echo json_encode(array('error' => true, 'message' => 'Payment was not confirmed'));
        }
    }
}
