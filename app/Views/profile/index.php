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
                                <h4 class="card-title">Profile <?= getNameUserById(session()->get('id_user')) ?></h4>
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
                                    <?php

                                    if (session()->get('role') == 1) { ?>
                                        <form action="<?= route_to('profile.update') ?>" method="post" class="mb-5">
                                            <div class="form-group">
                                                <label>Nama Siswa</label>
                                                <input type="text" class="form-control" name="nama_siswa" placeholder="Nama Siswa" pattern="[A-Za-z\s]+" title="Hanya diperbolehkan inputan teks" value="<?= $data->nama_siswa ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?= $data->username ?>" required readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Kelas</label>
                                                <select class="form-control" name="kelas" value="<?= $data->kelas ?>" required>
                                                    <option value="" disabled>Pilih Kelas</option>
                                                    <?php
                                                    $value = $data->kelas;
                                                    if ($value == '1 IPA') {
                                                        echo '<option value="1 IPA" selected>1 IPA</option>';
                                                    } elseif ($value == '2 IPA') {
                                                        echo '<option value="2 IPA" selected>2 IPA</option>';
                                                    } elseif ($value == '3 IPA') {
                                                        echo '<option value="3 IPA" selected>3 IPA</option>';
                                                    } elseif ($value == '1 IPS') {
                                                        echo '<option value="1 IPS" selected>1 IPS</option>';
                                                    } elseif ($value == '2 IPS') {
                                                        echo '<option value="2 IPS" selected>2 IPS</option>';
                                                    } elseif ($value == '3 IPS') {
                                                        echo '<option value="3 IPS" selected>3 IPS</option>';
                                                    } elseif ($value == 'Lainnya') {
                                                        echo '<option value="Lainnya" selected>Lainnya</option>';
                                                    }
                                                    ?>
                                                    <option value="" disabled>-----------------</option>
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
                                                <input type="text" class="form-control" name="nisn" placeholder="NISN" value="<?= $data->nisn ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Anggota</label>
                                                <input type="text" class="form-control" name="nomor_anggota" placeholder="Nomor Anggota" value="<?= $data->nomor_anggota ?>" required readonly>
                                            </div>

                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat" required><?= $data->alamat ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Nomor Telepon</label>
                                                <input type="text" class="form-control" name="nomor_telepon" value="<?= $data->nomor_telepon ?>" placeholder="Nomor Telepon" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Change Profile</button>
                                        </form>
                                        <form action="<?= route_to('profile.changePassword') ?>" method="post">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Konfirmasi Password</label>
                                                <input type="password" class="form-control" name="konfirmasi_password" placeholder="Konfirmasi Password" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </form>
                                    <?php } elseif (session()->get('role') == 2) { ?>
                                        <form action="<?= route_to('profile.update') ?>" method="post" class="mb-5">
                                            <div class="form-group">
                                                <label>Nama Staff</label>
                                                <input type="text" class="form-control" name="nama_staff" placeholder="Nama Staff" pattern="[A-Za-z\s]+" title="Hanya diperbolehkan inputan teks" value="<?= $data['nama_staff'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?= $data['username'] ?>" required readonly>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Change Profile</button>
                                        </form>
                                        <form action="<?= route_to('profile.changePassword') ?>" method="post">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Konfirmasi Password</label>
                                                <input type="password" class="form-control" name="konfirmasi_password" placeholder="Konfirmasi Password" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </form>
                                    <?php } elseif (session()->get('role') == 3) { ?>
                                        <form action="<?= route_to('profile.update') ?>" method="post" class="mb-5">
                                            <div class="form-group">
                                                <label>Nama Kepala Sekolah</label>
                                                <input type="text" class="form-control" name="nama_kepala_sekolah" placeholder="Nama Kepala Sekolah" pattern="[A-Za-z\s]+" title="Hanya diperbolehkan inputan teks" value="<?= $data['nama_kepala_sekolah'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?= $data['username'] ?>" required readonly>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Change Profile</button>
                                        </form>
                                        <form action="<?= route_to('profile.changePassword') ?>" method="post">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Konfirmasi Password</label>
                                                <input type="password" class="form-control" name="konfirmasi_password" placeholder="Konfirmasi Password" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </form>
                                    <?php }

                                    ?>

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

<!-- Modal Add Member-->
<form action="<?= route_to('member.add') ?>" method="post">
    <?= csrf_field() ?>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                        <select class="form-control" name="kelas" id="kelas" required>
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
                            ?>
                            <div class="form-group">
                                <label>Nomor</label>
                                <input type="text" class="form-control" value="<?= $year ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Anggota</label>
                                <input type="text" class="form-control" name="nomor_anggota" placeholder="Nomor Telepon" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="number" class="form-control" name="nomor_telepon" placeholder="Nomor Telepon" required>
                    </div>
                </div>
                <!-- notes -->
                <div class="modal-body">
                    <p class="text-danger">* nomor anggota bisa digunakan login sebagai username</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Add Member-->

<!-- Modal Update Member-->
<form action="<?= route_to('member.update') ?>" method="post">
    <?= csrf_field() ?>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" class="form-control nama_siswa" name="nama_siswa" placeholder="Nama Siswa" pattern="[A-Za-z\s]+" title="Hanya diperbolehkan inputan teks" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control username" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select class="form-control kelas" name="kelas" required>
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
                        <input type="text" class="form-control nisn" name="nisn" placeholder="NISN" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor Anggota</label>
                        <input type="text" class="form-control nomor_anggota" name="nomor_anggota" placeholder="Nomor Telepon" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control alamat" name="alamat" rows="3" placeholder="Alamat" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="number" class="form-control nomor_telepon" name="nomor_telepon" placeholder="Nomor Telepon" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_siswa" class="id_siswa">
                    <input type="hidden" name="id_registrasi" class="id_registrasi">
                    <input type="hidden" name="username" class="username">
                    <input type="hidden" name="password" class="password">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Update Member-->

<!-- Modal Delete Member -->
<form action="<?= route_to('member.delete') ?>" method="post">
    <?= csrf_field() ?>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h4>Apakah Kamu Ingin Menghapus Member Akun Ini?</h4>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_siswa" class="id_siswa">
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
        $('.kelas').val(kelas);

        $('.btn-edit').on('click', function() {
            const id_siswa = $(this).data('id-siswa');
            const id_registrasi = $(this).data('id-registrasi');
            const nama_siswa = $(this).data('nama-siswa');
            const username = $(this).data('username');
            const password = $(this).data('password');
            const kelas = $(this).data('kelas');
            const nisn = $(this).data('nisn');
            const nomor_anggota = $(this).data('nomor-anggota');
            const alamat = $(this).data('alamat');
            const nomor_telepon = $(this).data('nomor-telepon');
            $('.id_siswa').val(id_siswa);
            $('.id_registrasi').val(id_registrasi);
            $('.nama_siswa').val(nama_siswa);
            $('.username').val(username);
            $('.password').val(password);
            $('.kelas').val(kelas);
            $('.nisn').val(nisn);
            $('.nomor_anggota').val(nomor_anggota);
            $('.alamat').val(alamat);
            $('.nomor_telepon').val(nomor_telepon);
            $('#editModal').modal('show');
        });
        $('.btn-delete').on('click', function() {
            const id = $(this).data('id');
            $('.id_siswa').val(id);
            $('#deleteModal').modal('show');
        });
    });
</script>
<?= $this->endSection() ?>