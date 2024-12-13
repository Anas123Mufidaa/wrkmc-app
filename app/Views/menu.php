<div class="sidebar-wrapper active bg-primary">
<div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo" >
                            <a href="index.html" class="text-dark">Wrkmc-<span class="text-primary">App</span></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">

                        <li class="sidebar-item  <?= (uri_string() == '') ? 'active' : ''; ?>">
                            <a href="<?= base_url('/') ?>" class="sidebar-link">
                                <i class="bi bi-speedometer2"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                         
                        <li class="sidebar-title ">profile</li>

                        <li class="sidebar-item <?= (uri_string() == 'admin/profile') ? 'active' : ''; ?>">
                            <a href="<?= base_url('admin/profile') ?>" class='sidebar-link'>
                                <i class= " bi bi-person-badge"></i>
                                <span >Akun</span>
                            </a>
                        </li>                        
                        <li class="sidebar-item">
                            <a href="<?= base_url('auth/logout') ?>" class='sidebar-link'>
                                <i class="text-danger bi bi-power"></i>
                                <span class="text-danger">Logout</span>
                            </a>
                        </li>                         
 
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
       