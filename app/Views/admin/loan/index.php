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
                                    <form>
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
                                            <input type="date" class="form-control" name="tanggal_pengembalian" id="tanggal_pengembalian" required>
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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Buku</h4>
                                <button type="button" class="btn btn-success mt-1" data-toggle="modal" data-target="#addModal">Tambah Buku</button>
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
                                                    <th>Kode Buku</th>
                                                    <th>Pengarang</th>
                                                    <th>Penerbit</th>
                                                    <th>Tahun Terbit</th>
                                                    <th>Jumlah</th>
                                                    <th>Jenis Buku</th>
                                                    <th>Kode Klasifikasi</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

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
                                                    <th>Kode Klasifikasi</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
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
                        <label>Status_buku</label>
                        <input type="text" class="form-control" name="status_buku" placeholder="Status Buku" required>
                    </div>
                    <div class="form-group">
                        <label>Kode Klasifikasi</label>
                        <input type="text" class="form-control" name="kode_klasifikasi" placeholder="Kode Klasifikasi" required>
                    </div>
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
                        <label>Status_buku</label>
                        <input type="text" class="form-control status_buku" name="status_buku" placeholder="Status Buku" required>
                    </div>
                    <div class="form-group">
                        <label>Kode Klasifikasi</label>
                        <input type="text" class="form-control kode_klasifikasi" name="kode_klasifikasi" placeholder="Kode Klasifikasi" required>
                    </div>
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
    $(document).ready(function() {

        $('.js-data-students').select2();
        $('.js-data-books').select2();

        $('.btn-edit').on('click', function() {
            const id_buku = $(this).data('id-buku');
            const kode_buku = $(this).data('kode-buku');
            const judul_buku = $(this).data('judul-buku');
            const pengarang = $(this).data('pengarang');
            const penerbit = $(this).data('penerbit');
            const tahun_terbit = $(this).data('tahun-terbit');
            const jumlah_buku = $(this).data('jumlah-buku');
            const jenis_buku = $(this).data('jenis-buku');
            const status_buku = $(this).data('status-buku');
            const kode_klasifikasi = $(this).data('kode-klasifikasi');
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
            $('.status_buku').val(status_buku);
            $('.kode_klasifikasi').val(kode_klasifikasi);
            $('.name_gambar').val(gambar);
            $('#gambar').attr('src', '<?= base_url('images/books') ?>/' + gambar);
            $('#editModal').modal('show');
        });
        $('.btn-delete').on('click', function() {
            const id = $(this).data('id');
            const gambar = $(this).data('gambar');
            $('.id_buku').val(id);
            $('.name_gambar').val(gambar);
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