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
                        <?php

                        if (session()->get('role') == 2) { ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Peminjaman Buku</h4>
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
                                        <form method="POST" action="<?= route_to('loan.add') ?>">
                                            <input type="hidden" class="form-control" name="id_staff" id="id_staff" value="<?= session()->get('id_user') ?>" readonly required>
                                            <div class="form-group">
                                                <label>Nomor Anggota</label>
                                                <select class="js-data-students form-control" name="id_siswa" id="id_siswa" required>
                                                    <option value="">-- Pilih Nomor Anggota --</option>
                                                    <?php foreach ($data_students as $key => $value) : ?>
                                                        <option value="<?= $value->id_siswa ?>"><?= $value->nomor_anggota ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Siswa</label>
                                                <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" readonly required>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Pinjam</label>
                                                <input type="date" class="form-control" name="tanggal_pinjam" id="tanggal_pinjam" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Pengembalian</label>
                                                <input type="date" class="form-control" name="tanggal_harus_kembali" id="tanggal_harus_kembali" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Kode Buku</label>
                                                <select class="js-data-books form-control" name="id_buku" id="id_buku" required>
                                                    <option value="">-- Pilih Kode Buku --</option>
                                                    <?php foreach ($data_books as $key => $value) : ?>
                                                        <option value="<?= $value->id_buku ?>"><?= $value->kode_buku ?> | <?= $value->judul_buku ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Judul Buku</label>
                                                <input type="text" class="form-control" name="judul_buku" id="judul_buku" readonly required>
                                            </div>
                                            <div class="form-group">
                                                <label>Penerbit</label>
                                                <input type="text" class="form-control" name="penerbit" id="penerbit" readonly required>
                                            </div>
                                            <div class="form-group">
                                                <label>Pengarang</label>
                                                <input type="text" class="form-control" name="pengarang" id="pengarang" readonly required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Buku</label>
                                                <input type="text" class="form-control" name="jenis_buku" id="jenis_buku" readonly required>
                                            </div>
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php }

                        ?>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Peminjaman</h4>
                                <?php

                                // if (session()->get('role') == 2) {
                                //     echo '<button type="button" class="btn btn-success mt-1" data-toggle="modal" data-target="#addModal">Tambah Buku</button>';
                                // }

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
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Gambar</th>
                                                    <th>Judul Buku</th>
                                                    <th>Staff</th>
                                                    <th>Siswa</th>
                                                    <th>Tanggal Pinjam</th>
                                                    <th>Tanggal Harus Kembali</th>
                                                    <th>Status Pinjaman</th>
                                                    <?php

                                                    if (session()->get('role') == 2) {
                                                        echo '<th>Action</th>';
                                                    }

                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data_loans as $key => $value) : ?>
                                                    <tr>
                                                        <td>
                                                            <?php

                                                            if ($value->gambar == null) {
                                                                $value->gambar = 'default.jpg';
                                                            }

                                                            ?>
                                                            <img src="<?= base_url('images/books/' . $value->gambar) ?>" width="100px" height="100px">
                                                        </td>
                                                        <td><?= $value->judul_buku ?></td>
                                                        <td><?= $value->nama_staff ?></td>
                                                        <td><?= $value->nama_siswa ?></td>
                                                        <td><?= $value->tanggal_pinjam ?></td>
                                                        <td><?= $value->tanggal_harus_kembali ?></td>
                                                        <td>
                                                            <?php if ($value->status == 1) : ?>
                                                                <span class="badge badge-warning">Belum Dikembalikan</span>
                                                            <?php elseif ($value->status == 2) : ?>
                                                                <span class="badge badge-success">Sudah Dikembalikan</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <?php

                                                        if (session()->get('role') == 2) {
                                                            echo '<td>
                                                                    <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="' . $value->id_pinjam . '">Delete</a>
                                                                </td>';
                                                        }

                                                        ?>

                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Gambar</th>
                                                    <th>Judul Buku</th>
                                                    <th>Staff</th>
                                                    <th>Siswa</th>
                                                    <th>Tanggal Pinjam</th>
                                                    <th>Tanggal Harus Kembali</th>
                                                    <th>Status Pinjaman</th>
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

<!-- Modal Delete book -->
<form action="<?= route_to('loan.delete') ?>" method="post">
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
    $(document).ready(function() {

        $('.js-data-students').select2();
        $('.js-data-books').select2();

        $('.btn-delete').on('click', function() {
            const id = $(this).data('id');
            $('.id_pinjam').val(id);
            $('#deleteModal').modal('show');
        });

        // click select and with id=id_siswa
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

        // click select and with id=id_buku
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

    });
</script>
<?= $this->endSection() ?>