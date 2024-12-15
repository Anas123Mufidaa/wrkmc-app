<?= $this->extend('layout/v_template_backend') ?>
<?= $this->section('content') ?>

            <section class="section">
                        <div class="page-heading">
                            <h2 class="mb-0 lh-sm"><span class="bi bi-person-plus-fill text-primary" style="height: 35px; width: 60px;"></span>Tambah <?= $title ?></h2>
                        </div>
                <div class="card">
                        <div class="row">
                            <div class="col-8 ">
                                    <?php
                                    if (session()->get('error')) {
                                        echo "<div class= 'alert alert-light-danger color-danger' role='alert'>" . session()->get('error') . "</div>";
                                    }
                                    ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-primary block" data-bs-toggle="modal"  data-bs-target="#modalTambah">
                                            Tambah Data
                                        </button>                                
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th class="text-center fill text-primary">Nama User</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data_user as $key => $value) : ?>
                                    <tr>
                                        <td width ="50px" class="text-center"scope="row"><?= $i++; ?></td>
                                        <td class="text-center"><?= strtoupper($value['nama_user']); ?></td>
                                        <td class="text-center"><?= strtoupper($value['username']); ?></td>
                                        <td width ="150px" class="text-center"> 
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#editModal-<?= $value['id_user'] ?>" class="btn btn-warning"> 
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a type="button" class="btn btn-danger btn-hapus" data-bs-toggle="modal" data-bs-target="#modal-delete-<?= $value['id_user']?>">
                                             <i class="bi bi-trash-fill"></i>
                                        </a>   
                                        </td>
                                    </tr>
                                <!--Edit Data -->
                                <div class="modal fade text-left"  id="editModal-<?= $value['id_user'] ?>" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel1">Edit Data <?= $title; ?></h5>
                                                        <button type="button" class="close rounded-pill"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                            <form action="<?= base_url('profile/user/update-by/'. $value['id_user']);?>" method="post" ecntype="multipart/form-data">
                                                <div class="modal-body">
                                                    <input type="hidden" name="password_lama" value="<?= $value['password']; ?>">                                               
                                                    <div class="form-group" style="font-weight: bold;">
                                                        <label for="username">Password Baru</label>
                                                        <input type="password" name="password_baru" class="form-control"></input>
                                                    </div>    
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Close</span>
                                                        </button>
                                                        <button type="submit" class="btn btn-primary ml-1" name="tambah">Ubah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                      </div> 
                                    </div> 
                                    <!-- Modal Delete -->
                                    <div class="modal fade text-left" id="modal-delete-<?= $value['id_user']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title white" id="myModalLabel120">Hapus Data</h5>
                                                    <button type="button" class="close"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Apakah Anda Yakin Ingin Menghapus Data <?= $title ?> <strong><?= $value['nama_user']; ?></strong></div> 
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Batal</span>    
                                                    </button>
                                                    
                                                    <a href="user/delete/<?=$value['id_user'];?>" class="btn btn-danger">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Hapus</span>
                                                    </a>   
                                                </div>
                                            </div>
                                        </div>
                                      </div> 
                                    </div> 
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--Tambah Data -->
                    <div class="modal fade text-left" id="modalTambah" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel1">Tambah Data <?= $title; ?></h5>
                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                <div class="modal-body">
                            <form action="<?= base_url('profile/user/save') ?>" method="post" enctype="multipart/form-data">    
                                    <div class="form-group" style="font-weight: bold;">
                                        <label for="nama_user">Nama User</label>
                                        <input type="text" name="nama_user" class="form-control"></input>
                                    </div>                                        
                                    <div class="form-group" style="font-weight: bold;">
                                        <label for="username">Username</label>
                                        <input type="username" name="username"  class="form-control"></input>
                                    </div>                                      
                                    <div class="form-group" style="font-weight: bold;">
                                        <label for="password">Password</label>
                                        <input type="text" name="password"  class="form-control"></input>
                                    </div>                              
                                    <div class="form-group" style="font-weight: bold;">
                                        <label for="username">Foto User</label>
                                        <div class="d-flex justify-content-center mb-4">
                                            <img id="selectedAvatar" src="<?= base_url('backEnd_template') ?>/assets/foto_user/foto_default.jpg"
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
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        <button type="submit" class="btn btn-primary ml-1" name="tambah">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
<?= $this->endSection() ?>         