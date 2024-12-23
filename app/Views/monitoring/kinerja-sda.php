<?= $this->extend('layout/v_template_backend') ?>
<?= $this->section('content') ?>

         <section class="section">
                        <div class="page-heading">
                            <h2 class="mb-0 lh-sm"><span class="fa fa-desktop text-primary" style="height: 35px; width: 60px;"></span>  <?= $title; ?></h2>
                        </div>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="<?= base_url('monitoring/kinerja-sda/filter') ?>">
                            <div class="row align-items-start">
                                <div class="col-auto">
                                    <label for="startYear">Mulai Dari Tahun:</label>
                                    <input 
                                        type="text" 
                                        id="startYear" 
                                        name="startYear" 
                                        class="datepicker form-control" 
                                        value="<?= $startYear ?>" 
                                        placeholder="Pilih Tahun Mulai" 
                                        required 
                                        style="height:38px;width:240px;"
                                    />
                                </div>
                                <div class="col-auto">
                                    <label for="endYear">Sampai Tahun:</label>
                                    <input 
                                        type="text" 
                                        id="endYear" 
                                        name="endYear" 
                                        class="datepicker form-control" 
                                        value="<?= $endYear ?>" 
                                        placeholder="Pilih Tahun Akhir" 
                                        required 
                                        style="height:38px;width:240px;" 
                                    />
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mt-4"><i class="bi bi-search me-1 mt-2"></i> Filter</button>
                                </div>
                            </div>
                        </form>
                        
                        <canvas id="lineChart" class="mt-4" width="200" height="90"></canvas>
                    </div>
                </div>
        </section>
        <script>
            const ctx = document.getElementById('lineChart').getContext('2d');
            const data = <?= json_encode($data) ?>;
            const tahunRange = <?= json_encode($tahun_range) ?>;

            const colors = {
                "sungai": "#FF5733",
                "danau": "#33FF57",
                "pantai": "#3357FF",
                "embung": "#FF33A6"
            };

            const datasets = [];
            Object.keys(data).forEach((jenis) => {
                datasets.push({
                    label: jenis,
                    data: tahunRange.map((tahun) => data[jenis][tahun] || 0),
                    borderColor: colors[jenis],
                    backgroundColor: colors[jenis],
                    fill: false,
                    tension: 0.1
                });
            });

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: tahunRange,
                    datasets: datasets
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: `Grafik Rata-Rata Penilaian SDA (${tahunRange[0]} - ${tahunRange[tahunRange.length - 1]})`
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Tahun'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            max: 100,
                            title: {
                                display: true,
                                text: 'Rata-Rata Nilai Kinerja'
                            }
                        }
                    }
                }
            });

        </script>
<?= $this->endSection() ?>    