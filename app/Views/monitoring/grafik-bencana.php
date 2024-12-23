<?= $this->extend('layout/v_template_backend') ?>
<?= $this->section('content') ?>

         <section class="section">
                        <div class="page-heading">
                            <h2 class="mb-0 lh-sm"><span class="fa fa-desktop text-primary" style="height: 35px; width: 60px;"></span>  <?= $title; ?></h2>
                        </div>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="<?= base_url('monitoring/grafik-bencana') ?>">
                       
                        <div class="row">
                        <div class="col">
                                    <label for="tahun">Filter Grafik Per Tahun:</label>
                                    <input 
                                        type="text" 
                                        id="tahun" 
                                        name="tahun" 
                                        class="datepicker form-control" 
                                        value="<?= $selectedYear ?>" 
                                        placeholder="Pilih Tahun Mulai" 
                                        required 
                                        style="height:38px;width:240px;"
                                        onchange="this.form.submit()"
                                    />
                                </div>
                        </div>

                        </form>
                        
                        <canvas id="bencanaChart" class="mb-5 mt-3" style="width :200px;height: 90px"></canvas>
                    </div>
                </div>
        </section>
        <script>
                // Grafik Bencana
                const ctx2 = document.getElementById('bencanaChart').getContext('2d');

                const dataBencana = {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                    datasets: [{
                        label: 'Jumlah Bencana',
                        data: <?= json_encode($grafik_bencana) ?>,
                        backgroundColor: '#f39c12',
                        borderColor: '#e67e22',
                        borderWidth: 1,
                        maxBarThickness: 50 // Batasi lebar batang
                    }]
                };

                new Chart(ctx2, {
                    type: 'bar',
                    data: dataBencana,
                    options: {
                        responsive: true,
                        maintainAspectRatio: true, // Supaya tinggi tetap
                        plugins: {
                            title: {
                                display: true,
                                text: 'Jumlah Bencana per Bulan Di tahun <?= $selectedYear; ?>'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Jumlah Bencana'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Bulan'
                                }
                            }
                        }
                    }
                });
        </script>
<?= $this->endSection() ?>    