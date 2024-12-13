<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('backEnd_template') ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('backEnd_template') ?>/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('backEnd_template') ?>/assets/css/app.css">
    <link rel="stylesheet" href="<?= base_url('backEnd_template') ?>/assets/css/pages/auth.css">
    <!-- notiflix -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notiflix/dist/notiflix-3.2.6.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/notiflix/dist/notiflix-3.2.6.min.js"></script>
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="<?= base_url('backEnd_template') ?>/Logo-PU.jpg" alt="Logo"></a>    
                    </div>
                    <h6 class="auth-title">Wrkmc <span>Apps</span></h6>
                        <?php
                            if (session()->get('error')) {
                                echo "<div class= 'alert alert-light-danger color-danger' role='alert'>" . session()->get('error') . "</div>";
                            }
                        ?>
  
                    <form action="<?= url_to('login/cek') ?>" method="post">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="username" class="form-control form-control-xl" name="username" placeholder="Username" autocomplete="off">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password" placeholder="Password" autocomplete="off">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                </div>
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <p>Copyright &copy; by Anas Mufida 2024 &mdash;</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
            </div>
          </div>
        </div>
    </div>
    <script type="text/javascript">
       document.addEventListener("DOMContentLoaded", function() {
            <?php if (session()->getFlashdata('failed')) : ?>
                Notiflix.Notify.failure('<?= session()->getFlashdata('failed');  ?>', {
                    position: 'right-top', // Posisi atas tengah
                    timeout: 4000, // Durasi dalam milidetik
                    clickToClose: true, // Menutup saat diklik
                    backgroundColor: '#1b3c35', // Warna background
                    width: '350px',
                });
            <?php endif; ?>  
        });
    </script>
</body>
</html>