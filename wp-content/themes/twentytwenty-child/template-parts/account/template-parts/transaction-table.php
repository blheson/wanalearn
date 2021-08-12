<?php

$orders = $args['orders'];
?>
<div class="grid-margin">
  <div class="card" style="margin: 1rem;">
    <div class="card-body">
      <h3>Add order here</h3>
      <form action="<?php echo site_url('account/dashboard#transactions') ?>">
        <div class="form-group">
          <input class="form-control" type="text" name="order_id" placeholder="add new orders">
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>

<div class="col-lg-12 grid-margin stretch-card">

  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Transactions table</h4>
      <p class="card-description">
        See all your transactions here
        <!-- Add class <code>.table-bordered</code> -->
      </p>
      <div class="table-responsive pt-3">

        <?php
        if (!is_array($orders) || count($orders) < 1) {
        ?>
          <div style="text-align: center;font-size: 34px;color: #b7b4b4;max-width: 304px;margin: auto;">
            You have no current Transaction
          </div>

        <?php } else {
        ?>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>
                  #
                </th>

                <th>
                  Progress
                </th>
                <th>
                  Amount
                </th>
                <th>
                  Date
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($orders as $order) {

              ?>
                <tr>
                  <td>
                    <?php echo $order['id'] ?>
                  </td>

                  <td>
                    <?php echo $order['status'] ?>

                  </td>
                  <td>
                    <?php echo $order['value'] ?>

                  </td>
                  <td>
                    <?php echo $order['date'] ?>
                  </td>
                </tr>
              <?php
              }
              ?>

            </tbody>
          </table>
        <?php

        } ?>
      </div>
    </div>
  </div>
</div>