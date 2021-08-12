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
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5" id="login">
                            <div class="brand-logo">
                                <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/wana-logo-black.png'; ?>" alt="" width="150px">
                            </div>

                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" id="signin" method="post">
                                <div class="form-group">
                                    <input type="text" name="log" class="form-control form-control-lg" placeholder="Username or Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pwd" class="form-control form-control-lg" placeholder="Password" required>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-theme btn-lg font-weight-medium auth-form-btn auth-form-btn-in" type="submit">SIGN IN <i class="fa fa-spinner"></i> </button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input" name="rememberme" style="opacity: 1;">
                                            Keep me signed in
                                        </label>
                                    </div>
                                    <!-- <a href="#" class="auth-link text-black">Forgot password?</a> -->
                                </div>

                                <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <span class="text-primary create poiinter">Create</span>
                                </div>
                            </form>
                        </div>
                        <!-- login -->

                        <!-- register -->
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5" id="register" style="display:none">
                            <div class="brand-logo">
                                <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/wana-logo-black.png'; ?>" alt="" width="150px">
                            </div>
                            <h4>New here? Sign up to get started</h4>
                        
                            <form class="pt-3" id="register" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="user_login" placeholder="Username*" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="first_name" placeholder="First name*" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="last_name" placeholder="Last name*" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" name="user_email" placeholder="Email*" required>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" name="user_pass" placeholder="Password" required>
                                </div>
                                <div class="mb-4">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            I agree to all Terms & Conditions
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-theme btn-lg font-weight-medium auth-form-btn auth-form-btn-register">SIGN UP</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? <span class="text-primary login pointer">Login</span>
                                </div>
                            </form>
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
    document.querySelector('.create').addEventListener('click', () => {
        document.getElementById('login').style.display = 'none'
        document.getElementById('register').style.display = ''
    })
    document.querySelector('.login').addEventListener('click', () => {
        document.getElementById('login').style.display = ''
        document.getElementById('register').style.display = 'none'
    })
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
                show_error(result.message)
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
                show_error(result.message)
                message = 'SIGN IN'
                disabled = false
            } else {
                message = 'redirecting...'
                disabled = true
                window.location = redirect_url
            }

            helper.sort_btn(e.target.querySelector('button.auth-form-btn-register'), message, disabled)


        }).catch(error => {
            show_error(error.message)
            helper.sort_btn(e.target.querySelector('button.auth-form-btn-register'), 'SIGN IN', false)
        })
    })

    function show_error(message) {
        document.querySelector('.log-notification').innerText = message
    }
</script>
<!-- <script src="<?php echo get_stylesheet_directory_uri() ?>../../js/template.js"></script> -->