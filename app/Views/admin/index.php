<?= $this->extend('layouts/master'); ?>

<?= $this->section('content'); ?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Revenue, Hit Rate & Deals -->
            <div class="row">
                <div class="col-xl-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Statistik Peminjaman dan Pengembalian</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body pt-0">
                                <div class="row mb-1">
                                    <div class="col-6 col-md-4">
                                        <h5>Peminjaman</h5>
                                        <h2 class="danger">100</h2>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <h5>Pengembalian</h5>
                                        <h2 class="text-muted">200</h2>
                                    </div>
                                </div>
                                <div class="chartjs">
                                    <canvas id="thisYearRevenue" width="400" class="position-absolute"></canvas>
                                    <canvas id="lastYearRevenue" width="400"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h6 class="text-muted">Data Buku</h6>
                                                <h3>120</h3>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="icon-trophy success font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h6 class="text-muted">Peminjaman</h6>
                                                <h3>40</h3>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="icon-trophy success font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h6 class="text-muted">Pengembalian</h6>
                                                <h3>10</h3>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="icon-call-in danger font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="recent-sales" class="col-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ringkasan Laporan Riwayat</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" href="invoice-summary.html" target="_blank">View all</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content mt-1">
                                    <div class="table-responsive">
                                        <table id="recent-orders" class="table table-hover table-xl mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0">Buku</th>
                                                    <th class="border-top-0">Jumlah Buku</th>
                                                    <th class="border-top-0">Pinjaman</th>
                                                    <th class="border-top-0">Pengembalian</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-truncate">Madilog</td>
                                                    <td class="text-truncate">120</td>
                                                    <td class="text-truncate">30</td>
                                                    <td class="text-truncate">10</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-truncate">Fuzzy Logic</td>
                                                    <td class="text-truncate">120</td>
                                                    <td class="text-truncate">30</td>
                                                    <td class="text-truncate">50</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-truncate">MADM</td>
                                                    <td class="text-truncate">100</td>
                                                    <td class="text-truncate">20</td>
                                                    <td class="text-truncate">10</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--/ Revenue, Hit Rate & Deals -->
        </div>
    </div>
</div>
<?= $this->endSection() ?>