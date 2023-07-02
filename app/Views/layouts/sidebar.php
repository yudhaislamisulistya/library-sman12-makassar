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
            <li class=" nav-item"><a href="<?= route_to('admin.dashboard') ?>"><i class="la la-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
            </li>
            <li class=" nav-item"><a href="<?= route_to('member') ?>"><i class="la la-user"></i><span class="menu-title" data-i18n="Anggota">Anggota</span></a>
            </li>
            <li class=" nav-item"><a href="<?= route_to('book') ?>"><i class="la la-book"></i><span class="menu-title" data-i18n="Data Buku">Data Buku</span></a>
            </li>
            <li class=" nav-item"><a href="<?= route_to('loan') ?>"><i class="la la-bitcoin"></i><span class="menu-title" data-i18n="Kelola Peminjaman">Kelola Peminjaman</span></a>
            </li>
            <li class=" nav-item"><a href="<?= route_to('return') ?>"><i class="la la-tag"></i><span class="menu-title" data-i18n="Kelola Pengembalian">Kelola Pengembalian</span></a>
            </li>
            <li class=" nav-item"><a href="../bank-menu-template"><i class="la la-bank"></i><span class="menu-title" data-i18n="Laporan Riwayat">Laporan Riwayat</span></a>
            </li>
            <li class=" nav-item"><a href="../bank-menu-template"><i class="la la-close"></i><span class="menu-title" data-i18n="Logout">Logout</span></a>
            </li>
            </li>
        </ul>
    </div>
</div>