<?php

use Cheap_Learning_Fast\Controllers\User_Controller;

$post = $result  = '';
if (isset($_POST['user_login'])) {
    $post = $_POST;
    $result = User_Controller::create($_POST);
}
?>
<section>
    <div>
        <?php
        if (is_array($result)) {
          
            foreach ($result as $error => $val) {
              
                echo '<p style="color:red">' . $val[0] . '</p>';
            }
        } else if ($result == 'no error') {
        ?>
            <a href="<?= wp_login_url() ?>">Login to your dashboard</a>
        <?php
        }
        ?>
    </div>
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
        <div>
            <label for="username">Username <strong>*</strong></label>
            <input type="text" name="user_login" value="<?php echo (isset($post['user_login']) ? $post['user_login'] : null) ?>">
        </div>
        <div>

            <label for="username">First Name <strong>*</strong></label>
            <input type="text" name="first_name" value="<?php echo (isset($post['first_name']) ? $post['first_name'] : null) ?>">
        </div>
        <div>

            <label for="username">Last Name <strong>*</strong></label>
            <input type="text" name="last_name" value="<?php echo (isset($post['last_name']) ? $post['last_name'] : null) ?>">
        </div>
        <div>
            <label for="password">Password <strong>*</strong></label>
            <input type="password" name="user_pass" value="">
        </div>

        <div>
            <label for="email">Email <strong>*</strong></label>
            <input type="email" name="user_email" value="<?php echo (isset($post['user_email']) ? $post['user_email'] : null) ?>">
        </div>
        <div>
            <label for="type">Type <strong>*</strong></label>
            <select name="custom_role" id="">
                <option value="customer">Customer</option>
                <option value="affiliate">Affiliate</option>
                <option value="vendor">Vendor</option>
            </select>

        </div>
        <div>
            <button type="submit">Submit</button>
        </div>

    </form>
</section>