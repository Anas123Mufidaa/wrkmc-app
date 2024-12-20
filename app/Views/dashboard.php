<?= $this->extend('layout/v_template_backend') ?>
<?= $this->section('content') ?>
           <section class="section">
                <div class="page-heading">
                    <h2 class="mb-0 lh-sm"><span class="bi bi-house-door-fill" style="height: 70px; width: 60px;"></span> <?= $title ?></h2>
                </div>

                <div class="card-body py-5 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="<?= base_url('backEnd_template') ?>/assets/foto_user/<?= $data_user['foto_user']; ?>" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">Nama : <?= $data_user['nama_user']; ?></h5>
                            <h6 class="text-muted mb-0">Username :  <?= $data_user['username']; ?></h6>
                        </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card"> 
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total User</h6>
                                    <h2 class="font-extrabold mb-0"><?= $user['total_user']; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="bi bi-exclamation-triangle-fill text-white mb-3 me-2"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Bencana</h6>
                                    <h6 class="font-extrabold mb-0"><?= $bencana['total_bencana']; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="bi-droplet-half mt-1"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Sumber Daya Air</h6>
                                    <h2 class="font-extrabold mb-0"><?= $sda['total_sda']; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="bi bi-bar-chart-line mb-3 " style="margin-right:11px;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Penilaian Kinerja</h6>
                                    <h6 class="font-extrabold mb-0"><?= $penilaian['total_penilaian']; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
<?= $this->endSection() ?>        