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
    <title>Dashboard Library SMAN 12 Makassar</title>
    <link rel="apple-touch-icon" href="/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/apexcharts.min.css">
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
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/morris.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/palette-gradient.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <?= $this->include("layouts/header") ?>


    <!-- BEGIN: Main Menu-->

    <?= $this->include("layouts/sidebar") ?>

    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <?= $this->renderSection('content') ?>
    <!-- END: Content-->


    <!-- BEGIN: Customizer-->
    <div class="customizer border-left-blue-grey border-left-lighten-4 d-none d-xl-block"><a class="customizer-close" href="#"><i class="ft-x font-medium-3"></i></a><a class="customizer-toggle bg-danger box-shadow-3" href="#"><i class="ft-settings font-medium-3 spinner white"></i></a>
        <div class="customizer-content p-2">
            <h4 class="text-uppercase mb-0">Theme Customizer</h4>
            <hr>
            <p>Customize & Preview in Real Time</p>
            <h5 class="mt-1 mb-1 text-bold-500">Menu Color Options</h5>
            <div class="form-group">
                <!-- Outline Button group -->
                <div class="btn-group customizer-sidebar-options" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-info" data-sidebar="menu-light">Light Menu</button>
                    <button type="button" class="btn btn-outline-info" data-sidebar="menu-dark">Dark Menu</button>
                </div>
            </div>
            <hr>
            <h5 class="mt-1 text-bold-500">Layout Options</h5>
            <ul class="nav nav-tabs nav-underline nav-justified layout-options">
                <li class="nav-item">
                    <a class="nav-link layouts active" id="baseIcon-tab21" data-toggle="tab" aria-controls="tabIcon21" href="#tabIcon21" aria-expanded="true">Layouts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navigation" id="baseIcon-tab22" data-toggle="tab" aria-controls="tabIcon22" href="#tabIcon22" aria-expanded="false">Navigation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar" id="baseIcon-tab23" data-toggle="tab" aria-controls="tabIcon23" href="#tabIcon23" aria-expanded="false">Navbar</a>
                </li>
            </ul>
            <div class="tab-content px-1 pt-1">
                <div role="tabpanel" class="tab-pane active" id="tabIcon21" aria-expanded="true" aria-labelledby="baseIcon-tab21">
                    <div class="custom-control custom-checkbox mb-1">
                        <input type="checkbox" class="custom-control-input" name="collapsed-sidebar" id="collapsed-sidebar">
                        <label class="custom-control-label" for="collapsed-sidebar">Collapsed Menu</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-1">
                        <input type="checkbox" class="custom-control-input" name="fixed-layout" id="fixed-layout">
                        <label class="custom-control-label" for="fixed-layout">Fixed Layout</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-1">
                        <input type="checkbox" class="custom-control-input" name="boxed-layout" id="boxed-layout">
                        <label class="custom-control-label" for="boxed-layout">Boxed Layout</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-1">
                        <input type="checkbox" class="custom-control-input" name="static-layout" id="static-layout">
                        <label class="custom-control-label" for="static-layout">Static Layout</label>
                    </div>
                </div>
                <div class="tab-pane" id="tabIcon22" aria-labelledby="baseIcon-tab22">
                    <div class="custom-control custom-checkbox mb-1">
                        <input type="checkbox" class="custom-control-input" name="native-scroll" id="native-scroll">
                        <label class="custom-control-label" for="native-scroll">Native Scroll</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-1">
                        <input type="checkbox" class="custom-control-input" name="right-side-icons" id="right-side-icons">
                        <label class="custom-control-label" for="right-side-icons">Right Side Icons</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-1">
                        <input type="checkbox" class="custom-control-input" name="bordered-navigation" id="bordered-navigation">
                        <label class="custom-control-label" for="bordered-navigation">Bordered Navigation</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-1">
                        <input type="checkbox" class="custom-control-input" name="flipped-navigation" id="flipped-navigation">
                        <label class="custom-control-label" for="flipped-navigation">Flipped Navigation</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-1">
                        <input type="checkbox" class="custom-control-input" name="collapsible-navigation" id="collapsible-navigation">
                        <label class="custom-control-label" for="collapsible-navigation">Collapsible Navigation</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-1">
                        <input type="checkbox" class="custom-control-input" name="static-navigation" id="static-navigation">
                        <label class="custom-control-label" for="static-navigation">Static Navigation</label>
                    </div>
                </div>
                <div class="tab-pane" id="tabIcon23" aria-labelledby="baseIcon-tab23">
                    <div class="custom-control custom-checkbox mb-1">
                        <input type="checkbox" class="custom-control-input" name="brand-center" id="brand-center">
                        <label class="custom-control-label" for="brand-center">Brand Center</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-1">
                        <input type="checkbox" class="custom-control-input" name="navbar-static-top" id="navbar-static-top">
                        <label class="custom-control-label" for="navbar-static-top">Static Top</label>
                    </div>
                </div>
            </div>
            <hr>
            <h5 class="mt-1 text-bold-500">Navigation Color Options</h5>
            <ul class="nav nav-tabs nav-underline nav-justified color-options">
                <li class="nav-item w-100">
                    <a class="nav-link nav-semi-light active" id="color-opt-1" data-toggle="tab" aria-controls="clrOpt1" href="#clrOpt1" aria-expanded="false">Semi Light</a>
                </li>
                <li class="nav-item  w-100">
                    <a class="nav-link nav-semi-dark" id="color-opt-2" data-toggle="tab" aria-controls="clrOpt2" href="#clrOpt2" aria-expanded="false">Semi Dark</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-dark" id="color-opt-3" data-toggle="tab" aria-controls="clrOpt3" href="#clrOpt3" aria-expanded="false">Dark</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-light" id="color-opt-4" data-toggle="tab" aria-controls="clrOpt4" href="#clrOpt4" aria-expanded="true">Light</a>
                </li>
            </ul>
            <div class="tab-content px-1 pt-1">
                <div role="tabpanel" class="tab-pane active" id="clrOpt1" aria-expanded="true" aria-labelledby="color-opt-1">
                    <div class="row">
                        <div class="col-6">
                            <h6>Solid</h6>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input bg-blue-grey" data-bg="bg-blue-grey" id="default">
                                <label class="custom-control-label" for="default">Default</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input bg-primary" data-bg="bg-primary" id="primary">
                                <label class="custom-control-label" for="primary">Primary</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input bg-danger" data-bg="bg-danger" id="danger">
                                <label class="custom-control-label" for="danger">Danger</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input bg-success" data-bg="bg-success" id="success">
                                <label class="custom-control-label" for="success">Success</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input bg-blue" data-bg="bg-blue" id="blue">
                                <label class="custom-control-label" for="blue">Blue</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input bg-cyan" data-bg="bg-cyan" id="cyan">
                                <label class="custom-control-label" for="cyan">Cyan</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input bg-pink" data-bg="bg-pink" id="pink">
                                <label class="custom-control-label" for="pink">Pink</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <h6>Gradient</h6>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-slight-clr" checked class="custom-control-input bg-blue-grey" data-bg="bg-gradient-x-grey-blue" id="bg-gradient-x-grey-blue">
                                <label class="custom-control-label" for="bg-gradient-x-grey-blue">Default</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input bg-primary" data-bg="bg-gradient-x-primary" id="bg-gradient-x-primary">
                                <label class="custom-control-label" for="bg-gradient-x-primary">Primary</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input bg-danger" data-bg="bg-gradient-x-danger" id="bg-gradient-x-danger">
                                <label class="custom-control-label" for="bg-gradient-x-danger">Danger</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input bg-success" data-bg="bg-gradient-x-success" id="bg-gradient-x-success">
                                <label class="custom-control-label" for="bg-gradient-x-success">Success</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input bg-blue" data-bg="bg-gradient-x-blue" id="bg-gradient-x-blue">
                                <label class="custom-control-label" for="bg-gradient-x-blue">Blue</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input bg-cyan" data-bg="bg-gradient-x-cyan" id="bg-gradient-x-cyan">
                                <label class="custom-control-label" for="bg-gradient-x-cyan">Cyan</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-slight-clr" class="custom-control-input bg-pink" data-bg="bg-gradient-x-pink" id="bg-gradient-x-pink">
                                <label class="custom-control-label" for="bg-gradient-x-pink">Pink</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="clrOpt2" aria-labelledby="color-opt-2">
                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-sdark-clr" checked class="custom-control-input bg-default" data-bg="bg-default" id="opt-default">
                        <label class="custom-control-label" for="opt-default">Default</label>
                    </div>
                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-sdark-clr" class="custom-control-input bg-primary" data-bg="bg-primary" id="opt-primary">
                        <label class="custom-control-label" for="opt-primary">Primary</label>
                    </div>
                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-sdark-clr" class="custom-control-input bg-danger" data-bg="bg-danger" id="opt-danger">
                        <label class="custom-control-label" for="opt-danger">Danger</label>
                    </div>
                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-sdark-clr" class="custom-control-input bg-success" data-bg="bg-success" id="opt-success">
                        <label class="custom-control-label" for="opt-success">Success</label>
                    </div>
                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-sdark-clr" class="custom-control-input bg-blue" data-bg="bg-blue" id="opt-blue">
                        <label class="custom-control-label" for="opt-blue">Blue</label>
                    </div>
                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-sdark-clr" class="custom-control-input bg-cyan" data-bg="bg-cyan" id="opt-cyan">
                        <label class="custom-control-label" for="opt-cyan">Cyan</label>
                    </div>
                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-sdark-clr" class="custom-control-input bg-pink" data-bg="bg-pink" id="opt-pink">
                        <label class="custom-control-label" for="opt-pink">Pink</label>
                    </div>
                </div>
                <div class="tab-pane" id="clrOpt3" aria-labelledby="color-opt-3">
                    <div class="row">
                        <div class="col-6">
                            <h3>Solid</h3>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-dark-clr" class="custom-control-input bg-blue-grey" data-bg="bg-blue-grey" id="solid-blue-grey">
                                <label class="custom-control-label" for="solid-blue-grey">Default</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-dark-clr" class="custom-control-input bg-primary" data-bg="bg-primary" id="solid-primary">
                                <label class="custom-control-label" for="solid-primary">Primary</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-dark-clr" class="custom-control-input bg-danger" data-bg="bg-danger" id="solid-danger">
                                <label class="custom-control-label" for="solid-danger">Danger</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-dark-clr" class="custom-control-input bg-success" data-bg="bg-success" id="solid-success">
                                <label class="custom-control-label" for="solid-success">Success</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-dark-clr" class="custom-control-input bg-blue" data-bg="bg-blue" id="solid-blue">
                                <label class="custom-control-label" for="solid-blue">Blue</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-dark-clr" class="custom-control-input bg-cyan" data-bg="bg-cyan" id="solid-cyan">
                                <label class="custom-control-label" for="solid-cyan">Cyan</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-dark-clr" class="custom-control-input bg-pink" data-bg="bg-pink" id="solid-pink">
                                <label class="custom-control-label" for="solid-pink">Pink</label>
                            </div>
                        </div>

                        <div class="col-6">
                            <h3>Gradient</h3>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-dark-clr" class="custom-control-input bg-blue-grey" data-bg="bg-gradient-x-grey-blue" id="bg-gradient-x-grey-blue1">
                                <label class="custom-control-label" for="bg-gradient-x-grey-blue1">Default</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-primary" data-bg="bg-gradient-x-primary" id="bg-gradient-x-primary1">
                                <label class="custom-control-label" for="bg-gradient-x-primary1">Primary</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-danger" data-bg="bg-gradient-x-danger" id="bg-gradient-x-danger1">
                                <label class="custom-control-label" for="bg-gradient-x-danger1">Danger</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-success" data-bg="bg-gradient-x-success" id="bg-gradient-x-success1">
                                <label class="custom-control-label" for="bg-gradient-x-success1">Success</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-blue" data-bg="bg-gradient-x-blue" id="bg-gradient-x-blue1">
                                <label class="custom-control-label" for="bg-gradient-x-blue1">Blue</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-cyan" data-bg="bg-gradient-x-cyan" id="bg-gradient-x-cyan1">
                                <label class="custom-control-label" for="bg-gradient-x-cyan1">Cyan</label>
                            </div>
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-pink" data-bg="bg-gradient-x-pink" id="bg-gradient-x-pink1">
                                <label class="custom-control-label" for="bg-gradient-x-pink1">Pink</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="clrOpt4" aria-labelledby="color-opt-4">
                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-light-clr" class="custom-control-input bg-blue-grey" data-bg="bg-blue-grey bg-lighten-4" id="light-blue-grey">
                        <label class="custom-control-label" for="light-blue-grey">Default</label>
                    </div>
                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-light-clr" class="custom-control-input bg-primary" data-bg="bg-primary bg-lighten-4" id="light-primary">
                        <label class="custom-control-label" for="light-primary">Primary</label>
                    </div>
                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-light-clr" class="custom-control-input bg-danger" data-bg="bg-danger bg-lighten-4" id="light-danger">
                        <label class="custom-control-label" for="light-danger">Danger</label>
                    </div>
                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-light-clr" class="custom-control-input bg-success" data-bg="bg-success bg-lighten-4" id="light-success">
                        <label class="custom-control-label" for="light-success">Success</label>
                    </div>
                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-light-clr" class="custom-control-input bg-blue" data-bg="bg-blue bg-lighten-4" id="light-blue">
                        <label class="custom-control-label" for="light-blue">Blue</label>
                    </div>
                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-light-clr" class="custom-control-input bg-cyan" data-bg="bg-cyan bg-lighten-4" id="light-cyan">
                        <label class="custom-control-label" for="light-cyan">Cyan</label>
                    </div>
                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" name="nav-light-clr" class="custom-control-input bg-pink" data-bg="bg-pink bg-lighten-4" id="light-pink">
                        <label class="custom-control-label" for="light-pink">Pink</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Customizer-->

    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2023 <a class="text-bold-800 grey darken-2" href="https://1.envato.market/modern_admin" target="_blank">Fitri Aulia</a></span><span class="float-md-right d-none d-lg-block">Hand-crafted & Made with<i class="ft-heart pink"></i><span id="scroll-top"></span></span></p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?= base_url() ?>js/vendors.min.js"></script>
    <script src="<?= base_url() ?>js/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>js/apexcharts.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= base_url() ?>js/chart.min.js"></script>
    <script src="<?= base_url() ?>js/raphael-min.js"></script>
    <script src="<?= base_url() ?>js/morris.min.js"></script>
    <script src="<?= base_url() ?>js/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="<?= base_url() ?>js/jquery-jvectormap-world-mill.js"></script>
    <script src="<?= base_url() ?>js/visitor-data.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= base_url() ?>js/app-menu.min.js"></script>
    <script src="<?= base_url() ?>js/app.min.js"></script>
    <script src="<?= base_url() ?>js/customizer.min.js"></script>
    <script src="<?= base_url() ?>js/footer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?= base_url() ?>js/datatables-basic.min.js"></script>
    <script src="<?= base_url() ?>js/dashboard-sales.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <?= $this->renderSection('javascript') ?>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>