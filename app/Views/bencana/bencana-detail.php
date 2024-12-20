<?= $this->extend('layout/v_template_backend') ?>
<?= $this->section('content') ?>
           <section class="section">
                <div class="page-heading">
                    <h2 class="mb-0 lh-sm"><span class="bi bi-exclamation-triangle-fill" style="height: 70px; width: 60px;"></span> <?= $title ?></h2>
                </div>
                    <div class="section__content section__content--p30">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Data Bencana</h3>
                                            </div>
                                            <div class="card-body">
                                                <table class="table" style="min-height: 310px;font-weight:bold;" cellpadding="10">
                                                <tr>
                                                    <td class="head">User Created </td>
                                                    <td>:</td>
                                                    <td ><?= $detail_bencana['created_by']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="head">Jenis Kejadian </td>
                                                    <td>:</td>
                                                    <td><?= $detail_bencana['jenis_kejadian']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="head">Hari Kejadian </td>
                                                    <td>:</td>
                                                    <td><?= $detail_bencana['hari_kejadian']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="head">Tanggal Kejadian </td>
                                                    <td>:</td>
                                                    <td><?= $detail_bencana['tanggal_kejadian']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="head">Waktu Kejadian </td>
                                                    <td>:</td>
                                                    <td><?= $detail_bencana['waktu_kejadian']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="head">Tempat Kejadian </td>
                                                    <td>:</td>
                                                    <td><?= $detail_bencana['tempat_kejadian']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="head">Penyebab Kronologis </td>
                                                    <td>:</td>
                                                    <td><?= $detail_bencana['penyebab_kronologis']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="head">Curah Hujan dan POS Duga Air  </td>
                                                    <td>:</td>
                                                    <td><?= $detail_bencana['curahHujan_PosAir']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="head">Dampak Bencana </td>
                                                    <td>:</td>
                                                    <td><?= $detail_bencana['dampak_bencana']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="head">Lama Bahaya</td>
                                                    <td>:</td>
                                                    <td><?= $detail_bencana['lama_bahaya']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="head">Tindakan yang telah dilakukan :</td>
                                                    <td>:</td>
                                                    <td><?= $detail_bencana['tindakan']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="head">Kondisi Saat Ini</td>
                                                    <td>:</td>
                                                    <td><?= $detail_bencana['kondisi']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="head">Usulan Penanganan</td>
                                                    <td>:</td>
                                                    <td><?= $detail_bencana['usulan']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="head">Tebusan</td>
                                                    <td>:</td>
                                                    <td><?= $detail_bencana['tebusan']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Created At</td>
                                                    <td>:</td>
                                                    <td><?= $detail_bencana['updated_at']; ?></td>
                                                </tr>   
                                                <tr>
                                                    <td>Updated At</td>
                                                    <td>:</td>
                                                    <td><?= $detail_bencana['updated_at']; ?></td>
                                                </tr>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= base_url('bencana') ?>" class="btn btn-danger"><i class="bi bi-box-arrow-in-left"></i> Kembali</a>
                            </div>
                        </div>
                        </div>
                    </section>
<?= $this->endSection() ?>  