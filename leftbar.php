 <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar" id="main-menu">
    <!-- BEGIN MINI-PROFILE -->
    <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
      <div class="user-info-wrapper">
        <div class="profile-wrapper"> <img src="assets/img/user.png"  alt="" data-src="assets/img/user.png" data-src-retina="assets/img/user.png" width="69" height="69" /> </div>
        <div class="user-info">
          <div class="greeting" style="font-size:14px;">Welcome</div>
          <div class="username" style="font-size:12px;"><?php echo $_SESSION['name'];?></div>
          <div class="status" style="font-size:10px;"><a href="#">
            <div class="status-icon green"></div>
            Online</a></div>
        </div>
      </div>
      <!-- END MINI-PROFILE -->
      <!-- BEGIN SIDEBAR MENU -->
      <p class="menu-title">BROWSE <span class="pull-right"><a href="javascript:;"><i class="fa fa-refresh"></i></a></span></p>
   
    <ul>	
      <li class="start"> <a href="dashboard.php"> <i class="icon-custom-home"></i> <span class="title">Dashboard</span> <span class="selected"></span>  </a> 
		    </li>
    
          <li ><a href="tasks.php"> <span class="fa fa-tasks"></span> Tasks</a></li>
          <li ><a href="goals.php"><span class="fa fa-graduation-cap"></span> Goals</a></li>
          <li ><a href="transactions.php"><span class="fa fa-money"></span>  Incomes and Payments</a></li>
          <li ><a href="statisics.php"><span class="fa fa-area-chart"></span>  Overview </a></li>
          <li><a href="profile.php"><span class="fa fa-user"></span> Profile</a></li>
          <li><a href="change-password.php"><span class="fa fa-file-text-o"></span> Change Password</a></li>
                           
    </ul>
    
	