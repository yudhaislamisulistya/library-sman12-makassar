<!DOCTYPE html>
<!--
Template Name: Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
Author: PixInvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://1.envato.market/modern_admin
Renew Support: https://1.envato.market/modern_admin
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Register Akun Siswa - Perpustakaan SMAN 12 Makassar</title>
    <link rel="apple-touch-icon" href="<?= base_url() ?>images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/icheck.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/custom.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/components.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/login-register.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column   blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                            <?php if (isset($validation)) : ?>
                                <div class=col-12>
                                    <div class="alert alert-danger alert-dismissable alert-style-1 text-white">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <i class="zmdi zmdi-block"></i><?= $validation->listErrors() ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (session()->getFlashData('status') == "success") { ?>
                                <div class="alert alert-success alert-dismissable alert-style-1 text-white">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="zmdi zmdi-check"></i>Akun Berhasil Dibuat
                                </div>
                            <?php } else if (session()->getFlashData('status') == "failed") { ?>
                                <div class="alert alert-info alert-dismissable alert-style-1 text-white">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="zmdi zmdi-info-outline"></i>Proses Gagal!!!
                                </div>
                            <?php } ?>
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <div class="p-1"><img src="<?= base_url() ?>images/sma.png" alt="branding logo"></div>
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Login with Perpustakaan SMA Negeri 12 Makassar</span>
                                    </h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal form-simple" action="<?= route_to('auth.postRegister') ?>" novalidate method="POST">
                                            <div class="form-group">
                                                <label>Nama Siswa</label>
                                                <input type="text" class="form-control" name="nama_siswa" placeholder="Nama Siswa" pattern="[A-Za-z\s]+" title="Hanya diperbolehkan inputan teks" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Kelas</label>
                                                <select class="form-control" name="kelas" required>
                                                    <option value="" disabled>Pilih Kelas</option>
                                                    <option value="1 IPA">1 IPA</option>
                                                    <option value="2 IPA">2 IPA</option>
                                                    <option value="3 IPA">3 IPA</option>
                                                    <option value="1 IPS">1 IPS</option>
                                                    <option value="2 IPS">2 IPS</option>
                                                    <option value="3 IPS">3 IPS</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>NISN</label>
                                                <input type="text" class="form-control" name="nisn" placeholder="NISN" required>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <?php
                                                    $year = substr(date('Y'), 2, 2);

                                                    // Mendapatkan nilai dari getLastNumberMember() atau set ke 0 jika bernilai null
                                                    $lastNumberMember = getLastNumberMember();

                                                    if ($lastNumberMember == 0) {
                                                        $lastNumberMember = 0;
                                                    } else {
                                                        $lastNumberMember = substr($lastNumberMember, 2, 4);
                                                    }
                                                    


                                                    $lastNumberMember = str_pad((int)$lastNumberMember + 1, 4, '0', STR_PAD_LEFT);
                                                    ?>

                                                    <div class="form-group">
                                                        <label>Nomor</label>
                                                        <input type="text" class="form-control" value="<?= $year ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label>Anggota</label>
                                                        <input type="text" class="form-control" name="nomor_anggota" placeholder="Nomor Anggota" value="<?= $lastNumberMember; ?>" required readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Nomor Telepon</label>
                                                <input type="text" class="form-control" name="nomor_telepon" placeholder="Nomor Telepon" required>
                                            </div>
                                            <button type="submit" class="btn btn-info btn-block"><i class="ft-unlock"></i> Register</button>
                                            <div class="form-group mt-2">
                                                <p class="text-center">Sudah Punya Akun? <a href="<?= route_to('auth.login') ?>" class="card-link">Login</a></p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?= base_url() ?>js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= base_url() ?>js/icheck.min.js"></script>
    <script src="<?= base_url() ?>js/jqBootstrapValidation.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= base_url() ?>js/app-menu.min.js"></script>
    <script src="<?= base_url() ?>js/app.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?= base_url() ?>js/form-login-register.min.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>