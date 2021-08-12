<?php

/**
 * Plugin Name: Cheap Learning fast
 * Description:Learn anything with the best
 * Version: 1.0.0
 */
 
defined('ABSPATH') or die('Normal humans go through the door');
use Cheap_Learning_Fast\Plugin as plugin;

$re = require_once(plugin_dir_path(__FILE__) . 'vendor/autoload.php');
$cheapLearningFast = plugin::get_instance();
$cheapLearningFast->init();