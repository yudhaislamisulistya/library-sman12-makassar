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
                                                <h3><?= count(getLoans()) ?></h3>
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
                                                <h3><?= count(getReturns()) ?></h3>
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
                                                                    $denda = $interval->format('%a') * 5000;
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