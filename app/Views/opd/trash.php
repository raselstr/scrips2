<?= $this->extend('layout/default'); ?>

<?= $this->section('title'); ?>
  <title>OPD &mdash; BKAD</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
  <section class="section">
    <div class="section-header">
      <h1>Organisasi Perangkat Daerah yang sudah di Hapus</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= site_url('/'); ?>">Dashboard</a></div>
        <div class="breadcrumb-item">OPD yang sudah dihapus</div>
      </div>
    </div>

    <?php if(session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
                <b>Success !!</b>
                <?= session()->getFlashdata('success'); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
                <b>Error !!</b>
                <?= session()->getFlashdata('error'); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="section-body">
        <div class="card">
          <div class="card-header">
            <div class="buttons">
              <a href="<?= site_url('opds'); ?>" class="btn btn-icon icon-left btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
            <h4>Daftar Organisasi Perangkat Daerah</h4>
            <div class="card-header-action">
              <a href="<?= site_url('opds/restore'); ?>" class="btn btn-info"> Restore All</a>
                <form action="<?= site_url('opds/delete2'); ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin menghapus akan dihapus')">
                <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger btn-sm" >Delete All Permanently</a></button>
                </form>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped table-md">
                <tr>
                  <th>#</th>
                  <th>Kode Opd</th>
                  <th>Nama Opd</th>
                  <th>Deleted At</th>
                   <th>Action</th>
                </tr>
                <?php foreach ($opd as $key => $value) : ?>
                <tr>
                  <td><?= $key + 1; ?></td>
                  <td><?= $value->opd_kode; ?></td>
                  <td><?= $value->opd_nama; ?></td>
                  <td><?= $value->deleted_at; ?></td>
                  <td>
                    <a href="<?= site_url('opds/restore/' .$value->opd_id); ?>" class="btn btn-icon btn-sm btn-info">Restore</a>
                    <!-- <a href="<?= site_url('opds/delete2/' .$value->opd_id); ?>" class="btn btn-icon btn-sm btn-info">Delete Permanen</a> -->
                    <form action="<?= site_url('opds/delete2/' .$value->opd_id); ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin menghapus akan dihapus')">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button class="btn btn-danger btn-sm" >Hapus Permanen</button>
                    </form>
                  </td>
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