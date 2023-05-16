<?= $this->extend('layout/default'); ?>

<?= $this->section('title'); ?>
  <title>Pegawai &mdash; BKAD</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
  <section class="section">
    <div class="section-header">
      <h1>Edit Pegawai Daerah</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= site_url('/'); ?>">Dashboard</a></div>
        <div class="breadcrumb-item">Edit Pegawai</div>
      </div>
    </div>

    <div class="section-body">
        <div class="card">
            <form action = "<?= site_url('pegawais/'.$peg->pegawai_id); ?>" class="needs-validation" novalidate="" method="post">
              <?= csrf_field(); ?>
              <input type="hidden" name="_method" value="PATCH">
                <div class="card-header">
                  <div class="buttons">
                    <a href="<?= site_url('pegawais'); ?>" class="btn btn-icon btn-primary"><i class="fas fa-arrow-left"></i></a>
                  </div>  
                  <h4>Edit Data Pegawai Daerah</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">NIP</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" required="" name = "pegawai_nip" value="<?= $peg->pegawai_nip; ?>">
                        <div class="invalid-feedback">
                        Kode OPD Tidak Boleh Kosong
                        </div>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">NAMA</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" required="" name="pegawai_nama" value="<?= $peg->pegawai_nama; ?>">
                        <div class="invalid-feedback">
                        Nama OPD Tidak Boleh Kosong !!
                        </div>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">ALAMAT</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" required="" name="pegawai_alamat"><?= $peg->pegawai_alamat; ?></textarea>
                        <div class="invalid-feedback">
                        Nama OPD Tidak Boleh Kosong !!
                        </div>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">INFO</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="pegawai_info"><?= $peg->pegawai_info; ?></textarea>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">OPD</label>
                    <div class="col-sm-9">
                        <select name="opd_id" id="opd_id" class="form-control" required="">
                          <option value="" hidden></option>
                          <?php foreach ($opd as $key => $value) : ?>
                            <option value="<?= $value->opd_id; ?>" <?= $peg->opd_id == $value->opd_id ? 'selected' : null ; ?>><?= $value->opd_nama; ?></option>
                          <?php endforeach; ?>
                        </select>  
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