<?php
/**
 * Displays the side bar of the dashboard.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One_Child
 * @since Twenty Twenty One 1.0
 */
?>  
  <!-- partial:../../partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" id="dashboard-navbar-link" href="<?php echo site_url('account/dashboard#summary')?>">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('account/courses')?>" >
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Courses</span>
              <!-- <i class="menu-arrow"></i> -->
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="transaction-navbar-link" href="<?php echo site_url('account/dashboard#transactions')?>">
              <i class="icon-briefcase menu-icon"></i>
              <span class="menu-title">Transactions</span>
              <!-- <i class="menu-arrow"></i> -->
            </a>     
          </li>
          <li class="nav-item">
            <a class="nav-link" id="transaction-navbar-link"  href="https://t.me/joinchat/FL_i3BWRezowZDVk" target='_blank'>
              <i class="icon-user menu-icon"></i>
              <span class="menu-title">Community</span>
              <!-- <i class="menu-arrow"></i> -->
            </a>     
          </li>          
           <li class="nav-item">
            <a class="nav-link pointer" id="logout" data-toggle="collapse"  aria-expanded="false" aria-controls="ui-basic" >
              <i class="icon-drop menu-icon"></i>
              <span class="menu-title">Logout</span>
              <!-- <i class="menu-arrow"></i> -->
            </a>     
          </li>
        </ul>
      </nav>
      <!-- partial -->