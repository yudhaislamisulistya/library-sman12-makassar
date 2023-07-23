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
                <div class="col-xl-12 col-12">
                    <div class="alert bg-primary alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
                        <span class="alert-icon"><i class="la la-heart"></i></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        Selamat Datang! <strong><?= getNameUserById(session()->get('id_user')) ?> </strong> Anda Login Sebagai Kepala Sekolah
                    </div>
                </div>
                <div class="col-xl-12 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h6 class="text-muted">Data Buku</h6>
                                                <h3><?= count(getBooks()) ?></h3>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="icon-book-open success font-large-2 float-right"></i>
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
                                                <h3><?= count(getLoans()) ?></h3>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="icon-basket info font-large-2 float-right"></i>
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
                                                <h3><?= count(getReturns()) ?></h3>
                                            </div>
                                            <div class="align-self-center">
                                                <i class="icon-basket-loaded danger font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <!-- Area Spline Chart Start -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">Grafik Peminjaman dan Pengembalian</div>
                                    <div id="data-peminjaman-pengembalian"></div>
                                </div>
                            </div>
                            <!-- area spline chart end -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Data Pengembalian</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table id="datatable-return" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nomor Anggota</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Judul Buku</th>
                                                        <th>Tanggal Pinjam</th>
                                                        <th>Tanggal Harus Kembali</th>
                                                        <th>Tanggal Kembali</th>
                                                        <th>Denda</th>
                                                        <?php

                                                        if (session()->get('role') == 2) {
                                                            echo '<th>Action</th>';
                                                        }

                                                        ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($data_returns as $data_return) : ?>
                                                        <tr>
                                                            <td><?= $data_return->nomor_anggota ?></td>
                                                            <td><?= $data_return->nama_siswa ?></td>
                                                            <td><?= $data_return->judul_buku ?></td>
                                                            <td><?= $data_return->tanggal_pinjam ?></td>
                                                            <td><?= $data_return->tanggal_harus_kembali ?></td>
                                                            <td>
                                                                <?php

                                                                if ($data_return->tanggal_kembali == null) {
                                                                    echo "- (Silahkan Set Pengembalian Buku)";
                                                                } else {
                                                                    echo $data_return->tanggal_kembali;
                                                                }

                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $today = date('Y-m-d');
                                                                $due_date = $data_return->tanggal_harus_kembali;
                                                                $denda = 0;

                                                                $tanggal_kembali = $data_return->tanggal_kembali;

                                                                if ($tanggal_kembali != null) {
                                                                    if ($tanggal_kembali > $due_date) {
                                                                        $datetime1_new = new DateTime($tanggal_kembali);
                                                                        $datetime2_new = new DateTime($due_date);
                                                                        $interval = $datetime1_new->diff($datetime2_new);
                                                                        $denda = $interval->format('%a') * 1000;
                                                                        $denda = "Rp. " . number_format($denda, 0, ',', '.');
                                                                    } else if ($tanggal_kembali > $due_date) {
                                                                        $denda = 0;
                                                                    }
                                                                } else {
                                                                    if ($today > $due_date) {
                                                                        $datetime1 = new DateTime($today);
                                                                        $datetime2 = new DateTime($due_date);
                                                                        $interval = $datetime1->diff($datetime2);
                                                                        $denda = $interval->format('%a') * 1000;
                                                                        $denda = "Rp. " . number_format($denda, 0, ',', '.');
                                                                    }
                                                                }

                                                                echo $denda;
                                                                ?>
                                                            </td>
                                                            <?php

                                                            if (session()->get('role') == 2) {
                                                                echo '<td>
                                                            <a href="#" class="btn btn-warning btn-sm btn-edit" data-id="' . $data_return->id_pinjam . '" data-nomor-anggota="' . $data_return->nomor_anggota . '" data-nama-siswa="' . $data_return->nama_siswa . '" data-judul-buku="' . $data_return->judul_buku . '" data-tanggal-pinjam="' . $data_return->tanggal_pinjam . '" data-tanggal-harus-kembali="' . $data_return->tanggal_harus_kembali . '" data-tanggal-kembali="' . $data_return->tanggal_kembali . '" data-denda="' . $denda . '"><i class="ft-edit"></i></a>
                                                            <button class="btn btn-danger btn-sm btn-delete" data-id="' . $data_return->id_pinjam . '" data-toggle="modal" data-target="#deleteModal"><i class="ft-trash"></i></button>
                                                        </td>';
                                                            }
                                                            ?>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Nomor Anggota</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Judul Buku</th>
                                                        <th>Tanggal Pinjam</th>
                                                        <th>Tanggal Harus Kembali</th>
                                                        <th>Tanggal Kembali</th>
                                                        <th>Denda</th>
                                                        <?php

                                                        if (session()->get('role') == 2) {
                                                            echo '<th>Action</th>';
                                                        }

                                                        ?>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
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

<?php



?>


<?= $this->section('javascript') ?>
<script>
    $(document).ready(function() {

        var options = {
            series: [{
                name: 'Peminjaman',
                data: [
                    <?php
                    foreach (getLoansTotalLoanGroupByYear() as $data) {
                        echo $data['total'] . ',';
                    }
                    ?>
                ]
            }, {
                name: 'Pengembalian',
                data: [
                    <?php
                    foreach (getLoansTotalReturnGroupByYear() as $data) {
                        echo $data['total'] . ',';
                    }
                    ?>
                ]
            }],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                // type year
                type: 'year',
                categories: [
                    <?php
                    foreach (getLoansTotalLoanGroupByYear() as $data) {
                        echo "'" . $data['tahun'] . "',";
                    }
                    ?>
                ],
            },
            tooltip: {
                x: {
                    format: 'yyyy'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#data-peminjaman-pengembalian"), options);
        chart.render();

        $('#datatable-return').DataTable({
            dom: 'Blfrtip',
            buttons: {
                dom: {
                    button: {
                        className: 'btn btn-info mr-1' //Primary class for all buttons
                    }
                },
                buttons: [{
                        extend: 'copyHtml5',
                        title: 'Data Export Data Pengembalian <?php echo date('d-m-Y H:i:s'); ?>',
                        text: '<i class="fa fa-copy"></i> Copy',
                    },
                    {
                        extend: 'excelHtml5',
                        title: 'Data Export Data Pengembalian <?php echo date('d-m-Y H:i:s'); ?>',
                        text: '<i class="fa fa-file-excel-o"></i> Excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        },
                    },
                    {
                        extend: 'csvHtml5',
                        title: 'Data Export Data Pengembalian <?php echo date('d-m-Y H:i:s'); ?>',
                        text: '<i class="fa fa-file-text-o"></i> CSV',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        },
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Data Export Data Pengembalian <?php echo date('d-m-Y H:i:s'); ?>',
                        text: '<i class="fa fa-file-pdf-o"></i> PDF',
                        customize: function(doc) {
                            doc.defaultStyle.fontSize = 10;
                            doc.pagePadding = [10, 10, 10, 10];
                            doc.styles.tableHeader.fontSize = 10;
                            doc.styles.title.fontSize = 12;
                            doc.styles.title.alignment = 'center';
                        },
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        },
                    },
                    {
                        extend: 'print',
                        title: 'Data Export Data Pengembalian <?php echo date('d-m-Y H:i:s'); ?>',
                        text: '<i class="fa fa-print"></i> Print',
                        pageSize: 'A4',
                        customize: function(win) {
                            $(win.document.body).css('font-size', '10pt');
                            $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
                            // title center
                            $(win.document.body).find('h1').css('text-align', 'center');
                            // add margin page all side
                            $(win.document.body).css('margin', '10px');
                            // remove default page two printing

                        },
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        },
                    }
                ]
            }
        });
    });
</script>
<?= $this->endSection() ?>