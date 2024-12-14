<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webiz Digital Agency | Bootstrap Template </title>
    <meta name="description" content="">
    <link rel="canonical" href="https://www.nameagency.com">
    <meta property="og:url" content="https://www.nameagency.com">
    <link rel="stylesheet" href="<?= base_url('frontEnd_template') ?>/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('frontEnd_template') ?>/images/ico/apple-touch-icon-144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('frontEnd_template') ?>/images/ico/apple-touch-icon-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('frontEnd_template') ?>/images/ico/apple-touch-icon-72.png">
    <link rel="apple-touch-icon-precomposed" href="<?= base_url('frontEnd_template') ?>/images/ico/apple-touch-icon-57.png">
  </head>
  <body>
    <!-- Navbar Menu  ---->
    <section id="nav-bar">
      <nav class="navbar navbar-expand-lg navbar-light">
         <a class="navbar-brand" href="#">
           <img src="<?= base_url('logo-wrkmc') ?>/Logo-PU.jpg" alt="">
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <i class="fa fa-bars"></i>
         </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/'); ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('auth/login'); ?>" ><button type="button" class="btn btn-outline-light">Masuk <i class="fa fa-sign-in"></i></button></a>
            </li>
          </ul>
        </div>
      </nav>
    </section>
    <!--- Banner Hero section ------->
    <section class="banner">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p class="promo-title">WRKMC</p>
            <p class="join-title">Join Us! We Will Let Grown Your Business Faster</p>
          </div>
            <div class="col-md-6">
              <img src="<?= base_url('logo-wrkmc') ?>/img_landing.png" alt="" class="img-fluid">
            </div>
        </div>
      </div>
        <!--- Background wave Hero ---->
        <img src="<?= base_url('frontEnd_template') ?>/images/ground@-min.png" class="bottom-img" alt="">
    </section>

    <!--- Services ---->
    <section id="services">
      <div class="container text-center">
        <h3 class="title text-center">ABOUT</h3>

      </div>
    </section>
   
    <!-- Footer ------>
    <section id="footer">
        <div class="container">
          <div class="row">
            <div class="col-md-4 footer-box">
              <img src="<?= base_url('logo-wrkmc') ?>/Logo-PU.jpg" alt="">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="col-md-12">
              <p class="copyright">Created By &copy; by Anas Mufida 2024 &mdash;</p>
            </div>
          </div>
          <br>
        </div>
    </section>
    <!--- Smooth Scroll js ---------->
    <script type="text/javascript" src="js/smooth-scroll.js"></script>
    <script>
	    var scroll = new SmoothScroll('a[href*="#"]');
    </script>
  </body>
</html>
