<?= $this->extend('layouts/master'); ?>

<?= $this->section('content'); ?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Revenue, Hit Rate & Deals -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
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
                                <i class="zmdi zmdi-check"></i>Proses Berhasil
                            </div>
                        <?php } else if (session()->getFlashData('status') == "failed") { ?>
                            <div class="alert alert-info alert-dismissable alert-style-1 text-white">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="zmdi zmdi-info-outline"></i>Proses Gagal!!!
                            </div>
                        <?php } ?>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Buku</h4>
                                <?php

                                if (session()->get('role') == 2) {
                                    echo '<button type="button" class="btn btn-success mt-1" data-toggle="modal" data-target="#addModal">Tambah Buku</button>';
                                }

                                ?>
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
                                        <table id="datatable-book" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Gambar</th>
                                                    <th>Judul Buku</th>
                                                    <th>Kode Buku</th>
                                                    <th>Pengarang</th>
                                                    <th>Penerbit</th>
                                                    <th>Tahun Terbit</th>
                                                    <th>Jumlah</th>
                                                    <th>Jenis Buku</th>
                                                    <th>Rak</th>
                                                    <!-- <th>Kode Klasifikasi</th> -->
                                                    <th>Status</th>
                                                    <?php

                                                    if (session()->get('role') == 2) {
                                                        echo '<th>Action</th>';
                                                    }

                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data as $key => $value) { ?>
                                                    <tr>
                                                        <td style="text-align: center;vertical-align: middle;">
                                                            <?php

                                                            if ($value->gambar == null) {
                                                                $value->gambar = 'default.jpg';
                                                            }

                                                            ?>
                                                            <img src="<?= base_url('images/books/' . $value->gambar) ?>" width="100px" height="100px">
                                                        </td>
                                                        <td style="text-align: center;vertical-align: middle;"><?= $value->judul_buku ?></td>
                                                        <td style="text-align: center;vertical-align: middle;"><?= $value->kode_buku ?></td>
                                                        <td style="text-align: center;vertical-align: middle;"><?= $value->pengarang ?></td>
                                                        <td style="text-align: center;vertical-align: middle;"><?= $value->penerbit ?></td>
                                                        <td style="text-align: center;vertical-align: middle;"><?= $value->tahun_terbit ?></td>
                                                        <td style="text-align: center;vertical-align: middle;"><?= $value->jumlah_buku ?></td>
                                                        <td style="text-align: center;vertical-align: middle;"><?= $value->jenis_buku ?></td>
                                                        <td style="text-align: center;vertical-align: middle;"><?= $value->rak ?></td>
                                                        <td style="text-align: center;vertical-align: middle;">
                                                            <?php

                                                            if ($value->status_buku == "Tersedia - Bisa Dipinjam") {
                                                                echo '<span class="badge badge-success">Tersedia - Bisa Dipinjam</span>';
                                                            } else if ($value->status_buku == "Tersedia - Tidak Bisa Dipinjam") {
                                                                echo '<span class="badge badge-warning">Tersedia - Tidak Bisa Dipinjam</span>';
                                                            } else if ($value->status_buku == "Tidak Tersedia") {
                                                                echo '<span class="badge badge-danger">Tidak Tersedia</span>';
                                                            } else {
                                                                echo '<span class="badge badge-secondary">Lainnya</span>';
                                                            }

                                                            ?>
                                                        </td>
                                                        <?php

                                                        if (session()->get('role') == 2) {
                                                            echo '<td style="text-align: center;vertical-align: middle;">';
                                                            echo '<a href="#" class="btn btn-warning btn-sm btn-edit" data-id-buku="' . $value->id_buku . '" data-judul-buku="' . $value->judul_buku . '" data-kode-buku="' . $value->kode_buku . '" data-pengarang="' . $value->pengarang . '" data-penerbit="' . $value->penerbit . '" data-tahun-terbit="' . $value->tahun_terbit . '" data-jumlah-buku="' . $value->jumlah_buku . '" data-jenis-buku="' . $value->jenis_buku . '" data-rak="' . $value->rak . '" data-kode-klasifikasi="' . $value->kode_klasifikasi . '" data-status-buku="' . $value->status_buku . '" data-gambar="' . $value->gambar . '"><i class="ft-edit"></i></a>';
                                                            echo '<a href="#" class="btn btn-danger btn-sm btn-delete" data-toggle="modal" data-id="' . $value->id_buku . '" data-target="#deleteModal"><i class="ft-trash"></i></a>';
                                                            echo '</td>';
                                                        }

                                                        ?>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Gambar</th>
                                                    <th>Judul Buku</th>
                                                    <th>Kode Buku</th>
                                                    <th>Pengarang</th>
                                                    <th>Penerbit</th>
                                                    <th>Tahun Terbit</th>
                                                    <th>Jumlah</th>
                                                    <th>Jenis Buku</th>
                                                    <th>Rak</th>
                                                    <!-- <th>Kode Klasifikasi</th> -->
                                                    <th>Status</th>
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
            </section>
        </div>
        <!--/ Revenue, Hit Rate & Deals -->
    </div>
</div>
</div>

<!-- Modal Add book-->
<form action="<?= route_to('book.add') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Buku</label>
                        <input type="text" class="form-control" name="kode_buku" placeholder="Kode Buku" required>
                    </div>
                    <div class="form-group">
                        <label>Judul Buku</label>
                        <input type="text" class="form-control" name="judul_buku" placeholder="Judul Buku" required>
                    </div>
                    <div class="form-group">
                        <label>Pengarang</label>
                        <input type="text" class="form-control" name="pengarang" placeholder="Pengarang" required>
                    </div>
                    <div class="form-group">
                        <label>Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" placeholder="Penerbit" required>
                    </div>
                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <input type="text" class="form-control" name="tahun_terbit" placeholder="Tahun Terbit" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Buku</label>
                        <input type="text" class="form-control" name="jumlah_buku" placeholder="Jumlah Buku" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Buku</label>
                        <input type="text" class="form-control" name="jenis_buku" placeholder="Jenis Buku" required>
                    </div>
                    <div class="form-group">
                        <label>Rak</label>
                        <input type="text" class="form-control" name="rak" placeholder="Rak" required>
                    </div>
                    <div class="form-group">
                        <label>Status Buku</label>
                        <select class="form-control" name="status_buku" id="status_buku" require>
                            <option value="Tersedia - Bisa Dipinjam">Tersedia - Bisa Dipinjam</option>
                            <option value="Tersedia - Tidak Bisa Dipinjam">Tersedia - Tidak Bisa Dipinjam</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label>Kode Klasifikasi</label>
                        <input type="text" class="form-control" name="kode_klasifikasi" placeholder="Kode Klasifikasi" required>
                    </div> -->
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" name="gambar" placeholder="Gambar" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Add book-->

<!-- Modal Update book-->
<form action="<?= route_to('book.update') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Buku</label>
                        <input type="text" class="form-control kode_buku" name="kode_buku" placeholder="Kode Buku" required>
                    </div>
                    <div class="form-group">
                        <label>Judul Buku</label>
                        <input type="text" class="form-control judul_buku" name="judul_buku" placeholder="Judul Buku" required>
                    </div>
                    <div class="form-group">
                        <label>Pengarang</label>
                        <input type="text" class="form-control pengarang" name="pengarang" placeholder="Pengarang" required>
                    </div>
                    <div class="form-group">
                        <label>Penerbit</label>
                        <input type="text" class="form-control penerbit" name="penerbit" placeholder="Penerbit" required>
                    </div>
                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <input type="text" class="form-control tahun_terbit" name="tahun_terbit" placeholder="Tahun Terbit" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Buku</label>
                        <input type="text" class="form-control jumlah_buku" name="jumlah_buku" placeholder="Jumlah Buku" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Buku</label>
                        <input type="text" class="form-control jenis_buku" name="jenis_buku" placeholder="Jenis Buku" required>
                    </div>
                    <div class="form-group">
                        <label>Rak</label>
                        <input type="text" class="form-control rak" name="rak" placeholder="Rak" required>
                    </div>
                    <div class="form-group">
                        <label>Status Buku</label>
                        <select class="form-control status_buku" name="status_buku" id="status_buku" require>
                            <option value="Tersedia - Bisa Dipinjam">Tersedia - Bisa Dipinjam</option>
                            <option value="Tersedia - Tidak Bisa Dipinjam">Tersedia - Tidak Bisa Dipinjam</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label>Kode Klasifikasi</label>
                        <input type="text" class="form-control kode_klasifikasi" name="kode_klasifikasi" placeholder="Kode Klasifikasi" required>
                    </div> -->
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control gambar" name="gambar" placeholder="Gambar">
                    </div>
                    <div class="form-group text-center">
                        <img src="" class="img-thumbnail img-preview" width="100" id="gambar">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_buku" class="id_buku">
                    <input type="hidden" name="name_gambar" class="name_gambar">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Update book-->

<!-- Modal Delete book -->
<form action="<?= route_to('book.delete') ?>" method="post">
    <?= csrf_field() ?>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h4>Apakah Kamu Ingin Menghapus book Ini?</h4>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_buku" class="id_buku">
                    <input type="hidden" name="name_gambar" class="name_gambar">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    $(document).on('click', '.btn-edit', function(e) {
        e.preventDefault();
        const id_buku = $(this).data('id-buku');
        const kode_buku = $(this).data('kode-buku');
        const judul_buku = $(this).data('judul-buku');
        const pengarang = $(this).data('pengarang');
        const penerbit = $(this).data('penerbit');
        const tahun_terbit = $(this).data('tahun-terbit');
        const jumlah_buku = $(this).data('jumlah-buku');
        const jenis_buku = $(this).data('jenis-buku');
        const rak = $(this).data('rak');
        const status_buku = $(this).data('status-buku');
        // const kode_klasifikasi = $(this).data('kode-klasifikasi');
        const gambar = $(this).data('gambar');
        console.log(gambar)
        $('.id_buku').val(id_buku);
        $('.kode_buku').val(kode_buku);
        $('.judul_buku').val(judul_buku);
        $('.pengarang').val(pengarang);
        $('.penerbit').val(penerbit);
        $('.tahun_terbit').val(tahun_terbit);
        $('.jumlah_buku').val(jumlah_buku);
        $('.jenis_buku').val(jenis_buku);
        $('.rak').val(rak);
        $('.status_buku').val(status_buku);
        // $('.kode_klasifikasi').val(kode_klasifikasi);
        $('.name_gambar').val(gambar);
        $('#gambar').attr('src', '<?= base_url('images/books') ?>/' + gambar);
        $('#editModal').modal('show');
    });

    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        const id = $(this).data('id');
        const gambar = $(this).data('gambar');
        $('.id_buku').val(id);
        $('.name_gambar').val(gambar);
        $('#deleteModal').modal('show');
    });

    $(document).ready(function() {
        $('#datatable-book').DataTable({
            dom: 'Blfrtip',
            buttons: {
                dom: {
                    button: {
                        className: 'btn btn-info mr-1' //Primary class for all buttons
                    }
                },
                buttons: [{
                        extend: 'copyHtml5',
                        title: 'Data Export Data Buku <?php echo date('d-m-Y H:i:s'); ?>',
                        text: '<i class="fa fa-copy"></i> Copy',
                    },
                    {
                        extend: 'excelHtml5',
                        title: 'Data Export Data Buku <?php echo date('d-m-Y H:i:s'); ?>',
                        text: '<i class="fa fa-file-excel-o"></i> Excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                        },
                    },
                    {
                        extend: 'csvHtml5',
                        title: 'Data Export Data Buku <?php echo date('d-m-Y H:i:s'); ?>',
                        text: '<i class="fa fa-file-text-o"></i> CSV',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                        },
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Data Export Data Buku <?php echo date('d-m-Y H:i:s'); ?>',
                        text: '<i class="fa fa-file-pdf-o"></i> PDF',
                        customize: function(doc) {
                            doc.defaultStyle.fontSize = 10;
                            doc.pagePadding = [10, 10, 10, 10];
                            doc.styles.tableHeader.fontSize = 10;
                            doc.styles.title.fontSize = 12;
                            doc.styles.title.alignment = 'center';
                        },
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                        },
                    },
                    {
                        extend: 'print',
                        title: 'Data Export Data Buku <?php echo date('d-m-Y H:i:s'); ?>',
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
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                        },
                    }
                ]
            }
        });
    });
</script>
<?= $this->endSection() ?>