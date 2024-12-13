
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Wrkmc-App</title>
    <link rel="icon"  type="image/png" href="<?= base_url('web_naila_residence') ?>/images/logo-web.png" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('backEnd_template') ?>/assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?= base_url('backEnd_template') ?>/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="<?= base_url('backEnd_template') ?>/assets/vendors/fontawesome/all.min.css">

    <link rel="stylesheet" href="<?= base_url('backEnd_template') ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url('backEnd_template') ?>/assets/vendors/bootstrap-icons/bootstrap-icons.css">
     
    <link rel="stylesheet" href="<?= base_url('backEnd_template') ?>/assets/vendors/choices.js/choices.min.css" />
    <link rel="stylesheet" href="<?= base_url('backEnd_template') ?>/assets/css/app.css">
    <link rel="stylesheet" href="<?= base_url('backEnd_template') ?>/assets/css/mycss.css">
    <link rel="shortcut icon" href="<?= base_url('backEnd_template') ?>/assets/images/favicon.svg" type="image/x-icon">\
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!-- notiflix -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notiflix/dist/notiflix-3.2.6.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/notiflix/dist/notiflix-3.2.6.min.js"></script>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
        
        <?= $this->include('layout/menu') ?>
        </div>
        
        <div id="main">
            <?= $this->renderSection('content') ?>
        </div>
        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <p>2024 © Anas Mufida</p>
            </div>
        </footer>
    </div>
    </div>
    <script src="<?= base_url('backEnd_template') ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url('backEnd_template') ?>/assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url('backEnd_template') ?>/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="<?= base_url('backEnd_template') ?>/assets/vendors/fontawesome/all.min.js"></script>
    <script src="<?= base_url('backEnd_template') ?>/assets/js/pages/dashboard.js"></script>

    <script src="<?= base_url('backEnd_template') ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url('backEnd_template') ?>/assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url('backEnd_template') ?>/assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url('backEnd_template') ?>/assets/vendors/choices.js/choices.min.js"></script>
    <script src="<?= base_url('backEnd_template') ?>/assets/vendors/choices.js/choices.min.js"></script>
    <script src="<?= base_url('backEnd_template') ?>/assets/js/main.js"></script>
    <!-- my js -->
    <script src="<?= base_url('backEnd_template') ?>/assets/js/app.js"></script>
    <script src="<?= base_url('backEnd_template') ?>/assets/js/my.js"></script>

    <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        <?php if (session()->getFlashdata('success')) : ?>
            Notiflix.Notify.success('<?= session()->getFlashdata('success'); ?>', {
                position: 'right-top', // Posisi atas tengah
                timeout: 4000, // Durasi dalam milidetik
                clickToClose: true, // Menutup saat diklik
                backgroundColor: '#1b3c35', // Warna background
                width: '300px',
                useFontAwesome: true,
            });
            <?php endif; ?>           
            <?php if (session()->getFlashdata('failed')) : ?>
                Notiflix.Notify.failure('<?= session()->getFlashdata('failed'); ?>', {
                    position: 'right-top', // Posisi atas tengah
                    timeout: 4000, // Durasi dalam milidetik
                    clickToClose: true, // Menutup saat diklik
                    width: '300px',
                    useFontAwesome: true,
                });
            <?php endif; ?>   
            <?php if (session()->getFlashdata('delete-success')) : ?>
                Notiflix.Notify.failure('<?= session()->getFlashdata('delete-success'); ?>', {
                    position: 'right-top', // Posisi atas tengah
                    timeout: 4000, // Durasi dalam milidetik
                    clickToClose: true, // Menutup saat diklik
                    width: '300px',
                    useFontAwesome: true,
                });
            <?php endif; ?>   
    });
</script>
</body>
</html>