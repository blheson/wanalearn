<form class="pt-3" id="signin" method="post">
    <h6 class="font-weight-light">Sign in to continue.</h6>
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
                <input type="checkbox" class="form-check-input" name="rememberme" style="opacity: 1">
                Keep me signed in
            </label>
        </div>
        <!-- <a href="#" class="auth-link text-black">Forgot password?</a> -->
    </div>

    <div class="text-center mt-4 font-weight-light">
        Don't have an account? <span class="text-primary create pointer">Create</span>
    </div>
</form>



<form class="pt-3" id="register" method="post" style="display: none;">
    <h4>New here? Sign up to get started</h4>
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