<?php
$user = $args['user'];
$root_for_asset = get_stylesheet_directory_uri();
?>

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">    Welcome, <?php echo $user->user_firstname  ?></h3>
            
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="<?php echo $root_for_asset?>/assets/img/account/dashboard/people.svg" alt="people">
               
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
            
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Total Courses</p>
                      <p class="fs-30 mb-2">10</p>
                      <!-- <p>22.00% (30 days)</p> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Number of Transactions</p>
                      <p class="fs-30 mb-2">20</p>
                      <!-- <p>0.22% (30 days)</p> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>