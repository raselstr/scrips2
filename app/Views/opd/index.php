<?= $this->extend('layout/default'); ?>

<?= $this->section('title'); ?>
  <title>OPD &mdash; BKAD</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
  <section class="section">
    <div class="section-header">
      <h1>Organisasi Perangkat Daerah</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= site_url('/'); ?>">Dashboard</a></div>
        <div class="breadcrumb-item">Data Perjadin</div>
      </div>
    </div>

    <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Daftar Organisasi Perangkat Daerah</h4>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped table-md">
                <tr>
                  <th>#</th>
                  <th>KODE OPD</th>
                  <th>NAMA OPD</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                <?php foreach ($opd as $key => $value) : ?>
                <tr>
                  <td><?= $key + 1; ?></td>
                  <td><?= $value->opd_kode; ?></td>
                  <td><?= $value->opd_nama; ?></td>
                  <td><?= $value->created_at; ?></td>
                  <td><div class="badge badge-success">Active</div></td>
                  <td><a href="#" class="btn btn-secondary">Detail</a></td>
                </tr>
                <?php endforeach; ?>
              </table>
            </div>
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
              <ul class="pagination mb-0">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                <li class="page-item">
                  <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
<?= $this->endSection(); ?>