<?= $this->extend('layout/v_template_backend') ?>
<?= $this->section('content') ?>
           <section class="section">
                    <div class="page-heading">
                        <h2 class="mb-0 lh-sm text-primary"><span class="bi bi-person-badge text-primary" style="height: 70px; width: 60px;"></span> <?= $title ?></h2>
                    </div>
                    <section id="basic-vertical-layouts">
                        <div class="row match-height">
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Edit Profile</h4>
                                        <?php
                                        if (session()->get('errorProfile')) {
                                            echo "<div class= 'alert alert-light-danger color-danger' role='alert'>" . session()->get('errorProfile') . "</div>";
                                        }
                                        ?>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form action="<?= base_url('profile/update-profile/' . $data_user['id_user']) ?>" method="POST" class="form form-vertical" enctype="multipart/form-data">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="fotoUser_lama" value="<?= $data_user['foto_user']; ?>"> 
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12 mb-2">
                                                            <div class="form-group">
                                                                <label for="username">Foto</label>
                                                                <div class="d-flex justify-content-center mb-4">
                                                                    <img id="selectedAvatar" src="<?= base_url('backEnd_template') ?>/assets/foto_user/<?= $data_user['foto_user']; ?>"
                                                                    class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover;" alt="Foto" />
                                                                </div>
                                                                <div class="d-flex justify-content-center">
                                                                    <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                                                                        <label class="form-label text-white m-1" for="customFile2">Choose file</label>
                                                                        <input type="file" name="foto_user" class="form-control d-none" accept="image/*" id="customFile2" onchange="displaySelectedImage(event, 'selectedAvatar')" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="username">Username</label>
                                                                <div class="position-relative">
                                                                    <input type="text" id="username" class="form-control" name="username" value="<?= $data_user['username']; ?>" readonly>
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-person"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="name">Nama</label>
                                                                <div class="position-relative">
                                                                    <input type="text" id="name" class="form-control" name="nama_user" value="<?= $data_user['nama_user']; ?>">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-person"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Edit Password Anda</h4>
                                        <?php
                                        if (session()->get('error')) {
                                            echo "<div class= 'alert alert-light-danger color-danger' role='alert'>" . session()->get('error') . "</div>";
                                        }
                                        ?>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form action="<?= base_url('profile/update-password') ?>" method="POST" class="form form-vertical" enctype="multipart/form-data">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="id_user" value="<?= $data_user['id_user']; ?>">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Password Lama</label>
                                                                <div class="position-relative">
                                                                    <input type="password" class="form-control" name="password_lama" placeholder="Password Lama" id="password-id-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-lock"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>                  
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon2">Password Baru</label>
                                                                <div class="position-relative">
                                                                    <input type="password" class="form-control" name="password_baru" placeholder="Password Baru" id="password-id-icon2">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-lock"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>                  
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon3">Konfirmasi Password Baru</label>
                                                                <div class="position-relative">
                                                                    <input type="password" class="form-control" name="confirm_password" placeholder="Konfirmasi Password Baru" id="password-id-icon3">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-lock"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
            </section>
<?= $this->endSection() ?>        