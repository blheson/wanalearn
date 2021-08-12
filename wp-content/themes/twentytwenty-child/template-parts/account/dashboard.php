<?php
$user = $args['user'];
$root_for_asset = get_stylesheet_directory_uri();

use Cheap_Learning_Fast\Controllers\Woo_Commerce_Controller;

//this sets a new order to a user if the user owns the order
if (isset($_GET['order_id']) && (int)$_GET['order_id'] > 0) {
  $order_id =  (int)$_GET['order_id'];
  $result = Woo_Commerce_Controller::set_user_id_for_order($user, $order_id);

  $text_for_order = $result ? 'A new order with id: ' . $order_id . ' has been added to your account' : 'The order details does not match this account details';

?>
  <div class="card notification-box-for-order" style="margin: 1rem;">
    <div class="card-body">
      <div style="display: flex;justify-content: space-between">
        <span class="notification-text" style="color:<?php echo $result ? 'green' : 'red' ?>"><?php echo $text_for_order ?>
        </span>
        <span style="color:red;cursor:pointer" class="close-notification">x</span>
      </div>
    </div>
  </div>
  <script>
    document.querySelector('.close-notification').addEventListener('click', () => {
      document.querySelector('.notification-box-for-order').style.display = 'none'
    })
  </script>
<?php
}
$orders = Woo_Commerce_Controller::get_user_order($user->ID);
$order_count = count($orders['orders']);
?>
<section id="summary">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold"> Welcome, <?php echo $user->user_firstname  ?></h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card tale-bg">
            <div class="card-people mt-auto">
              <img src="<?php echo $root_for_asset ?>/assets/img/account/dashboard/people.svg" alt="people">
            </div>
          </div>
        </div>
        <div class="col-md-6 grid-margin transparent">
          <div class="row">
            <div class="col-md-6 mb-4 stretch-card transparent">
              <div class="card card-dark-blue">
                <div class="card-body">
                  
                  <a href="<?php echo site_url('account/courses') ?>" style="color: #fff;text-decoration: none;">
                    <p class="mb-4">Total Courses</p>
                    <p class="fs-30 mb-2"><?php echo $orders['course_count'] ?></p>
                  </a>
                
                </div>
              </div>
            </div>
          </div>
          <div class="row">

            <div class="col-md-6 stretch-card transparent">
              <div class="card card-light-danger">
                <div class="card-body transaction-navbar-link">
                  <p class="mb-4">Number of Transactions</p>
                  <p class="fs-30 mb-2"><?php echo $order_count ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- transaction -->
<section id="transactions" style="display:none">
  <?php
  get_template_part('template-parts/account/template-parts/transaction-table', null, $orders) ?>
</section>
<!-- transaction -->
<script>
  (function() {
    'use strict'

    let transaction_state = window.location.href.includes('#transactions');

    function show(dom) {
      dom.style.display = ''
    }

    function hide(dom) {
      dom.style.display = 'none'
    }

    function $(selector) {
      return document.querySelector(selector)
    }
    $('#dashboard-navbar-link').href = '#summary'
    $('#transaction-navbar-link').href = '#transactions'
    $('#transaction-navbar-link').addEventListener('click', () => {
      transaction_click(true)
    })

    $('#dashboard-navbar-link').addEventListener('click', (e) => {
      transaction_click(false)
    })
    $('.transaction-navbar-link').addEventListener('click', (e) => {
      transaction_click(true)
    })
    sort_ui();
    function transaction_click(status){
      transaction_state = status
      sort_ui();
    }

    function sort_ui() {

      if (transaction_state) {
        console.log('trans')
        hide($('#summary'))
        show($('#transactions'))
      } else {
        console.log('dash')

        show($('#summary'))
        hide($('#transactions'))
      }
    }

  })()
</script>
<!-- transaction -->