<div id="nav-bar">
  <input id="nav-toggle" type="checkbox"/>

  <div id="nav-header">
    <a id="nav-title" href="#" target="_blank"><i class="fas fa-home" aria-hidden="true"></i>HOME</a>
    <!-- <label for="nav-toggle"><span id="nav-toggle-burger"></span></label> -->
    <hr/>
  </div>
  <div id="nav-content">
    <div class="nav-button" data-target="./admin/orders.php"><i class="fas fa-list"></i><span>Mange Orders</span></div>
    <div class="nav-button" data-target="./admin/pizza/pizza.php"><i class="fas fa-pizza"></i></i><span>pizza Menu</span></div>
    <div class="nav-button" data-target="./admin/food/food.php"><i class="fas fa-hamburger"></i><span>Food Menu</span></div>
    <hr/>
    <div class="nav-button" data-target="./admin/customers.php"><i class="fas fa-users"></i><span>Customers</span></div>
    <div class="nav-button" data-target="./admin/sys_users/users.php"><i class="fas fa-user"></i><span>Mange Users</span></div>
    <hr/>
    <div class="nav-button"><a href='logout.php'><i class="fas fa-sign-out-alt" ></i><span>Log Out</span></a></div>
    <div id="nav-content-highlight"></div>
  </div>
  <input id="nav-footer-toggle" type="checkbox"/>
  <?php
    session_start();
    $user = $_SESSION['user'];
    $role = $_SESSION['role'];
  ?>
<hr/>
  
  <div id="nav-footer">
    <div id="nav-footer-heading">
      <div id="nav-footer-avatar"><i class="fas fa-user"></i></div>
      <div id="nav-footer-titlebox">
        <a id="nav-footer-title" href="#" target="_blank"><?php echo $user; ?></a>
        <span id="nav-footer-subtitle"><?php
        if (!empty($user)) {
          if ($role == 1) {
            echo "Admin";
          } else {
            echo "Staff";
          }
        }
        ?></span>
      </div>
      <!-- <label for="nav-footer-toggle"><i class="fas fa-caret-up"></i></label> -->
    </div>
    <div id="nav-footer-content">
    </div>
  </div>
</div>
