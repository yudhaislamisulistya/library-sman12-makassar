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
            </section>
        </div>
        <!--/ Revenue, Hit Rate & Deals -->
    </div>
</div>
</div>

<!-- Modal Update return-->
<form action="<?= route_to('return.update') ?>" method="post">
    <?= csrf_field() ?>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pengembalian Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nomor Anggota</label>
                        <input type="text" class="form-control nomor_anggota" name="nomor_anggota" placeholder="Nomor Anggota" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" class="form-control nama_siswa" name="nama_siswa" placeholder="Nama Siswa" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Judul Buku</label>
                        <input type="text" class="form-control judul_buku" name="judul_buku" placeholder="Judul Buku" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input type="date" class="form-control tanggal_pinjam" name="tanggal_pinjam" placeholder="Tanggal Pinjam" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Harus Kembali</label>
                        <input type="date" class="form-control tanggal_harus_kembali" name="tanggal_harus_kembali" placeholder="Tanggal Harus Kembali" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input type="date" class="form-control tanggal_kembali" name="tanggal_kembali" placeholder="Tanggal Kembali" required>
                    </div>
                    <div class="form-group">
                        <label>Denda</label>
                        <input type="text" class="form-control denda" name="denda" placeholder="Denda" required readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_pinjam" class="id_pinjam">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Update return-->

<!-- Modal Delete book -->
<form action="<?= route_to('return.delete') ?>" method="post">
    <?= csrf_field() ?>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pinjaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h4>Apakah Kamu Ingin Menghapus Data Pinjaman Ini?</h4>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_pinjam" class="id_pinjam">
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
        const id = $(this).data('id');
        const nomor_anggota = $(this).data('nomor-anggota');
        const nama_siswa = $(this).data('nama-siswa');
        const judul_buku = $(this).data('judul-buku');
        const tanggal_pinjam = $(this).data('tanggal-pinjam');
        const tanggal_harus_kembali = $(this).data('tanggal-harus-kembali');
        const tanggal_kembali = $(this).data('tanggal-kembali');
        const denda = $(this).data('denda');
        console.log(id);
        console.log(nomor_anggota);
        console.log(nama_siswa);
        console.log(judul_buku);
        console.log(tanggal_pinjam);
        console.log(tanggal_harus_kembali);
        console.log(tanggal_kembali);
        console.log(denda);

        if (tanggal_kembali === "") {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();

            if (dd < 10) {
                dd = '0' + dd;
            }

            if (mm < 10) {
                mm = '0' + mm;
            }

            var formattedDate = yyyy + '-' + mm + '-' + dd;

            console.log("Hari Ini Adalah");
            console.log(formattedDate);

            $('.tanggal_kembali').val(formattedDate);
        } else {
            $('.tanggal_kembali').val(tanggal_kembali);
        }

        $('.id_pinjam').val(id);
        $('.nomor_anggota').val(nomor_anggota);
        $('.nama_siswa').val(nama_siswa);
        $('.judul_buku').val(judul_buku);
        $('.tanggal_pinjam').val(tanggal_pinjam);
        $('.tanggal_harus_kembali').val(tanggal_harus_kembali);
        $('.denda').val(denda);
        $('#editModal').modal('show');
    });

    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        const id = $(this).data('id');
        $('.id_pinjam').val(id);
        $('#deleteModal').modal('show');
    });
    $(document).ready(function() {

        $('.js-data-students').select2();
        $('.js-data-books').select2();

        $('.js-data-students').on('change', function() {
            const id_siswa = $(this).val();
            const url = '<?= route_to("api.student.getStudentById", "999999999") ?>';
            const finalUrl = url.replace('999999999', id_siswa);
            $.ajax({
                url: finalUrl,
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    const result = data.data
                    $('#nama_siswa').val(result.nama_siswa);
                }
            });
        });

        $('.js-data-books').on('change', function() {
            const id_buku = $(this).val();
            const url = '<?= route_to("api.book.getBookById", "999999999") ?>';
            const finalUrl = url.replace('999999999', id_buku);
            $.ajax({
                url: finalUrl,
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    const result = data.data
                    $('#judul_buku').val(result.judul_buku);
                    $('#pengarang').val(result.pengarang);
                    $('#penerbit').val(result.penerbit);
                    $('#jenis_buku').val(result.jenis_buku);
                }
            });
        });

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