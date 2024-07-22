  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-danger elevation-4">
    <!-- Brand Logo -->
    <!--
    <a class="brand-link">
      <img src="<?php echo base_url(); ?>assets/img/klinik_raisha.png" alt="SIMRAISHA Logo" class="brand-image-xl single elevation-3 mx-auto d-block" style="opacity: .8">      
    </a>
    -->
    <a class="brand-link p-0">    
        <img src="<?php echo base_url(); ?>assets/img/klinik_raisha_transparent.webp" alt="SIMRAISHA Logo" style="width: 100%; height: auto;" width="250" height="97" class="single mx-auto d-block" style="opacity: .8">      
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-none">
        <div class="info mx-auto">
          <a class="d-block"><?php 
          $user = $this->ion_auth->user()->row();
          echo $user->first_name ." ". $user->last_name;?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
<?php
  foreach($menu as $key => $value){
    ?>
    <li class="nav-item <?= isset($value['child']) ? 'has-treeview' : '' ?>">
    <a href="<?= site_url($value['navigate_url']); ?>" class="nav-link" id="<?= $value['id']; ?>">
      <i class="nav-icon fas <?= $value['icon']; ?>"></i>
      <p>
      <?= $value['menu_name']; ?>
      <?= isset($value['child']) ? '<i class="fas fa-angle-left right"></i>' : '' ?>
      </p>
    </a>
    <?php 
        if(isset($value['child'])){
          echo '<ul class="nav nav-treeview">';
          foreach($value['child'] as $keychild => $valuechild){
            ?>
                <li class="nav-item">
                  <a href="<?= site_url($valuechild['navigate_url']); ?>" class="nav-link" id="<?= $valuechild['id']; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <?= $valuechild['menu_name']; ?>
                  </a>
                </li>          
            <?php
          }
          echo '</ul>';  
        }    
    ?>    
  </li>    
<?php  
  }
?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
