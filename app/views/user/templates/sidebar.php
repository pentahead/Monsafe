<?php
// Asumsi $currentController diteruskan dari controller
$currentController = $data['currentController'] ?? 'Beranda'; // Gunakan data dari controller, default ke 'Beranda'
?>
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


        <a class="sidebar-brand d-flex align-items-center justify-content-center"
            href="<?php echo BASEURL; ?>/?controller=Homepage">
            <div class="sidebar-brand-icon">
                <img src="public/img/logo-monsafe.png" class="img-fluid" alt="Your Brand Logo">
            </div>
        </a>


        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?php echo ($currentController == 'Beranda') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo BASEURL; ?>/?controller=Homepage">
                <span class="d-flex align-items-center justify-content-center">Home</span>
            </a>
        </li>
        <li class="nav-item <?php echo ($currentController == 'Monitoring') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo BASEURL; ?>/?controller=Monitoring">
                <span class="d-flex align-items-center justify-content-center">Monitoring</span>
            </a>
        </li>
        <li class="nav-item <?php echo ($currentController == 'Pengurasan') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo BASEURL; ?>/?controller=Pengurasan">
                <span class="d-flex align-items-center justify-content-center">Pengurasan</span>
            </a>
        </li>
        <li class="nav-item <?php echo ($currentController == 'History') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo BASEURL; ?>/?controller=History">
                <span class="d-flex align-items-center justify-content-center">History</span>
            </a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">



    </ul>
    <!-- End of Sidebar -->