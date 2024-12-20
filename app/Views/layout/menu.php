<div class="sidebar-wrapper active bg-primary">
        <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo" >
                            <a href="<?= base_url('dashboard') ?>" ><img style="min-height:70px;" src="<?= base_url('logo-wrkmc') ?>/WRKMC-APPS-backend.png" alt="Logo WRKMC"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu w-auto ">

                        <li class="sidebar-item <?= (uri_string() == 'dashboard') ? 'active' : ''; ?>">
                            <a href="<?= base_url('dashboard') ?>" class="sidebar-link">
                                <i class="bi bi-house-door-fill text-primary <?= (uri_string() == 'dashboard') ? 'text-light' : ''; ?>"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-title ">Data Master</li>

                        <li class="sidebar-item <?=  (str_starts_with(uri_string(), 'sda')) ? 'active' : ''; ?>  has-sub ">
                            <a href="#" class="sidebar-link">
                                <i class="bi-droplet-half text-primary <?=  (str_starts_with(uri_string(), 'sda')) ? 'text-light' : ''; ?>"></i>
                                <span>Sumber Daya Air</span>
                            </a>
                            <ul class="submenu <?=  (str_starts_with(uri_string(), 'sda')) ? 'active' : ''; ?> submenu-open" style="--submenu-height: 172px;">     
                                <li class="submenu-item <?= (uri_string() == 'sda') ? 'active' : ''; ?>">
                                    <a href="<?= base_url('sda') ?>" class="submenu-link">Data SDA</a>
                                </li>     
                                <li class="submenu-item <?= (uri_string() == 'sda/penilaian-kinerja') ? 'active' : ''; ?> ">
                                    <a href="<?= base_url('sda/penilaian-kinerja') ?>" class=" submenu-link">Nilai Kinerja</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="#" class="submenu-link head">Laporan SDA
                                        <span class="badge bg-light-warning">soon</span>
                                    </a>
                                </li>    
                            </ul>
                        </li>
                         
                        <li class="sidebar-item has-sub ">
                            <a href="#" class="sidebar-link">
                                <i class="bi bi-sliders text-primary"></i>
                                <span>P3A</span>
                            </a>
                            <ul class="submenu submenu-open" style="--submenu-height: 172px;">     
                                <li class="submenu-item ">
                                    <a href="#" class="submenu-link">Data P3A
                                        <span class="badge bg-light-warning">soon</span>
                                    </a>
                                </li>  
                            </ul>
                        </li> 
                        
                        <li class="sidebar-item <?=  (str_starts_with(uri_string(), 'bencana')) ? 'active' : ''; ?>   has-sub ">
                            <a href="#" class="sidebar-link">
                                <i class="bi bi-exclamation-triangle-fill text-primary <?=  (str_starts_with(uri_string(), 'bencana')) ? 'text-light' : ''; ?>"></i>
                                <span>Bencana</span>
                            </a>
                            <ul class="submenu <?=  (str_starts_with(uri_string(), 'bencana')) ? 'active' : ''; ?> submenu-open" style="--submenu-height: 172px;">     
                                <li class="submenu-item <?= (uri_string() == 'bencana') ? 'active' : ''; ?>">
                                    <a href="<?= base_url('bencana') ?>" class="submenu-link">Data Bencana</a>
                                </li>     
                                <li class="submenu-item  ">
                                    <a href="#" class="submenu-link head">
                                        Laporan Bencana
                                        <span class="badge bg-light-warning">soon</span>
                                    </a>
                                </li>   
                                <li class="submenu-item">
                                    <a href="#" class="submenu-link head">Satgas Bencana
                                        <span class="badge bg-light-warning">soon</span>
                                    </a>
                                </li>  
                            </ul>
                        </li>       

                        <li class="sidebar-item has-sub ">
                            <a href="#" class="sidebar-link">
                                <i class="bi bi-map-fill text-primary"></i>
                                <span>Arsip Peta</span>
                            </a>
                            <ul class="submenu submenu-open" style="--submenu-height: 172px;">     
                                <li class="submenu-item ">
                                    <a href="#" class="submenu-link">Data Peta
                                        <span class="badge bg-light-warning">soon</span>
                                    </a>
                                </li>     
                                <li class="submenu-item  ">
                                    <a href="#" class=" submenu-link">Arsip
                                        <span class="badge bg-light-warning">soon</span>
                                    </a>
                                </li>  
                            </ul>
                        </li>      
                        
                        <li class="sidebar-item has-sub ">
                            <a href="#" class="sidebar-link">
                                <i class="fa fa-desktop text-primary"></i>
                                <span>Monitoring</span>
                            </a>
                            <ul class="submenu submenu-open" style="--submenu-height: 172px;">     
                                <li class="submenu-item ">
                                    <a href="#" class="submenu-link">Screen
                                      <span class="badge bg-light-warning">soon</span>
                                    </a>
                                </li>     
                                <li class="submenu-item">
                                    <a href="#" class="submenu-link head">Kinerja SDA
                                       <span class="badge bg-light-warning">soon</span>
                                    </a>
                                </li>  
                                <li class="submenu-item  ">
                                    <a href="#" class=" submenu-link">P3A
                                        <span class="badge bg-light-warning">soon</span>
                                    </a>
                                </li>  
                                <li class="submenu-item  ">
                                    <a href="#" class=" submenu-link">Bencana
                                        <span class="badge bg-light-warning">soon</span>
                                    </a>
                                </li>  
                            </ul>
                        </li>          
                        
                        <li class="sidebar-item has-sub ">
                            <a href="#" class="sidebar-link">
                                <i class="bi bi-cpu text-primary"></i>
                                <span>AI</span>
                            </a>
                            <ul class="submenu submenu-open" style="--submenu-height: 172px;">     
                                <li class="submenu-item ">
                                    <a href="#" class="submenu-link ">Unit Center Assistant
                                    <span class="badge bg-light-warning">soon</span>
                                    </a>
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
       