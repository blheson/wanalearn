<?php

/**
 * Displays the content when the navigation template is used.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One_Child
 * @since Twenty Twenty One 1.0
 */
?>
<style>
    .sidebar-dark .navbar .navbar-brand-wrapper {
        background: #282f3a;
    }

    .sidebar-dark .sidebar {
        background: #282f3a;
    }

    @media (max-width: 480px) {
        .navbar .navbar-brand-wrapper {
            width: 170px;
        }

        .content-wrapper {
            padding: 0.7rem;
        }

        .navbar .navbar-menu-wrapper {
            width: calc(100% - 170px);
        }
    }
</style>
<nav class="navbar navbar-dark  col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">

        <div class="text-center">
            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/wana-logo-white.png'; ?>" alt="" width="150px">
        </div>

    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>