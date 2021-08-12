<?php

use Cheap_Learning_Fast\Plugin;

$root_for_asset = get_stylesheet_directory_uri();
?>
<section>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div>
                            <span style="color: red;" class="log-notification"></span>
                        </div>

                        <!-- login -->
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/wana-logo-black.png'; ?>" alt="" width="150px">
                            </div>

                            <?php
                            get_template_part('template-parts/account/template-parts/register_login', null);
                            ?>
                        </div>
                        <!-- register -->
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
</section>
<?php

$site_url = site_url();
$redirect_url = $site_url . '/account/dashboard';
$rest_route = $site_url . '/wp-json/' . Plugin::get_instance()->get_api_route_namespace();
if (isset($_GET['order_id']) && (int)$_GET['order_id'] > 0) {
    $redirect_url .= '/account/dashboard?order_id=' . $_GET['order_id'];
}
?>
<script src="<?php echo $root_for_asset ?>/assets/js/helper.js">

</script>
<script>
    let rest_route = '<?php echo $rest_route ?>';
    let redirect_url = '<?php echo $redirect_url ?>';
  
    document.forms['signin'].addEventListener('submit', (e) => {
        e.preventDefault();

        helper.sort_btn(e.target.querySelector('button.auth-form-btn-in'), '<i class="icon-loader menu-icon rotate"></i>')
        let fd = new FormData(e.target);
        fetch(`${rest_route}user/login`, {
            method: 'POST',
            body: fd
        }).then(response => {
            console.log(response)

            if (response.status !== 200) {
                throw new Error();
            }
            return response.json();
        }).then(result => {

            if (result.error == true) {
                helper.show_error(result.message)
                message = 'SIGN IN'
                disabled = false
            } else {


                message = 'redirecting...'
                disabled = true
                window.location = redirect_url
            }

            helper.sort_btn(e.target.querySelector('button.auth-form-btn-in'), message, disabled)

        }).catch(error => {

            helper.sort_btn(e.target.querySelector('button.auth-form-btn-in'), 'SIGN IN', false)
        })
    })
    document.forms['register'].addEventListener('submit', (e) => {

        e.preventDefault();
        helper.sort_btn(e.target.querySelector('button.auth-form-btn-register'), 'Please wait...   <i class="icon-loader menu-icon rotate"></i>')

        let fd = new FormData(e.target);
        fetch(`${rest_route}user`, {
            method: 'POST',
            body: fd
        }).then(response => {
            if (response.status !== 200) {
                throw new Error;
            }
            return response.json();
        }).then(result => {

            if (result.error == true) {
                helper.show_error(result.message)
                message = 'SIGN IN'
                disabled = false
            } else {
                message = 'redirecting...'
                disabled = true
                window.location = redirect_url
            }
            helper.sort_btn(e.target.querySelector('button.auth-form-btn-register'), message, disabled)
        }).catch(error => {
            helper.show_error(error.message)
            helper.sort_btn(e.target.querySelector('button.auth-form-btn-register'), 'SIGN IN', false)
        })
    })   
</script>
<!-- <script src="<?php echo get_stylesheet_directory_uri() ?>../../js/template.js"></script> -->