<?= $this->extend('layouts/master'); ?>

<?= $this->section('content'); ?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Revenue, Hit Rate & Deals -->
            <form method="POST" action="<?= route_to('postReport') ?>">
                <!-- div tahun group -->
                <div class="form-group">
                    <label>Pencarian Tahun</label>
                    <select class="form-control" id="tahun" name="tahun">
                        <option value="">--Pilih Tahun--</option>
                        <?php

                        $tahun = [];
                        for ($i = 2010; $i <= date('Y'); $i++) {
                            $tahun[] = $i;
                        }

                        ?>
                        <?php foreach ($tahun as $t) : ?>
                            <option value="<?= $t ?>"><?= $t ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Submit</button>
            </form>
            <div class="row">
                <div class="col-xl-12 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h6 class="text-muted">Data Buku</h6>
                                                <h3><?= count($data_date_books) ?></h3>
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
                                                <h3><?= count($data_date_loans) ?></h3>
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
                                                <h3><?= count($data_date_returns) ?></h3>
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
                </div>
            </div>
            <!--/ Revenue, Hit Rate & Deals -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Riwayat</h4>
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
                            <table id="datatable-laporan-riwayat" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tahun</th>
                                        <th>Data Buku</th>
                                        <th>Peminjaman</th>
                                        <th>Pengembalian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tahun as $t) : ?>
                                        <tr>
                                            <td><?= $t ?></td>
                                            <td><?= count(getBookByDate($t)) ?></td>
                                            <td><?= count(getLoanByDate($t)) ?></td>
                                            <td><?= count(getReturnByDate($t)) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tahun</th>
                                        <th>Data Buku</th>
                                        <th>Peminjaman</th>
                                        <th>Pengembalian</th>
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
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    $(document).ready(function() {
        $('#datatable-laporan-riwayat').DataTable({
            dom: 'Blfrtip',
            buttons: {
                dom: {
                    button: {
                        className: 'btn btn-info mr-1' //Primary class for all buttons
                    }
                },
                buttons: [{
                        extend: 'copyHtml5',
                        title: 'Data Export Data Laporan Riwayat <?php echo date('d-m-Y H:i:s'); ?>',
                        text: '<i class="fa fa-copy"></i> Copy',
                    },
                    {
                        extend: 'excelHtml5',
                        title: 'Data Export Data Laporan Riwayat <?php echo date('d-m-Y H:i:s'); ?>',
                        text: '<i class="fa fa-file-excel-o"></i> Excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        },
                    },
                    {
                        extend: 'csvHtml5',
                        title: 'Data Export Data Laporan Riwayat <?php echo date('d-m-Y H:i:s'); ?>',
                        text: '<i class="fa fa-file-text-o"></i> CSV',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        },
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Data Export Data Laporan Riwayat <?php echo date('d-m-Y H:i:s'); ?>',
                        text: '<i class="fa fa-file-pdf-o"></i> PDF',
                        customize: function(doc) {
                            doc.defaultStyle.fontSize = 10;
                            doc.pagePadding = [10, 10, 10, 10];
                            doc.styles.tableHeader.fontSize = 10;
                            doc.styles.title.fontSize = 12;
                            doc.styles.title.alignment = 'center';

                            // Set table width to 100% and auto table width calculation
                            doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                            doc.content[1].margin = [0, 5, 0, 10];

                            // Center align all cells
                            doc.content[1].table.body.forEach(function(row) {
                                row.forEach(function(cell) {
                                    cell.alignment = 'center';
                                });
                            });
                        },
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        },
                    },
                    {
                        extend: 'print',
                        title: 'Data Export Data Laporan Riwayat <?php echo date('d-m-Y H:i:s'); ?>',
                        text: '<i class="fa fa-print"></i> Print',
                        pageSize: 'A4',
                        customize: function(win) {
                            $(win.document.body).css('font-size', '10pt');
                            $(win.document.body).find('table').css('width', '100%').css('border-collapse', 'collapse').css('border', '1px solid #ddd');
                            $(win.document.body).find('table th, table td').css('text-align', 'center').css('padding', '5px');
                            $(win.document.body).find('h1').css('text-align', 'center');
                            $(win.document.body).css('margin', '10px');
                        },
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        },
                    }

                ]
            }
        });
    });
</script>
<?= $this->endSection() ?>