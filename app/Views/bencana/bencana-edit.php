<?= $this->extend('layout/v_template_backend') ?>
<?= $this->section('content') ?>
           <section class="section">
                <div class="page-heading">
                    <h2 class="mb-0 lh-sm"><span class="bi bi-exclamation-triangle-fill" style="height: 70px; width: 60px;"></span> <?= $title ?></h2>
                </div>
                <section id="basic-horizontal-layouts">
                        <div class="row match-height">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Form Edit Data</h4>
                                        <?php
                                            if (session()->get('error')) {
                                                echo "<div class= 'alert alert-light-danger color-danger' role='alert'>" . session()->get('error') . "</div>";
                                            }
                                        ?>
                                    </div>
                                    <div class="card-header">
                                    <div class="progress px-1" style="height: 3px;">
                                        <div class="progress-bar step-line" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="step-container d-flex justify-content-between">
                                        <div class="step-circle" onclick="displayStep(1)">1</div>
                                        <div class="step-circle" onclick="displayStep(2)">2</div>
                                        <div class="step-circle" onclick="displayStep(3)">3</div>
                                    </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form action="<?= base_url('bencana/update-by/'. $data_bencana['id_bencana']);?>" method="post" id="multi-step-form" class="form form-horizontal">
                                                <input type="hidden" name="user_created" value="<?= $data_bencana['user_created']; ?>">
                                                <div class="form-body">
                                                    <div class="row step step-1">    
                                                            <div class="col-md-4">
                                                                <label for="jenis_kejadian"><b>Jenis Kejadian :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input class="form-control" type="text" name="jenis_kejadian" value="<?= $data_bencana['jenis_kejadian']; ?>">
                                                            </div> 

                                                            <div class="col-md-4">
                                                                <label for="hari_kejadian"><b>Hari Kejadian :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input class="form-control" type="text" name="hari_kejadian" value="<?= $data_bencana['hari_kejadian']; ?>">
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="tanggal_kejadian"><b>Tanggal Kejadian :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input class="form-control" type="date" name="tanggal_kejadian" value="<?= $data_bencana['tanggal_kejadian']; ?>">
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="waktu_kejadian"><b>Waktu Kejadian :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input class="form-control" type="time" name="waktu_kejadian" value="<?= $data_bencana['waktu_kejadian']; ?>">
                                                            </div>
                                                        <div class="col-12 d-flex justify-content-end mt-3">
                                                            <button type="button" class="btn btn-primary me-1 mb-1 next-step">Next</button>
                                                        </div>
                                                    </div>
                                                    <div class="row step step-2">    
                                                            <div class="col-md-4">
                                                                <label for="curahHujan-PosAir"><b>Curah Hujan Pos Air :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input class="form-control" type="text" name="curahHujan_PosAir" value="<?= $data_bencana['curahHujan_PosAir']; ?>">
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="dampak_bencana"><b>Dampak Bencana :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input class="form-control" type="text" name="dampak_bencana" value="<?= $data_bencana['dampak_bencana']; ?>">
                                                            </div>  

                                                            <div class="col-md-4">
                                                                <label for="lama_bahaya"><b>Lama Bahaya :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input class="form-control" type="text" name="lama_bahaya" value="<?= $data_bencana['lama_bahaya']; ?>">
                                                            </div> 

                                                            <div class="col-md-4">
                                                                <label for="penyebab_kronologis"><b>Penyabab Kronologis :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <textarea class="form-control" type="text" name="penyebab_kronologis"><?= $data_bencana['penyebab_kronologis']; ?></textarea>
                                                            </div>
                                                        <div class="col-12 d-flex justify-content-end mt-3">
                                                            <button type="button" class="btn btn-light-secondary me-1 mb-1 prev-step">Previous</button>
                                                            <button type="button" class="btn btn-primary me-1 mb-1 next-step">Next</button>
                                                        </div>
                                                    </div>    
                                                    <div class="row step step-3">    
                                                            <div class="col-md-4">
                                                                <label for="tindakan"><b>Tindakan :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <textarea class="form-control" type="text" name="tindakan"><?= $data_bencana['tindakan']; ?></textarea>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="kondisi"><b>Kondisi :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <textarea class="form-control" type="text" name="kondisi"><?= $data_bencana['kondisi']; ?></textarea>
                                                            </div>
                                                            
                                                            <div class="col-md-4">
                                                                <label for="usulan"><b>Usulan :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <textarea class="form-control" type="text" name="usulan"><?= $data_bencana['usulan']; ?></textarea>
                                                            </div>
                                                            
                                                            <div class="col-md-4">
                                                                <label for="tebusan"><b>Tebusan :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <textarea class="form-control" type="text" name="tebusan"><?= $data_bencana['tebusan']; ?></textarea>
                                                            </div>
                                                        <div class="col-12 d-flex justify-content-end mt-3">
                                                            <button type="button" class="btn btn-light-secondary me-1 mb-1 prev-step">Previous</button>
                                                            <button type="submit" class="btn btn-primary me-1 mb-1 ">Submit</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                          </div>
                    </section>
                <div>
                    <a href="<?= base_url('bencana') ?>" class="btn btn-danger"><i class="bi bi-box-arrow-in-left"></i> Kembali</a>
                </div>
            </section>
<?= $this->endSection() ?>  