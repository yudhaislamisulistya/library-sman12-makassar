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
                        Selamat Datang! <strong><?= getNameUserById(session()->get('id_user')) ?> </strong> Anda Login Sebagai Siswa
                    </div>
                </div>
                <?php

                $dateNow = date('Y-m-d');

                $data_loans = getLoans(session()->get('id_user'));
                $data_loans = array_filter($data_loans, function ($var) {
                    return ($var->status == 1);
                });
                // cek selisih $dateNow dengan $loan->tanggal_harus_kembali
                foreach ($data_loans as $loan) {
                    $tanggal_harus_kembali = date_create($loan->tanggal_harus_kembali);
                    $tanggal_harus_kembali = date_format($tanggal_harus_kembali, 'Y-m-d');

                    $diff = date_diff(date_create($tanggal_harus_kembali), date_create($dateNow));
                    $selisih_hari = $diff->days;

                    if ($tanggal_harus_kembali > $dateNow) { ?>
                        <div class="col-xl-12 col-12">
                            <div class="alert bg-warning alert-icon-right alert-arrow-right alert-dismissible mb-2" role="alert">
                                <span class="alert-icon"><i class="la la-warning"></i></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Notifikasi Pengembalian!</strong> Pengembalian Buku (<?= getBookById($loan->id_buku)['judul_buku'] ?>) -<?= $selisih_hari ?> Hari, Anda Sudah Masuk Waktu Tenggang, Silahkan ke Perpustakaan Untuk Mengembalikan atau Memperpanjang Peminjaman</a>.
                            </div>
                        </div>
                    <?php } elseif ($tanggal_harus_kembali < $dateNow) { ?>
                        <div class="col-xl-12 col-12">
                            <div class="alert bg-warning alert-icon-right alert-arrow-right alert-dismissible mb-2" role="alert">
                                <span class="alert-icon"><i class="la la-warning"></i></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Notifikasi Pengembalian!</strong> Pengembalian Buku (<?= getBookById($loan->id_buku)['judul_buku'] ?>) +<?= $selisih_hari ?> Hari, Anda Sudah Masuk Waktu Tenggang, Silahkan ke Perpustakaan Untuk Mengembalikan atau Memperpanjang Peminjaman, Anda Sudah di Kenakan Denda sesuai dengan peraturan Perpusatakan</a>.
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col-xl-12 col-12">
                            <div class="alert bg-warning alert-icon-right alert-arrow-right alert-dismissible mb-2" role="alert">
                                <span class="alert-icon"><i class="la la-warning"></i></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Notifikasi Pengembalian!</strong> Pengembalian Buku (<?= getBookById($loan->id_buku)['judul_buku'] ?>) Hari Ini, Anda Sudah Masuk Waktu Tenggang, Silahkan ke Perpustakaan Untuk Mengembalikan atau Memperpanjang Peminjaman, Anda Sudah di Kenakan Denda sesuai dengan peraturan Perpusatakan</a>.
                            </div>
                        </div>
                <?php }
                }

                ?>
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
                                            <table class="table table-striped table-bordered zero-configuration">
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
                                                                // check if date today is greater than due date of book
                                                                $today = date('Y-m-d');
                                                                $due_date = $data_return->tanggal_harus_kembali;
                                                                $denda = 0;
                                                                if ($today > $due_date) {
                                                                    $datetime1 = new DateTime($today);
                                                                    $datetime2 = new DateTime($due_date);
                                                                    $interval = $datetime1->diff($datetime2);
                                                                    $denda = $interval->format('%a') * 1000;
                                                                    $denda = "Rp. " . number_format($denda, 0, ',', '.');
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