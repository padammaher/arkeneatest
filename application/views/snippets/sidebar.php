  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('Employeelist');?>">
            <div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">My Office </div>
          </a>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item">
            <!-- <a class="nav-link" href="index.html"> -->
              <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
              <!-- <span>Dashboard</span></a> -->
               <a class="nav-link" href="<?php echo base_url('Employeelist');?>"><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a> 
          </li>

          <!-- Divider -->
        
         
          <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <!-- <div class="sidebar-heading">
        Addons
      </div> -->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Employee</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Login Screens:</h6> -->
             <a class="collapse-item" href="<?php echo base_url('Employeelist');?>"><span>Employee List</span></a> 
             <?php //if($this->session->userdata('groupid')==1) { ?> 
            <a class="collapse-item" href="<?php echo base_url('Employeelist/deleted');?>">Deleted Records</a>            
          <?php //} ?>
            <a class="collapse-item" href="<?php echo base_url('password/resetPassword');?>">Change Password</a>
            
          </div>
        </div>
      </li>
 <!-- mcq question link -->
       <!--  <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>MCQ</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded"> -->
            <!-- <h6 class="collapse-header">Login Screens:</h6> -->
             <?php //if($this->session->userdata('groupid')==1) { ?> 
             <!-- <a class="collapse-item" href="<?php echo base_url('MCQ/Questions');?>"><span>MCQ Question List</span></a>              -->
          <?php //} else { ?>
             <!-- <a class="collapse-item" href="<?php echo base_url('MCQ/questionTest');?>"><span>MCQ Question List</span></a>  -->
          <?php //} ?>
            
            
        <!--   </div>
        </div>
      </li> -->

      <!-- Nav Item - Charts -->
     

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

    </ul>