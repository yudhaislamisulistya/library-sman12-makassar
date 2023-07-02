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
                                                <h3><?= count($data_date_loans) ?></h3>
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
                                                <h3><?= count($data_date_returns) ?></h3>
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
                </div>
            </div>
            <!--/ Revenue, Hit Rate & Deals -->
        </div>
    </div>
</div>
<?= $this->endSection() ?>