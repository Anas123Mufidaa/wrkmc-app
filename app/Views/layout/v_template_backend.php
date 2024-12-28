
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
    <link rel="stylesheet" href="<?= base_url('backEnd_template') ?>/assets/css/my.css">

    <link rel="stylesheet" href="<?= base_url('backEnd_template') ?>/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="<?= base_url('backEnd_template') ?>/assets/vendors/fontawesome/all.min.css">

    <link rel="stylesheet" href="<?= base_url('backEnd_template') ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url('backEnd_template') ?>/assets/vendors/bootstrap-icons/bootstrap-icons.css">
         
    <link rel="stylesheet" href="<?= base_url('backEnd_template') ?>/assets/vendors/choices.js/choices.min.css" />
    <link rel="stylesheet" href="<?= base_url('backEnd_template') ?>/assets/css/app.css">
    <link rel="shortcut icon" href="<?= base_url('backEnd_template') ?>/assets/images/favicon.svg" type="image/x-icon">

    <!-- notiflix -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notiflix/dist/notiflix-3.2.6.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/notiflix/dist/notiflix-3.2.6.min.js"></script>

    <!-- CDN CSS untuk Dropify -->
    <link href="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/css/dropify.min.css" rel="stylesheet">
    <!-- CDN CSS untuk Lightbox -->
    <link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" rel="stylesheet">
    <!-- datatable -->
    <link rel="stylesheet" href="<?= base_url('backEnd_template') ?>/assets/vendors/datatables/dataTables.css">
    <link href="https://cdn.datatables.net/fixedcolumns/5.0.4/css/fixedColumns.dataTables.css" rel="stylesheet">
 
    <link href="https://cdn.jsdelivr.net/npm/quill/dist/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/quill/dist/quill.min.js"></script>
     
    <!-- chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- datepicker -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <style>
        .dt-input{
            margin-right:15px;
        }
        #nilaiOutputEdit {
            visibility: visible !important;
        } 

    </style>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
        
            <?= $this->include('layout/menu') ?>
        </div>
        </div>
        
        <div id="main">
          <div class="page-content">
            <?= $this->renderSection('content') ?>
           </div>

            
            <footer>
                <!-- <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>Developed By &copy; Anas Mufida 2024 &mdash;</p>
                    </div>
                </div> -->
            </footer>
        </div>
    </div>
    <script src="<?= base_url('backEnd_template') ?>/assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url('backEnd_template') ?>/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="<?= base_url('backEnd_template') ?>/assets/vendors/fontawesome/all.min.js"></script>
    <script src="<?= base_url('backEnd_template') ?>/assets/js/pages/dashboard.js"></script>

    <script src="<?= base_url('backEnd_template') ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="<?= base_url('backEnd_template') ?>/assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url('backEnd_template') ?>/assets/vendors/choices.js/choices.min.js"></script>
    <script src="<?= base_url('backEnd_template') ?>/assets/js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/js/dropify.min.js"></script>
     <!-- CDN JS untuk Lightbox -->
     <script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js"></script>
    <!-- datatable -->
     <script src="<?= base_url('backEnd_template') ?>/assets/vendors/datatables/dataTables.js"></script>
     <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
     <script src="https://cdn.datatables.net/fixedcolumns/5.0.4/js/dataTables.fixedColumns.js"></script>
     <script src="https://cdn.datatables.net/fixedcolumns/5.0.4/js/fixedColumns.dataTables.js"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
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
            $(document).ready(function () {
                $('.datepicker').datepicker({
                    format: "yyyy",       // Format hanya tahun
                    viewMode: "years",    // Menampilkan tahun saja
                    minViewMode: "years", // Menampilkan tahun saja
                    autoclose: true       // Menutup otomatis setelah memilih tahun
                });
            });

    });
</script>
</body>
</html>