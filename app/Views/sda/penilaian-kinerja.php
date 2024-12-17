<?= $this->extend('layout/v_template_backend') ?>
<?= $this->section('content') ?>

<section class="section">
                        <div class="page-heading">
                            <h2 class="mb-0 lh-sm"><span class="bi bi-bar-chart-line text-primary" style="height: 35px; width: 60px;"></span> Data <?= $title ?></h2>
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
                                        <button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#modalTambah">
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
                                        <th class="text-center">Nama SDA</th>
                                        <th class="text-center">Jenis SDA</th>
                                        <th class="text-center">Tanggal Penilaian</th>
                                        <th class="text-center">Nilai Kinerja</th>
                                        <th class="text-center">Catatan Penilaian</th>
                                        <th class="text-center">Updated At</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data_penilaian as $key => $value) : ?>
                                    <tr>
                                        <td width ="50px" class="text-center"scope="row"><?= $i++; ?></td>
                                        <td class="text-center"><?= $value['nama_sda']; ?></td>
                                        <td class="text-center"><?= $value['jenis_sda']; ?></td>
                                        <td class="text-center"><?= $value['tanggal_penilaian']; ?></td>
                                        <td class="text-center"><?= $value['nilai_kinerja']; ?></td>
                                        <td class="text-center"><?= $value['catatan_penilaian']; ?></td>
                                        <td class="text-center"><?= $value['updated_at']; ?></td>
                                        <td width ="160px" class="text-center"> 
                                        <!-- <a href="<?= base_url('sda/penilaian-kinerja/detail/'. $value['id_penilaian']);?>"" type="button" data-bs-toggle="modal" class="btn btn-primary"> 
                                            <i class="bi bi-info-circle-fill"></i>
                                        </a>    -->
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#editModal-<?= $value['id_penilaian'] ?>" class="btn btn-warning"> 
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a type="button" class="btn btn-danger btn-hapus" data-bs-toggle="modal" data-bs-target="#modal-delete-<?= $value['id_penilaian']?>">
                                             <i class="bi bi-trash-fill"></i>
                                        </a>   
                                        </td>
                                    </tr>
                                <!--Edit Data -->
                                <div class="modal fade text-left edit-modal"  id="editModal-<?= $value['id_penilaian'] ?>" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel1">Edit Data <?= $title; ?></h5>
                                                        <button type="button" class="close rounded-pill"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                            <form action="<?= base_url('sda/penilaian-kinerja/update-by/'. $value['id_penilaian']);?>" method="post">
                                                <div class="modal-body">
                                                    <input type="hidden" name="user_created" value="<?= $value['user_created']; ?>">                                    
                                                    <div class="form-group" style="font-weight: bold;">
                                                        <label for="id_sda">Nama SDA</label>
                                                        <select class="form-select" name="id_sda" style="height:50px;width:100%;">
                                                                <option value="">Pilih Sda</option>
                                                                <?php foreach ($sda as $k) : ?>
                                                                    <?php if($value['id_sda'] === $k['id_sda']) : ?>
                                                                        <option value="<?= $k['id_sda']; ?>" selected><?= $k['nama_sda']; ?></option>
                                                                    <?php else : ?>
                                                                        <option value="<?= $k['id_sda']; ?>"><?= $k['nama_sda']; ?></option>   
                                                                    <?php endif; ?>     
                                                                <?php endforeach; ?>
                                                        </select>
                                                    </div> 
                                                    <div class="form-group" style="font-weight: bold;">
                                                        <label for="tanggal_penilaian">Tanggal Penilaian</label>
                                                        <input type="date" name="tanggal_penilaian" class="form-control" style="height:50px;width:100%;" value="<?= $value['tanggal_penilaian']; ?>"></input>
                                                    </div>
                                                    <div class="form-group" style="font-weight: bold;">
                                                        <label for="nilai_kinerja">Nilai Kinerja</label>
                                                        <input type="text" name="nilai_kinerja" class="form-control" style="height:50px;width:100%;" value="<?= $value['nilai_kinerja']; ?>"></input>
                                                    </div> 
                                                    <div class="form-group" style="font-weight: bold;">
                                                        <label for="catatan_penilaian">Catatan Penilaian</label>
                                                        <input type="text" name="catatan_penilaian" class="form-control" style="height:50px;width:100%;" value="<?= $value['catatan_penilaian']; ?>"></input>
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
                                    <div class="modal fade text-left" id="modal-delete-<?= $value['id_penilaian']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title white" id="myModalLabel120">Hapus Data</h5>
                                                    <button type="button" class="close"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Apakah Anda Yakin Ingin Menghapus Data <?= $title ?> <strong><?= $value['nama_sda']; ?></strong></div> 
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Batal</span>    
                                                    </button> 
                                                    
                                                    <a href="penilaian-kinerja/delete/<?=$value['id_penilaian'];?>" class="btn btn-danger">
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
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel1">Tambah Data <?= $title; ?></h5>
                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                <div class="modal-body">
                                <form action="<?= base_url('sda/penilaian-kinerja/save') ?>" method="post" >   
                                    <div class="form-group" style="font-weight: bold;">
                                        <label for="id_sda">Nama Sda</label>
                                        <select class="form-select" name="id_sda" style="height:50px;width:100%;">
                                            <option value="">Pilih SDA</option>
                                            <?php foreach ($sda as $k) : ?>
                                                <option value="<?= $k['id_sda'] ?>"><?= $k['nama_sda'] ?></option>
                                            <?php endforeach; ?>
                                        </select>                                       
                                    </div>  
                                    <div class="form-group" style="font-weight: bold;">
                                        <label for="tanggal_penilaian">Tanggal Penilaian</label>
                                        <input type="date" name="tanggal_penilaian" class="form-control" style="height:50px;width:100%;"></input>
                                    </div>
                                    <div class="form-group" style="font-weight: bold;">
                                        <label for="nilai_kinerja">Nilai Kinerja</label>
                                        <input type="text" name="nilai_kinerja" class="form-control" style="height:50px;width:100%;"></input>
                                    </div> 
                                    <div class="form-group" style="font-weight: bold;">
                                        <label for="catatan_penilaian">Catatan Penilaian</label>
                                        <input type="text" name="catatan_penilaian" class="form-control" style="height:50px;width:100%;"></input>
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