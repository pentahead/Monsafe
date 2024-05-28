<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>



            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="<?php echo BASEURL; ?>/?controller=Notifikasi"
                        id="alertsDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-1x fa-bell  " style="color:#000000"></i>
                        <!-- Counter - Alerts -->
                        <span
                            class="badge badge-danger badge-counter"><?php echo $data['notif']['jumlah_kolam']; ?></span>
                    </a>
                    <!-- Dropdown - Alerts -->

                </li>


                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <div class="py-3  ">
                    <a href="<?php echo BASEURL; ?>/?controller=AkunKu" class=" nav-link btn-primary akun-ku-button   ">
                        <span class=" p-1 text-white font-weight-light">Akun ku</span>
                    </a>
                </div>


                </li>

            </ul>

        </nav>