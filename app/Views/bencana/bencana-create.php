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
                                        <h4 class="card-title">Form Tambah Data</h4>
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
                                            <form action="<?= base_url('bencana/save') ?>" method="post" id="multi-step-form" class="form form-horizontal">
                                                <div class="form-body">
                                                    <div class="row step step-1">    
                                                            <div class="col-md-4">
                                                                <label for="jenis_kejadian"><b>Jenis Kejadian :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input class="form-control" type="text" name="jenis_kejadian">
                                                            </div> 

                                                            <div class="col-md-4">
                                                                <label for="hari_kejadian"><b>Hari Kejadian :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input class="form-control" type="text" name="hari_kejadian">
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="tanggal_kejadian"><b>Tanggal Kejadian :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input class="form-control" type="date" name="tanggal_kejadian">
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="waktu_kejadian"><b>Waktu Kejadian :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input class="form-control" type="time" name="waktu_kejadian">
                                                            </div>             
                                                            
                                                            <div class="col-md-4">
                                                                <label for="waktu_kejadian"><b>Tempat Kejadian :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input class="form-control" type="text" name="tempat_kejadian">
                                                            </div>

                                                        <div class="col-12 d-flex justify-content-end mt-3">
                                                            <button type="button" class="btn btn-primary me-1 mb-1 next-step">Next</button>
                                                        </div>
                                                    </div>
                                                    <div class="row step step-2">    
                                                            <div class="col-md-4">
                                                                <label for="curahHujan-PosAir"><b>Curah Hujan dan POS Duga Air :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <textarea class="form-control" type="text" name="curahHujan_PosAir"></textarea>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="dampak_bencana"><b>Dampak Bencana :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <textarea class="form-control" type="text" name="dampak_bencana"></textarea>
                                                            </div>  

                                                            <div class="col-md-4">
                                                                <label for="lama_bahaya"><b>Lama Bahaya :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input class="form-control" type="text" name="lama_bahaya">
                                                            </div> 

                                                            <div class="col-md-4">
                                                                <label for="penyebab_kronologis"><b>Penyabab Kronologis :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <textarea class="form-control" type="text" name="penyebab_kronologis"></textarea>
                                                            </div>
                                                        <div class="col-12 d-flex justify-content-end mt-3">
                                                            <button type="button" class="btn btn-light-secondary me-1 mb-1 prev-step">Previous</button>
                                                            <button type="button" class="btn btn-primary me-1 mb-1 next-step">Next</button>
                                                        </div>
                                                    </div>    
                                                    <div class="row step step-3">    
                                                            <div class="col-md-4">
                                                                <label for="tindakan"><b>Tindakan yang telah dilakukan :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <textarea class="form-control" type="text" name="tindakan"></textarea>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="kondisi"><b>Kondisi Saat Ini :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <textarea class="form-control" type="text" name="kondisi"></textarea>
                                                            </div>
                                                            
                                                            <div class="col-md-4">
                                                                <label for="usulan"><b>Usulan Penanganan  :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <textarea class="form-control" type="text" name="usulan"></textarea>
                                                            </div>
                                                            
                                                            <div class="col-md-4">
                                                                <label for="tebusan"><b>Tebusan :</b></label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <textarea class="form-control" type="text" name="tebusan" rows="3"></textarea>
                                                            </div>

                                                            <!-- tinymce quill -->
                                                            <!-- <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Full Editor</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <p>Block some text to display options in poppovers </p>
                                                                <div id="quill-editor" style="height: 200px;"></div>
                                                                <textarea name="tebusan" id="quill-content" placeholder="contoh" value="hdahahdkasjhdjk" hidden ></textarea>
                                                            </div> -->
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
            <!-- <script>
                var quill = new Quill('#quill-editor', {
                    theme: 'snow'
                });

                // Sinkronisasi isi Quill ke textarea
                document.querySelector('form').onsubmit = function() {
                    document.querySelector('#quill-content').value = quill.root.innerHTML;
                };
            </script> -->
<?= $this->endSection() ?>  