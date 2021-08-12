<?php

namespace Cheap_Learning_Fast\Controllers;

use Cheap_Learning_Fast\Plugin;

class Woo_Commerce_Controller
{
    public static function set_customer_to_order($user_id, $order)
    {
        if ($user_id > 0) {
            $order->set_customer_id(is_numeric($user_id) ? absint($user_id) : 0);
        }
    }
    public function create_order()
    {
        global $woocommerce;
        $product_id = (int)$_POST['id'];
        $user_id = (int)$_POST['user_id'];
        $first_name = sanitize_text_field($_POST['first_name']);
        $last_name = sanitize_text_field($_POST['last_name']);
        $email = sanitize_text_field($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $payment_method = sanitize_text_field($_POST['payment']);
        $currency = sanitize_text_field($_POST['currency']);
        $address = array(
            'first_name' => $first_name,
            'last_name'  => $last_name,
            'email'      => $email,
            'phone'      => $phone,
        );
        // echo json_encode($_POST);
        // create the order
        $order = wc_create_order();

        //
        // check for error here (not done)
        //

        // // The add_product() function below is located in /plugins/woocommerce/includes/abstracts/abstract_wc_order.php
        $order->add_product(wc_get_product($product_id), 1); // This is an existing SIMPLE product
        $order->set_address($address, 'billing');
        self::set_customer_to_order($user_id, $order);

        $order->calculate_totals();
        $order->set_currency($currency);
        $order->set_payment_method($this->get_single_payment_gateway($payment_method));

        $order->update_status("pending", '', TRUE);
        printf('%s', json_encode(array('error' => false, 'message' => (string)$order->id)));
        exit;
        // return $order;
    }
    public function get_single_payment_gateway($id)
    {
        $gateways = WC()->payment_gateways->payment_gateways();
        $cache = '';
        foreach ($gateways as $gateway) {
            if ($gateway->id == $id) {
                $cache = $gateway;
            }
        }
        return $cache;
    }
    /**
     * Get order by a user
     * @param $customer
     */
    public static function get_user_order($customer = false)
    {
        $id = $customer ? $customer : get_current_user_id();
        // $customer = wp_get_current_user();
        // Get all customer orders
        $customer_orders = get_posts(array(
            'numberposts' => -1,
            'meta_key' => '_customer_user',
            'orderby' => 'date',
            'order' => 'DESC',
            'meta_value' => $id,
            'post_type' => wc_get_order_types(),
            'post_status' => array_keys(wc_get_order_statuses())
        ));

        $order_array = []; //

        $courses = 0;
        foreach ($customer_orders as $customer_order) {
            $orderq = wc_get_order($customer_order);

            $status = $orderq->get_status();
            if ($status == 'completed') {
                $courses++;
            }
  
            $order_array[] = [
                "id" => $orderq->get_id(),
                "email" => $orderq->get_billing_email(),
                "status" => $orderq->get_status(),
                "value" => $orderq->get_total(),
                "date" => $orderq->get_date_created()->date_i18n('Y-m-d'),
            ];
        }

        return ['course_count' => $courses, 'orders' => $order_array];
    }
    /**
     * Set user id for a new order
     * @param object $user User object
     * @param int $order_id Order id
     */
    public static function set_user_id_for_order($user, $order_id)
    {
        $email = $user->user_email;

        $order = wc_get_order($order_id);
 
        if (!$order) return false;
        // var_dump($order->get_billing_email(),$email);
        if ($order->get_billing_email() !=  $email)
            return false;

        update_post_meta($order_id, '_customer_user',$user->ID);
      
        return true;
    }
}
