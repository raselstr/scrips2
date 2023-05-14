<?= $this->extend('layout/default'); ?>

<?= $this->section('title'); ?>
  <title>OPD &mdash; BKAD</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
  <section class="section">
    <div class="section-header">
      <h1>Edit Organisasi Perangkat Daerah</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= site_url('/'); ?>">Dashboard</a></div>
        <div class="breadcrumb-item">Edit Data</div>
      </div>
    </div>

    <div class="section-body">
        <div class="card">
            <form action = "<?= site_url('opds/update/'.$opd->opd_id); ?>" class="needs-validation" novalidate="" method="post">
                <?= csrf_field(); ?>
                <div class="card-header">
                  <div class="buttons">
                    <a href="<?= site_url('opds'); ?>" class="btn btn-icon btn-primary"><i class="fas fa-arrow-left"></i></a>
                  </div>  
                  <h4>Edit Data Organisasi Perangkat Daerah</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">KODE OPD</label>
                    <div class="col-sm-9">
                        <input type="text" name = "opd_kode" value = "<?= $opd->opd_kode; ?>" class="form-control" required="">
                        <div class="invalid- feedback">
                        Kode OPD Tidak Boleh Kosong
                        </div>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">NAMA OPD</label>
                    <div class="col-sm-9">
                        <input type="text" name="opd_nama" value = "<?= $opd->opd_nama; ?>" class="form-control" required="" >
                        <div class="invalid-feedback">
                        Nama OPD Tidak Boleh Kosong !!
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type = "submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
  </section>
<?= $this->endSection(); ?>