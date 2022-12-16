    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard'); ?>">
            <div class="sidebar-brand-icon rotate-n-0">
                <i class="fab fa-gg"></i>
            </div>
            <div class="sidebar-brand-text mx-3"><?= $title1; ?></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Administrator
        </div>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse" 
            aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Manage</span>
            </a>
            <div id="collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('order'); ?>">Data Order</a>
                    <a class="collapse-item" href="<?= base_url('dashboard/member'); ?>">Data User</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">


        <li class="nav-item">
            <a class="nav-link" href="<? base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Log Out</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->