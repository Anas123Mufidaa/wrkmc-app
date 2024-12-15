<div class="sidebar-wrapper active bg-primary">
        <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo" >
                            <a href="<?= base_url('dashboard') ?>" style="color:#FFC928;">Wrkmc-<span class="text-primary">App</span></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">

                        <li class="sidebar-item <?= (uri_string() == 'dashboard') ? 'active' : ''; ?>">
                            <a href="<?= base_url('dashboard') ?>" class="sidebar-link">
                                <i class="bi bi-house-door-fill text-primary <?= (uri_string() == 'dashboard') ? 'text-light' : ''; ?>"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-title ">Data Master</li>

                        <li class="sidebar-item <?=  (str_starts_with(uri_string(), 'sda')) ? 'active' : ''; ?>  has-sub ">
                            <a href="#" class="sidebar-link">
                                <i class="bi bi-house-door-fill text-primary"></i>
                                <span>Sumber Daya Air</span>
                            </a>
                            <ul class="submenu <?=  (str_starts_with(uri_string(), 'sda')) ? 'active' : ''; ?> submenu-open" style="--submenu-height: 172px;">     
                                <li class="submenu-item <?= (uri_string() == 'sda') ? 'active' : ''; ?>">
                                    <a href="<?= base_url('sda') ?>" class="submenu-link">Tambah SDA </a>
                                </li>     
                                <li class="submenu-item <?= (uri_string() == 'sda/penilaian-kinerja') ? 'active' : ''; ?> ">
                                    <a href="<?= base_url('sda/penilaian-kinerja') ?>" class=" submenu-link">Penilaian Kinerja</a>
                                </li>  
                            </ul>
                        </li> 
                         
                        <li class="sidebar-title ">Profile</li>

                        <li class="sidebar-item <?= (uri_string() == 'profile') ? 'active' : ''; ?>">
                            <a href="<?= base_url('profile') ?>" class="sidebar-link">
                                <i class="bi bi-person-badge text-primary <?= (uri_string() == 'profile') ? 'text-light' : ''; ?>"></i>
                                <span >Account</span>
                            </a>
                        </li>      
                        <li class="sidebar-item <?= (uri_string() == 'profile/user') ? 'active' : ''; ?>">
                            <a href="<?= base_url('profile/user') ?>" class="sidebar-link">
                            
                                <i class="bi bi-person-plus-fill text-primary <?= (uri_string() == 'profile/user') ? 'text-light' : ''; ?>"></i>
                                <span>Tambah User</span>
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
       