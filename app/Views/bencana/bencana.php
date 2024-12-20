<?= $this->extend('layout/v_template_backend') ?>
<?= $this->section('content') ?>

<section class="section">
                        <div class="page-heading">
                            <h2 class="mb-0 lh-sm"><span class="bi bi-exclamation-triangle-fill text-primary" style="height: 35px; width: 60px;"></span>    <?= $title ?></h2>
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
                                        <a href="<?= base_url('bencana/create') ?>" type="button" class="btn btn-primary block" >
                                            Tambah Data
                                        </a>                                
                                   </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Waktu</th>
                                        <th class="text-center" >Jenis Bencana</th>
                                        <th class="text-center">Lama Bahaya</th>
                                        <th class="text-center">Updated At</th>
                                        <th width ="155px" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data_bencana as $key => $value) : ?>
                                    <tr>
                                        <td width ="50px" class="text-center"scope="row"><?= $i++; ?></td>
                                        <td class="text-center" ><?= $value['tanggal_kejadian']; ?></td>
                                        <td class="text-center"><?= $value['waktu_kejadian']; ?></td>
                                        <td class="text-center"><?= $value['jenis_kejadian']; ?></td>
                                        <td class="text-center"><?= $value['lama_bahaya']; ?></td>
                                        <td class="text-center" ><?= $value['updated_at']; ?></td>
                                        <td width ="200px" class="text-center"> 
                                        <a href="<?= base_url('bencana/detail/'. $value['id_bencana']);?>" type="button" data-bs-toggle="modal" class="btn btn-primary"> 
                                            <i class="bi bi-info-circle-fill"></i>
                                        </a>  
                                        <a href="<?= base_url('bencana/edit/'. $value['id_bencana']);?>" type="button"  class="btn btn-warning"> 
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a type="button" class="btn btn-danger btn-hapus" data-bs-toggle="modal" data-bs-target="#modal-delete-<?= $value['id_bencana']?>">
                                             <i class="bi bi-trash-fill"></i>
                                        </a>   
                                        </td>
                                    </tr>
                                    <!-- Modal Delete -->
                                    <div class="modal fade text-left" id="modal-delete-<?= $value['id_bencana']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title white" id="myModalLabel120">Hapus Data</h5>
                                                    <button type="button" class="close"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Apakah Anda Yakin Ingin Menghapus Data <?= $title ?> <strong><?= $value['jenis_kejadian']; ?></strong></div> 
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Batal</span>    
                                                    </button> 
                                                    
                                                    <a href="bencana/delete/<?=$value['id_bencana'];?>" class="btn btn-danger">
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
                </section>
<?= $this->endSection() ?>         