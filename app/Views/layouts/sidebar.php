<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header">
                <?php
                $session = session();
                $role = $session->get('role');
                if ($role == 1) {
                ?>
                    <span data-i18n="Student">Student</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Student"></i>
                <?php
                } else if ($role == 2) {
                ?>
                    <span data-i18n="Admin/Staff">Admin/Staff</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Admin/Staff"></i>
                <?php
                } else {
                ?>
                    <span data-i18n="Kepala Sekolah">Kepala Sekolah</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Kepala Sekolah"></i>
                <?php
                }
                ?>
            </li>
            <?php
            $session = session();
            $role = $session->get('role');
            if ($role == 1) {
            ?>
                <li class=" nav-item"><a href="<?= route_to('student.dashboard') ?>"><i class="la la-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="la la-book"></i><span class="menu-title" data-i18n="Data Buku">Data Buku</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="<?= route_to('student.book') ?>"><i></i><span>Semua</span></a></li>
                        <?php
                        foreach (getUniqueTypeBook() as $item) {
                            $jenis_buku = $item->jenis_buku;
                        ?>
                            <li><a class="menu-item" href="<?= route_to('student.book.type', $jenis_buku) ?>"><i></i><span><?= $jenis_buku ?></span></a></li>
                        <?php } ?>

                    </ul>
                </li>
                <li class=" nav-item"><a href="<?= route_to('student.loan') ?>"><i class="la la-bitcoin"></i><span class="menu-title" data-i18n="Kelola Peminjaman">Peminjaman</span></a>
                </li>
                <li class=" nav-item"><a href="<?= route_to('student.return') ?>"><i class="la la-tag"></i><span class="menu-title" data-i18n="Kelola Pengembalian">Pengembalian</span></a>
                </li>
                <li class=" nav-item"><a href="<?= route_to('auth.logout') ?>"><i class="la la-close"></i><span class="menu-title" data-i18n="Logout">Logout</span></a>
                </li>
                </li>
            <?php
            } else if ($role == 2) {
            ?>
                <li class=" nav-item"><a href="<?= route_to('admin.dashboard') ?>"><i class="la la-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                </li>
                <li class=" nav-item"><a href="<?= route_to('member') ?>"><i class="la la-user"></i><span class="menu-title" data-i18n="Anggota">Anggota</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="la la-book"></i><span class="menu-title" data-i18n="Data Buku">Data Buku</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="<?= route_to('book') ?>"><i></i><span>Semua</span></a></li>
                        <?php
                        foreach (getUniqueTypeBook() as $item) {
                            $jenis_buku = $item->jenis_buku;
                        ?>
                            <li><a class="menu-item" href="<?= route_to('book.type', $jenis_buku) ?>"><i></i><span><?= $jenis_buku ?></span></a></li>
                        <?php } ?>

                    </ul>
                </li>
                <li class=" nav-item"><a href="<?= route_to('loan') ?>"><i class="la la-bitcoin"></i><span class="menu-title" data-i18n="Kelola Peminjaman">Kelola Peminjaman</span></a>
                </li>
                <li class=" nav-item"><a href="<?= route_to('return') ?>"><i class="la la-tag"></i><span class="menu-title" data-i18n="Kelola Pengembalian">Kelola Pengembalian</span></a>
                </li>
                <li class=" nav-item"><a href="<?= route_to('report') ?>"><i class="la la-bank"></i><span class="menu-title" data-i18n="Laporan Riwayat">Laporan Riwayat</span></a>
                </li>
                <li class=" nav-item"><a href="<?= route_to('auth.logout') ?>"><i class="la la-close"></i><span class="menu-title" data-i18n="Logout">Logout</span></a>
                </li>
                </li>
            <?php
            } else {
            ?>
                <li class=" nav-item"><a href="<?= route_to('headmaster.dashboard') ?>"><i class="la la-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                </li>
                <li class=" nav-item"><a href="<?= route_to('headmaster.loan') ?>"><i class="la la-bitcoin"></i><span class="menu-title" data-i18n="Kelola Peminjaman">Peminjaman</span></a>
                </li>
                <li class=" nav-item"><a href="<?= route_to('auth.logout') ?>"><i class="la la-close"></i><span class="menu-title" data-i18n="Logout">Logout</span></a>
                </li>
                </li>
            <?php
            }
            ?>

        </ul>
    </div>
</div>