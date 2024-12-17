<?= $this->extend('layout/v_template_backend') ?>
<?= $this->section('content') ?>
           <section class="section">
                <div class="page-heading">
                    <h2 class="mb-0 lh-sm"><span class="bi bi-droplet-half" style="height: 70px; width: 60px;"></span> <?= $title ?></h2>
                </div>
                    <div class="section__content section__content--p30">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="text-right"><?= $detail_sda['nama_sda']; ?></h4>
                                            </div>
                                            <div class="card-body">
                                                <a href="<?= base_url('backEnd_template') ?>/assets/gambar_sda/<?= $detail_sda['gambar_sda']; ?>" data-lightbox="gallery" data-title="Gambar SDA">
                                                    <img style="min-height: 355px; width: 100%; display: block;" src="<?= base_url('backEnd_template') ?>/assets/gambar_sda/<?= $detail_sda['gambar_sda']; ?>" alt="Gambar SDA">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Detail Data Sda</h3>
                                            </div>
                                            <div class="card-body">
                                                <table class="table" style="min-height: 310px;font-weight:bold;" cellpadding="10">
                                                <tr>
                                                    <td>Nama SDA</td>
                                                    <td>:</td>
                                                    <td ><?= $detail_sda['nama_sda']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis SDA</td>
                                                    <td>:</td>
                                                    <td><?= $detail_sda['jenis_sda']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <td><?= $detail_sda['alamat']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Deskripsi SDA</td>
                                                    <td>:</td>
                                                    <td><?= $detail_sda['deskripsi_sda']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>User Created</td>
                                                    <td>:</td>
                                                    <td><?= $detail_sda['created_by']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>User Updated</td>
                                                    <td>:</td>
                                                    <td><?= $detail_sda['updated_by']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Created At</td>
                                                    <td>:</td>
                                                    <td><?= $detail_sda['updated_at']; ?></td>
                                                </tr>   
                                                <tr>
                                                    <td>Updated At</td>
                                                    <td>:</td>
                                                    <td><?= $detail_sda['updated_at']; ?></td>
                                                </tr>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= base_url('sda') ?>" class="btn btn-danger"><i class="bi bi-box-arrow-in-left"></i> Kembali</a>
                            </div>
                        </div>
                        </div>
                    </section>
<?= $this->endSection() ?>  