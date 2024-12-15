<?= $this->extend('layout/v_template_backend') ?>
<?= $this->section('content') ?>
                       <section class="section">
                                <div class="col">
                                    <div class="text-center">
                                        <img style="width:800px;height:500px;" src="<?= base_url('backEnd_template') ?>/assets/images/samples/error-500.png" alt="System Error">
                                        <h1 class="error-title">Maaf!!</h1>
                                        <p class="fs-5 text-gray-600">Anda tidak memiliki akses untuk fitur ini</p>
                                    </div>
                                </div>
                        </section>
<?= $this->endSection() ?>   